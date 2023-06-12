<?php
session_start();
include '../config/dbcon.php';
//for signup
if(isset($_POST['register_btn'])){

    $fname= mysqli_real_escape_string($connection, $_POST['fname']);
    $lname= mysqli_real_escape_string($connection, $_POST['lname']);
    $DOB= mysqli_real_escape_string($connection, $_POST['DOB']);
    $phone= mysqli_real_escape_string($connection, $_POST['phone']);
    $username= mysqli_real_escape_string($connection, $_POST['username']);
    $password= mysqli_real_escape_string($connection, $_POST['password']);
    $cpassword= mysqli_real_escape_string($connection, $_POST['cpassword']);
    $province= mysqli_real_escape_string($connection, $_POST['province']);
    $city= mysqli_real_escape_string($connection, $_POST['city']);
    $Address= mysqli_real_escape_string($connection, $_POST['Address']);
    $pay= mysqli_real_escape_string($connection, $_POST['pay']);

    if($password==$cpassword){
        //if pass matches then insert in database
        $insert_query="INSERT INTO `user` (`First_name`,`Last_name`,`DOB`,`Phone_no`,`Username`,`Password`,`Province`,`City`,`Address`,`Pay_type`) VALUES ('$fname','$lname','$DOB','$phone','$username','$password','$province','$city','$Address','$pay')";
       //making the query run
       $insert_query_run=mysqli_query($connection,$insert_query);
       
       if($insert_query_run){
         $_SESSION['message']="New user Registered Successfully!";
        header('Location: ../login.php');
       }

       else{
         $_SESSION['message']="Something went wrong!";
        header('Location: ../signUp.php');
       }

    }
    else{
         $_SESSION['message']="Password and Confirm Password fields do not match!";
        header('Location: ../signUp.php');
    }
}

//for login 
else if(isset($_POST['login_btn'])){
    $email=mysqli_real_escape_string($connection,$_POST['username']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);

    $login_query="SELECT * FROM user WHERE Username='$email' AND Password='$password' ";
    $login_query_run= mysqli_query($connection,$login_query);

    if(mysqli_num_rows($login_query_run)>0){
        $_SESSION['auth']=true;

        $userdata=mysqli_fetch_array($login_query_run);
        $username=$userdata['username'];
        $userpass=$userdata['password'];

        
        $_SESSION['auth_user']=[
            'username'=> $username,
            'password'=>$userpass
        ];

        $_SESSION['message']="Logged In Successfully";
        header('Location: ../admin/pages/dashboard/dashboard.php');//

    }
    else{
        $_SESSION['message']="Invalid Credentials";
        header('Location: ../login.php');
    }

}

elseif (isset($_POST['Save_btn'])) {
    $Prod_Code = mysqli_real_escape_string($connection,$_POST['Prod_Code']);
    $Prod_Name = mysqli_real_escape_string($connection,$_POST['Prod_Name']);
    $Category = mysqli_real_escape_string($connection,$_POST['Category']);
    $Net_Price = mysqli_real_escape_string($connection,$_POST['Net_Price']);
    $Cost_Price = mysqli_real_escape_string($connection,$_POST['Cost_Price']);
    $markup_P = mysqli_real_escape_string($connection,$_POST['markup_P']);
    $markup_Price = mysqli_real_escape_string($connection,$_POST['markup_Price']);
    $Discount_P = mysqli_real_escape_string($connection,$_POST['Discount_P']);
    $Discount_Price = mysqli_real_escape_string($connection,$_POST['Discount_Price']);
    $Sales_Price = mysqli_real_escape_string($connection,$_POST['Sales_Price']);
    $Quantity = mysqli_real_escape_string($connection,$_POST['Quantity']);
    $Exp_date = mysqli_real_escape_string($connection,$_POST['Exp_date']);
    
    $Net_Price = number_format($Discount_Price, 2);
    $Discount_Price = number_format($Discount_Price, 2);
    $Sales_Price = number_format($Sales_Price, 2);
    $Cost_Price = number_format($Cost_Price, 2);
    $markup_Price = number_format($markup_Price, 2);
    $markup_P = number_format($markup_P, 2);
    $Quantity = number_format($Quantity, 2);
    $Discount_P = number_format($Discount_P, 2);
    // Get the Category ID using a prepared statement

            $insert_query_Product = "INSERT INTO `product` (`Product_Code`,`Product_name`,`Category_name`,`Expiry_Date`,`Sales_Price`,`Discount`,`Cost_Price`, `Quantity`) VALUES ('$Prod_Code','$Prod_Name','$Category','$Exp_date','$Sales_Price','$Discount_Price','$Cost_Price','$Quantity')";
            $insert_query_run = mysqli_query($connection, $insert_query_Product);
                
            if ($insert_query_run) {
                $_SESSION['message'] = "New Product Added Successfully!";
                header('Location: ../Admin/pages/product/product.php');
                exit();
            } else {
                $_SESSION['message'] = "Something went wrong!";
                header('Location: ../Admin/pages/product/product.php');
                exit();
            }

    }
elseif(isset($_POST['Edit_P_btn'])){

    $Prod_Code= mysqli_real_escape_string($connection, $_POST['Prod_Code']);
    $Prod_Name= mysqli_real_escape_string($connection, $_POST['Prod_Name']);
    $CategoryName= mysqli_real_escape_string($connection, $_POST['Category']);
    $Cost_Price= mysqli_real_escape_string($connection, $_POST['Cost_Price']);
    $markup_P= mysqli_real_escape_string($connection, $_POST['markup_P']);
    $Discount_P= mysqli_real_escape_string($connection, $_POST['Discount_P']);
    $Net_Price= mysqli_real_escape_string($connection, $_POST['Net_Price']);
    $markup_Price= mysqli_real_escape_string($connection, $_POST['markup_Price']);
    $Discount_Price= mysqli_real_escape_string($connection, $_POST['Discount_Price']);
    $Sales_Price= mysqli_real_escape_string($connection, $_POST['Sales_Price']);
    $Quantity= mysqli_real_escape_string($connection, $_POST['Quantity']);
    $Exp_date= mysqli_real_escape_string($connection, $_POST['Exp_date']);
    
    
    $category_query="UPDATE `product` SET `Product_name`='$Prod_Name',`Category_name`='$CategoryName',`Expiry_Date` = '$Exp_date',`Sales_Price` = '$Sales_Price',`Discount`='$Discount_Price',`Cost_Price`='$Cost_Price',`Quantity`='$Quantity' WHERE `Product_Code` = '$Prod_Code';";

    $cat_query_run=mysqli_query($connection, $category_query);
    if($cat_query_run){
        $_SESSION['message']="Product Updated Successfully!";
        header('Location: ../Admin/pages/product/product.php');
    }
    else{
        $_SESSION['message'] = "Something went wrong!";
        header('Location: ../Admin/pages/product/product.php');

        }
    }

elseif(isset($_POST['Delete_Product'])){
    $old_pc=$_GET['prodc'];
    $old_pn=$_GET['prodn'];
    $old_cn=$_GET['catn'];
    $old_sp=$_GET['salep'];
    $old_d=$_GET['disc'];
    $old_cp=$_GET['costp'];
    $old_q=$_GET['qty'];
    $old_ed=$_GET['expd'];
    $Prod_Code= mysqli_real_escape_string($connection, $_POST['Prod_Code']);
    
    
    $category_query="DELETE FROM product WHERE `Product_Code` = '$old_pc';";

    $cat_query_run=mysqli_query($connection, $category_query);
    if($cat_query_run){
        $_SESSION['message']="Product deleted Successfully!";
        header('Location: ../Admin/pages/product/product.php');
    }
    else{
        $_SESSION['message'] = "Something went wrong!";
        header('Location: ../Admin/pages/product/product.php');

        }
}
elseif(isset($_POST['Add_Order'])){

    $Order_ID= mysqli_real_escape_string($connection, $_POST['Order_ID']);
    $Order_By= mysqli_real_escape_string($connection, $_POST['Order_By']);
    $Category_Code= mysqli_real_escape_string($connection, $_POST['Category_Code']);
    $Product_Code= mysqli_real_escape_string($connection, $_POST['Product_Code']);
    $Quantity= mysqli_real_escape_string($connection, $_POST['Quantity']);
    $Total_Amount= mysqli_real_escape_string($connection, $_POST['Total_Amount']);
    $Order_Date= mysqli_real_escape_string($connection, $_POST['Order_Date']);
    $Received_Date= mysqli_real_escape_string($connection, $_POST['Received_Date']);
    $Pay_Type= mysqli_real_escape_string($connection, $_POST['Pay_Type']);
    $Status= mysqli_real_escape_string($connection, $_POST['Status']);
    
    $Add_Order_query="INSERT INTO `orders` (`OrderID`, `UserID`, `Pay_type`, `Quantity`, `Price`, `Category_Code`, `OrderDate`, `Received_Date`, `Product_Code`) VALUES
    ('$Order_ID','$Order_By','$Pay_Type','$Quantity','$Total_Amount','$Category_Code','$Order_Date','$Received_Date','$Product_Code') ";
    

    $Add_query_run=mysqli_query($connection, $Add_Order_query);
    if($Add_query_run){
        $_SESSION['message']="New Order Added Successfully!";
        header('Location: ../Admin/pages/invoice/invoice.php');
    }
    else{
        $_SESSION['message'] = "Something went wrong!";
        header('Location: ../Admin/pages/invoice/invoice.php');

        }
    }
elseif(isset($_POST['Save_Order'])){

    $Order_ID= mysqli_real_escape_string($connection, $_POST['Order_ID']);
    $Order_By= mysqli_real_escape_string($connection, $_POST['Order_By']);
    $Category_Code= mysqli_real_escape_string($connection, $_POST['Category_Code']);
    $Product_Code= mysqli_real_escape_string($connection, $_POST['Product_Code']);
    $Quantity= mysqli_real_escape_string($connection, $_POST['Quantity']);
    $Total_Amount= mysqli_real_escape_string($connection, $_POST['Total_Amount']);
    $Order_Date= mysqli_real_escape_string($connection, $_POST['Order_Date']);
    $Received_Date= mysqli_real_escape_string($connection, $_POST['Received_Date']);
    $Pay_Type= mysqli_real_escape_string($connection, $_POST['Pay_Type']);
    $Status= mysqli_real_escape_string($connection, $_POST['Status']);
    
    $order_query="UPDATE `orders` SET `UserID`='$Order_By',`Category_Code`='$Category_Code',`Product_Code` = '$Product_Code',`Quantity` = '$Quantity',`Price`='$Total_Amount',`OrderDate`='$Order_Date',`Received_Date`='$Received_Date',`Pay_type`='$Pay_Type',`Status`='$Status' WHERE `OrderID`='$Order_ID';";

    $order_query_run=mysqli_query($connection, $order_query);
    if($order_query_run){
        $_SESSION['message']="Order Updated Successfully!";
        header('Location: ../Admin/pages/invoice/invoice.php');
    }
    else{
        
        $_SESSION['message'] = "Something went wrong!";
        header('Location: ../Admin/pages/invoice/invoice.php');

        }
    }

elseif(isset($_POST['Delete_order'])){
    $old_od=$_GET['od'];
    $old_os=$_GET['os'];
#    $Order_ID= mysqli_real_escape_string($connection, $_POST['Order_ID']);
    
    if($old_os=='Paid'){

    $delete_O_query="DELETE FROM `orders` WHERE `OrderID` = '$old_od' AND `Status`='Paid';";
    $del_query_run=mysqli_query($connection, $delete_O_query);
    if($del_query_run){
        $_SESSION['message']="Order deleted Successfully!";
        header('Location: ../Admin/pages/invoice/invoice.php');
    }
    else {
        $_SESSION['message']="Order is Pending and cannot be deleted!";
        header('Location: ../Admin/pages/invoice/invoice.php');
    }

    }
    else{
        $_SESSION['message']="Order is Pending and cannot be deleted!";
        header('Location: ../Admin/pages/invoice/invoice.php');

        }

}

elseif(isset($_POST['edit-Users'])){
    
    $UserID= mysqli_real_escape_string($connection, $_POST['UserID']);
    $First_Name= mysqli_real_escape_string($connection, $_POST['First_Name']);
    $Last_Name= mysqli_real_escape_string($connection, $_POST['Last_Name']);
    $Username= mysqli_real_escape_string($connection, $_POST['Username']);
    $DOB= mysqli_real_escape_string($connection, $_POST['DOB']);
    $Contact_Number= mysqli_real_escape_string($connection, $_POST['Contact_Number']);
    $Address= mysqli_real_escape_string($connection, $_POST['Address']);
    $province= mysqli_real_escape_string($connection, $_POST['province']);
    $city= mysqli_real_escape_string($connection, $_POST['city']);
    
    $order_query="UPDATE `user` SET `user_id`='$UserID',`First_name`='$First_Name',`Username`='$Username',`Last_name` = '$Last_Name',`DOB` = '$DOB',`Phone_no`='$Contact_Number',`Address`='$Address',`Province`='$province',`City`='$city' WHERE `user_id`='$UserID';";

    $order_query_run=mysqli_query($connection, $order_query);
    if($order_query_run){
        $_SESSION['message']="User Updated Successfully!";
        header('Location: ../Admin/pages/users/users.php');
    }
    else{
        $_SESSION['message'] = "Something went wrong!";
        header('Location: ../Admin/pages/users/users.php');

        }
    }
elseif(isset($_POST['add-users'])){

    $UserID= mysqli_real_escape_string($connection, $_POST['UserID']);
    $First_Name= mysqli_real_escape_string($connection, $_POST['First_Name']);
    $Last_Name= mysqli_real_escape_string($connection, $_POST['Last_Name']);
    $Username= mysqli_real_escape_string($connection, $_POST['Username']);
    $DOB= mysqli_real_escape_string($connection, $_POST['DOB']);
    $Contact_Number= mysqli_real_escape_string($connection, $_POST['Contact_Number']);
    $Address= mysqli_real_escape_string($connection, $_POST['Address']);
    $province= mysqli_real_escape_string($connection, $_POST['province']);
    $city= mysqli_real_escape_string($connection, $_POST['city']);
    

    $Add_Order_query="INSERT INTO `user` (`user_id`, `First_name`, `Last_name`, `Username`, `DOB`, `Phone_no`, `Address`, `Province`, `City`) VALUES
    ('$UserID','$First_Name','$Last_Name','$Username','$DOB','$Contact_Number','$Address','$province','$city') ";
    

    $Add_query_run=mysqli_query($connection, $Add_Order_query);
    if($Add_query_run){
        $_SESSION['message']="New User Added Successfully!";
        header('Location: ../Admin/pages/users/users.php');
    }
    else{
        redirect("../Admin/pages/users/users.php","Something Went Wrong!");

        }
    }

elseif(isset($_POST['Add-Sales'])){

    $Order_ID= mysqli_real_escape_string($connection, $_POST['OrderID']);
    $Product_Code= mysqli_real_escape_string($connection, $_POST['Product_Code']);
    $Quantity= mysqli_real_escape_string($connection, $_POST['Quantity']);
    $Cost_Price= mysqli_real_escape_string($connection, $_POST['Cost_Price']);
    $Selling_Price= mysqli_real_escape_string($connection, $_POST['Selling_Price']);
    $Profit= mysqli_real_escape_string($connection, $_POST['Profit']);
    $Category= mysqli_real_escape_string($connection, $_POST['Category']);

    $Add_Sale_query="INSERT INTO `sales` (`OrderID`, `Product_Code`, `Category_name`, `Quantity`, `Sell_Price`, `Cost_Price`, `Total_Profit`) VALUES
    ('$Order_ID','$Product_Code','$Category','$Quantity','$Selling_Price','$Cost_Price','$Profit') ";
    

    $Adds_query_run=mysqli_query($connection, $Add_Sale_query);
    if($Adds_query_run){
        $_SESSION['message']="New Sale Added Successfully!";
        header('Location: ../Admin/pages/invoice/invoice.php');
    }
    else{
        $_SESSION['message']="Something Went Wrong!";
        header('Location: ../Admin/pages/invoice/invoice.php');

        }
    }    

elseif(isset($_POST['Edit-Sales'])){

    $Order_ID= mysqli_real_escape_string($connection, $_POST['OrderID']);
    $Product_Code= mysqli_real_escape_string($connection, $_POST['Product_Code']);
    $Quantity= mysqli_real_escape_string($connection, $_POST['Quantity']);
    $Cost_Price= mysqli_real_escape_string($connection, $_POST['Cost_Price']);
    $Selling_Price= mysqli_real_escape_string($connection, $_POST['Selling_Price']);
    $Profit= mysqli_real_escape_string($connection, $_POST['Profit']);
    $Category= mysqli_real_escape_string($connection, $_POST['Category']);
    
    $Edit_Order_query="UPDATE `sales` SET `OrderID`='$Order_ID',`Product_Code`='$Product_Code',`Quantity`='$Quantity',`Cost_Price` = '$Cost_Price',`Sell_Price` = '$Selling_Price',`Total_Profit`='$Profit',`Category_name`='$Category' WHERE `OrderID`='$Order_ID';";
    

    $Edit_query_run=mysqli_query($connection, $Edit_Order_query);
    if($Edit_query_run){
        $_SESSION['message']="Sales Updated Successfully!";
        header('Location: ../Admin/pages/sales/sales.php');
    }
    else{
        $_SESSION['message']="Something Went Wrong!";
        header('Location: ../Admin/pages/sales/sales.php');

        }
    }
    
    elseif(isset($_POST['Delete_user'])){
        $old_id=$_GET['userid'];
        $old_pn=$_GET['First_name'];
        $Prod_Code= mysqli_real_escape_string($connection, $_POST['Prod_Code']);
    #        $Category_Code= mysqli_real_escape_string($connection, $_POST['Cat_Code']);
    #        $CategoryName= mysqli_real_escape_string($connection, $_POST['Cat_Name']);
    #        $Description= mysqli_real_escape_string($connection, $_POST['Descp']);
        
        
        $user_query="DELETE FROM user WHERE `user_id` = '$old_id';";
    
        $user_query_run=mysqli_query($connection, $user_query);
        if($user_query_run){
            $_SESSION['message']="User deleted Successfully!";
            header('Location: ../Admin/pages/users/users.php');
        }
        else{
            $_SESSION['message']="Something Went Wrong!";
        header('Location: ../Admin/pages/users/users.php');
    
            }
    }

?>