<?php 
session_start();
include 'signhead.php'; ?>
<body>
<section class="h-100 bg-dark">
    <div class="containersign py-5 h-100 " >
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-4">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="login.jpeg" alt="Sample Photo" class="img-fluid" style="border-bottom-left-radius: 0.25rem;
                             border-top-left-radius:0.25rem;">
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body p-md-5 text-black"><br>
                                <h3 class="mb-5 text-uppercase" style="text-align: center;">SIGN UP</h3>
                                <?php if(isset($_SESSION['message'])) 
                                {   
                                    ?>
                                    <script>alert("Something Went Wrong")</script>
                                    <?php
                                    unset($_SESSION['message']);
                                }?>
                                <form class="row g-3" name="form1" action="functions/authcodes.php" method="POST">
                                    <div class="col-md-6">
                                      <label for="validationServer01" class="form-label">First name</label>
                                      <input type="text" class="form-control" name="fname" id="validationServer01" placeholder="First Name" required>
                                      
                                    </div>
                                    <div class="col-md-6">
                                      <label for="validationServer02" class="form-label">Last name</label>
                                      <input type="text" class="form-control" name="lname" id="validationServer02" placeholder="Last Name" required>
                                      
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationServer03" class="form-label">Date Of Birth</label>
                                        <input type="date" class="form-control" name="DOB" id="validationServer03" value="" required>
                                        
                                      </div>

                                    <div class="col-md-6">
                                      <label for="validationServer07" class="form-label">Phone Number</label>
                                      <input type="number" class="form-control" name="phone" id="validationServer07" required>
                                      
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationServerUsername" class="form-label">Username</label>
                                        <div class="input-group">
                                          <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                          <input type="text" name="username" class="form-control " id="validationServerUsername" aria-describedby="inputGroupPrepend3" required>
                                          
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <label class="form-label" for="loginPassword">Password</label>
                                        <input type="password" id="loginPassword" class="form-control" name="password" required/>
                                      </div>

                                      <div class="col-md-6">
                                        <label class="form-label" for="loginPassword">Confirm Password</label>
                                        <input type="password" id="loginPassword" class="form-control" name="cpassword" required/>
                                      </div>

                                      <div class="col-md-6">
                                        <label for="validationServer05" class="form-label">Province</label>
                                        <select class="form-select" name="province" id="validationServer05" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="Sindh">Sindh</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Balochistan">Balochistan</option>
                                        <option value="KPK">KPK</option>
                                        <option value="Gilgit-Baltistan">Gilgit-Baltistan</option>
                                        </select>
                                        
                                      </div>
                                    <div class="col-md-6">
                                      <label for="validationServer06" class="form-label">City</label>
                                      <select class="form-select " name="city" id="validationServer06" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="Karachi">Karachi</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Multan">Multan</option>
                                        <option value="Peshawar">Peshawar</option>
                                        <option value="Lahore">Lahore</option>
                                        <option value="Islamabad">Islamabad</option>
                                        <option value="Chitral">Chitral</option>
                                        <option value="Other">Other...</option>
                                      </select>
                                      
                                    </div>

                                      <div class="col-md-12">
                                        <label for="validationServer04" class="form-label">Address</label>
                                        <input type="text" class="form-control " name="Address" id="validationServer04" value="" required>
                                      </div>

                                    
                                    <div class="col-md-6">
                                        <label for="validationServer08" class="form-label">Payment Type</label>
                                        <select class="form-select" name="pay" id="validationServer08" required>
                                          <option selected disabled value="">Choose...</option>
                                          <option value="1">Card</option>
                                          <option value="2">Cash</option>
                                        </select>
                                        
                                      </div>
                                      
                                    <div class="col-12">
                                      <div class="form-check">
                                        <input class="form-check-input " type="checkbox" value="" id="invalidCheck3" required>
                                        <label class="form-check-label" for="invalidCheck3">
                                          Agree to terms and conditions
                                        </label>
                                        
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <button class="btn" name="register_btn"
                                      style="background-color: #87B96E; margin-left: 140px; text-decoration: none;" type="submit">Sign Up</button>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>