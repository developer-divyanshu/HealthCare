<?php
   include("parts/conn.php");
   session_start();
   if(isset($_SESSION['login_user'])){
       header("Location: dashboard.php");
   }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($mysqli,$_POST['email']);
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['psw']); 
      
      $sql = "SELECT * FROM patient_login WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         if($row["is_active"]!=0){
            $_SESSION['login_user'] = $myusername;
            $_SESSION['logged_in'] = True;
            header("Location: registration.php");
         }else{
            echo '<script>alert("Your Account is not verified")</script>';
         }
      }else {
         echo '<script>alert("Your Email or Password is invalid")</script>';
      }
   }
   
?>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <header id="header">
        <div class="mainheader">
            <div class="logo">
                <a href="index.php"><img src="assets/images/logo.png" alt="logo"></a>
            </div>
            <nav>
                <a href="">Home</a>
                <?php if(!isset($_SESSION['login_user'])){echo '<a href="#" onclick="return false;" id="login">Login</a>';} ?>
                <?php if(!isset($_SESSION['login_user'])){echo '<a href="#" id="signup" onclick="return false;">Sign up</a>';} ?>
                
                <a href="#" id="inst">Instructions</a>
            </nav>
            <div class="menubtn">
            <div class="dropdown">
                    <button class="dropbtn">HelpLine</button>
                    <div class="dropdown-content">
                        <p style="font-size:17px;"><i class="fa fa-phone" style="margin-right: 10px;"></i> &nbsp;&nbsp; 011 2541201</p>
                        <hr style="border: 1px solid red; margin: 5px 0px;">
                        <p style="font-size:17px;"><i class="fa fa-envelope" style="margin-right: 10px;"></i> &nbsp;&nbsp; helpline@healthcare.com</p>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        
        <div class="signup_form" id="sign_up">
            <form action="insert.php" method="post" style="border:1px solid #ccc">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                 <hr>

                <div class="form_fields">
                    <div class="row">
                        <div class="col">
                        <label for="email"><b>First Name</b></label>
                        <input type="text" placeholder="Your First Name" name="fname" required>
                        </div>

                        <div class="col">
                        <label for="email"><b>Last Name</b></label>
                        <input type="text" placeholder="Your last Name" name="lname" required>
                        </div>
                    </div> 
            
                    <div class="row">
                        <div class="col">
                            <label for="email"><b>Email</b></label>
                            <input type="text" up="Enter Email" placeholder="Your Email" name="email" required>
        
                        </div>
                        <div class="col">
                            <label for="phone"><b>Phone Number</b></label>
                            <input type="number" up="Enter Phone" placeholder="Your Phone Number" name="phone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>
                        </div>
                        <div class="col">
                            <label for="psw-repeat"><b>Repeat Password</b></label>
                            <input type="password" placeholder="Repeat Password" name="rpsw" required>
                        </div>
                    </div>
                    
                    <!-- Instruction code is here  -->
            
                
                </div>
      
          <div class="clearfix">
            <button type="submit" class="signupbtn" name="signup">Sign Up</button>
          </div>
        </div>
      </form>
</div>
        <main>
            <section id="main_left_section" class="left">
                <h2>We Are Here For Your Care</h2>
                <h1>Best Hospitals and doctors!</h1>
                <p>Feeling not well? Book an appointment to consult with a doctor..</p>
                
                <div id="book_ap">
                <button>
                    Book Appointment
                </button>
                </div>
            </section>
            <section id="main_right_section" class="right">
                <figure>
                    <img id="left_png" src="assets/images/left_png.png" alt="" width="600">
                </figure>
            </section>
        </main>
    </header>

<!-- Creating Login Modal Here -->
<div class="modal_container" id="modal_container">
    <div class="modal">
        <div class="row">
            <div class="col left"></div>
            <div class="col right">
                <form action="" method="post" style="border:1px solid #ccc">
                    <div class="container">
                      <h1>Welcome</h1>
                      <p>Please Enter Your Login Credentials.</p>
                      <hr>
                     
                      <br>
                  
                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Enter Email" name="email" required>

                      
                  
                      <label for="psw"><b>Password</b></label>
                      <input type="password" placeholder="Enter Password" name="psw" required>
                      <a href="#">Forgot Password?</a>
                        
                  
                      <div class="clearfix">
                        <button type="button" id="cancelbtn" class="cancelbtn">Cancel</button>
                        <button type="submit" class="loginbtn">Login</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>

        </button>
    </div>
</div>




<script src="assets/js/main.js"></script>
<script>

    
</script>
</body>