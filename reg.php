<!DOCTYPE html>
<html>
<head>
	<title>Summer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php



include 'dbcon.php';

if(isset($_POST['submit']))
{
$username=mysqli_real_escape_string($con,$_POST['usrnm']);
$dob=mysqli_real_escape_string($con,$_POST['dob']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$psw=mysqli_real_escape_string($con,$_POST['psw']);
$cpsw=mysqli_real_escape_string($con,$_POST['cpsw']);




$pass=md5($psw);

$cpass=md5($cpsw);


$emailquery = "select * from registration1 where email='$email'";
$query=mysqli_query($con,$emailquery);
$emailcount=mysqli_num_rows($query);


$userquery = "select * from registration1 where username='$username'";
$uquery=mysqli_query($con,$userquery);
$ucount=mysqli_num_rows($uquery);


if(($emailcount>0)|| ($ucount>0))
{
  echo "Please enter unique and valid details";
}
else
{
  if($psw === $cpsw)
  {
$insertquery="INSERT INTO `registration1`(`Username`, `Email`, `Date Of Birth`, `Gender`, `password`, `cpassword`) VALUES ('$username','$email','$dob','$gender','$pass','$cpass')";
$iquery=mysqli_query($con,$insertquery);
if($iquery){
?>
<script >

  
alert("SignUp Successful");

</script>



<?php
}
else
{
  ?>
  <script >
  
alert("un Successful");

</script>
<?php
}
  }
  else
  {
    echo "Password not match";
  }
}















}

?>
	
    <div class="container">
    <div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">

                    <!-- form card login --><form action="" method="POST">
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-header">
                            <h3 class="mb-0">Registration</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="usrnm" id="uname1" required="">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="uname1">Email</label>
                                    <input type="email" class="form-control form-control-lg rounded-0" name="email" id="uname1" required="">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="uname1">Date Of Birth</label>
                                    <input type="date" class="form-control form-control-lg rounded-0" name="dob" id="uname1" required="">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="uname1">Gender</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="gender" id="uname1" required="">

                                    
                                </div>


                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" name="psw" autocomplete="new-password">
                                    <progress value="0" max="100" id="strength" style="width: 230px"></progress>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Password Check</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" name="cpsw" autocomplete="new-password">
                                    
                                </div>
                                <div>
                                    <label class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description small text-dark"><a href="index.php">Login</a></span>
                                    </label>
                                </div>

                                <button type="submit" name="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Register</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                </form>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->



<script type="text/javascript">
    var pass=document.getElementById('pwd1')
    pass.addEventListener('keyup',function(){
        checkPassword(pass.value)
    })
    function checkPassword(pwd1)
    {
        var strengthBar=document.getElementById("strength")
        var strength=0;
        if(pwd1.match(/[a-zA-Z0-9][a-zA-Z0-9]+/))
        {
            strength=+1;
        }
         if(pwd1.match(/[!@$%^()#]+/))
        {
            strength=+1;
        }
         if(pwd1.match(/[<>?`{}]+/))
        {
            strength=+1;
        }
        if(pwd1.length>5)
        {
            strength=+1;
        }
        switch(strength)
        {
            case 0:
            strengthBar.value=20;
            break
            case 1:
            strengthBar.value=40;
            break
            case 2:
            strengthBar.value=60;
            break
            case 3:
            strengthBar.value=80;
            break
            case 4:
            strengthBar.value=100;
            break
        }

    }
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>