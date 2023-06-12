<?php include 'loginhead.php'; ?>
<body>
<div class="d-flex align-items-center justify-content-center">

    <div class="containerform d-flex align-items-center justify-content-center">

          <!-- Pills content -->
          <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
              <form action="functions/authcodes.php" method="POST">
                <div class="text-center mb-3">
                  <p>Sign in with:</p>
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f" style="color:#87B96E;"></i>
                  </button>
          
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google" style="color:#87B96E;"></i>
                  </button>
          
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter" style="color:#87B96E;"></i>
                  </button>
          
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github" style="color:#87B96E;"></i>
                  </button>
                </div>
          
                <p class="text-center">OR:</p>
          
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="username" id="loginName" class="form-control" required/>
                  <label class="form-label" for="loginName">Email or username</label>
                </div>
          
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="loginPassword" name="password" class="form-control" required/>
                  <label class="form-label" for="loginPassword">Password</label>
                </div>
          <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <button type="submit" name="login_btn" class="btn  btn-block mb-6" style="background-color: #87B96E; color: #fff;">
                <a id="tab-login" href="../admin/pages/dashboard/dashboard.php" style="text-decoration: none; color:#fff;">Login</a></button>
            </li>
        </ul>
          <!-- Pills navs -->
        
                <!-- 2 column grid layout -->
                <div class="row mb-4">
                  <div class="col-md-6 d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-3 mb-md-0">
                      <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked style="background-color: #87B96E;" />
                      <label class="form-check-label" for="loginCheck"> Remember me </label>
                    </div>
                  </div>
          
                  <div class="col-md-6 d-flex justify-content-center">
                    <!-- Simple link -->
                    <a href="#!" style="color:#486834;"><b>Forgot password?</b></a>
                  </div>
                </div>
          
                <!-- Register buttons -->
                <div class="text-center">
                  <p>Not a member? <a href="signUp.php" style="color: #87B96E;">Register</a></p>
                </div>
              </form>
            </div>
            
          </div>
          <!-- Pills content -->
    </div>

</div>
</body>