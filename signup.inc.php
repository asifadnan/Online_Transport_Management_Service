
<form action="<?php echo $current_file; ?>" method="POST">
First name:<br><input type='text' name='firstname'><br>
Last name:<br><input type='text' name='lastname'><br>
Username:<br><input type='text' name='username'><br>
Password:<br><input type='password' name='password'><br>
Verify Password:<br><input type='password' name='password2'><br>
Email_id:<br><input type='text' name='emailid'><br>
<br><input type='submit' value='Sign up'>
</form>

<?php
require 'connect.inc.php';

if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['firstname'])&&isset($_POST['password2'])&&isset($_POST['lastname'])&&isset($_POST['emailid']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$password2=$_POST['password2'];
$email=$_POST['emailid'];

if(!empty($username)&&!empty($password)&&!empty($password2)&&!empty($firstname)&&!empty($lastname)&&!empty($email))
  {
    $query="SELECT username FROM user WHERE username='$username'";
     $query_run=mysql_query($query);
     $n=mysql_num_rows($query_run);
   if($n>=1)
      echo 'Username already used.Please try another.';

   else if($password!=$password2)
    echo 'Password doesn\'t match.';

   else
     { $pass5=md5($password);
       $query="INSERT INTO user VALUES('','".$username."','".$pass5."','".$firstname."','".$lastname."','".$email."')";
     if($query_run=mysql_query($query))
       {echo 'Congratulations,You are Signed up Succesfully.';
       echo '<br><a href="index.php">HOME</a>';}
      else
      echo 'SORRY.TRY AGAIN.';
     }
  }
else
echo 'Please fill up all the requirements.';

}
?>