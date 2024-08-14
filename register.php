<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <title>Register</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div class="container">
        <div class="box form-box">

            <?php

            include ("php/config.php");
            if (isset($_POST['submit'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $dob = $_POST['dob'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                //verifying the unique email
            
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");


                $today = new DateTime();
                $birthdate = new DateTime($dob);
                $age = $birthdate->diff($today)->y;
                // return $age >= 18;
            

                // Example usage:
                // $dateOfBirth = "2006-03-28"; // Change this to the date of birth you want to check
                if ($age > 18) {

                    if ($password != $cpassword) {
                        // echo "<div class='message'>
                        // <p>Passwords did not match</p>
                        // </div><br>";
                        // echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            
                        echo '<script>
            alert("Passwords did not match");
            window.location="register.php";
            </script>';
                    } else if (mysqli_num_rows($verify_query) != 0) {
                        // echo "<div class='message'>
                        //           <p>This email is used, Try another One Please!</p>
                        //       </div> <br>";
                        // echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            
                        echo '<script>
                alert("This email is used, Try another one Please!!!");
                window.location="register.php";
                </script>';

                    } else {

                        mysqli_query($con, "INSERT INTO users(Firstname,Lastname,Email,Mobile,DOB,Password) VALUES('$firstname','$lastname','$email','$mobile','$dob','$password')") or die("Error Occured");

                        // echo "<div class='message'>
                        //           <p>Registration successfully!</p>
                        //       </div> <br>";
                        // echo "<a href='login.php'><button class='btn'>Login Now</button>";
            
                        echo '<script>
                alert("Registration successfully!!!");
                window.location="login.php";
                </script>';

                    }

                    // echo "The person is 18 years old or older.";
                } else {
                    // echo "<div class='message'>
                    // <p>The person is under 18 years old.</P>
                    // </div><br>";
                    // echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            
                    echo '<script>
                alert("The person is under 18 years old.");
                window.location="register.php";
                </script>';
                }

            } else {
                ?>
                <div id="layoutAuthentication">
                    <div id="layoutAuthentication_content">
                        <main>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header">
                                                <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post">


                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name='firstname' id="firstname"
                                                                    type="text" placeholder="Enter your first name" />
                                                                <label for="firstname">First name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input class="form-control" name='lastname' id="lastname"
                                                                    type="text" placeholder="Enter your last name" />
                                                                <label for="lastname">Last name</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" name='email' id="email" type="email"
                                                            placeholder="name@example.com" />
                                                        <label for="email">Email address</label>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name='mobile' id="mobile"
                                                                    type="int" placeholder="Enter your mobile number"
                                                                    maxLength='10' />
                                                                <label for="mobile">Mobile Number</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input class="form-control" name='dob' id="dob" type="date"
                                                                    placeholder="Enter your last name" />
                                                                <label for="dob">Date of Birth</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name='password' id="password"
                                                                    type="password" placeholder="Create a password" />
                                                                <label for="password">Password</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name='cpassword' id="cpassword"
                                                                    type="password" placeholder="Confirm password" />
                                                                <label for="cpassword">Confirm Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                        <div class="d-grid"><input type='submit'
                                                                class="btn btn-primary btn-block" name='submit'
                                                                value='Create Account' href="login.php" /></div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer text-center py-3">
                                                <div class="small"><a href="login.php">Have an account? Go to login</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                    <div id="layoutAuthentication_footer">
                        <footer class="py-4 bg-light mt-auto">
                            <div class="container-fluid px-4">
                                <div class="d-flex align-items-center justify-content-between small">
                                    <div class="text-muted">Copyright &copy; CinchIT solutions, Belagavi.</div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>