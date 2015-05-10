<?php
require 'connect.inc.php';
require 'core.inc.php';

if(loggedin()){
$firstname=getuserfield('first_name');
$lastname=getuserfield('last_name');
echo "You are Signed in $firstname $lastname ";

echo '<br><a href="welcome.inc.php">HOME</a>';
}

else
include 'loginform.inc.php';
?>