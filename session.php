

<?php

$con = mysqli_connect("localhost", "root", "", "WEBTECH");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user=$_POST["user"];
    $pwd=$_POST["pwd"];
	
    
    }
    $qq="SELECT * FROM WEBTECH WHERE uname='$user' AND  pwd='$pwd'";
    $res3=mysqli_query($con,$qq);
    if(mysqli_num_rows($res3)==1){
session_start();
$_SESSION['name=$user;
header("Location:home.php");
exit();
    }
    else{
        echo "<script> window.location.href = 'home.php#login';alert('Username or Password incorrect....Please try again');</script>";
        
    }
/*else{
    echo "Not a member fo the trust \n,Please <a href='login.php' ><button >Sign up</button></a> to continue";
}*/

session_unset();
?>

