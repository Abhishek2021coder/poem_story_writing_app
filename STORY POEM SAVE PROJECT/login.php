<?php 

$username=$_POST['username'];
$password=$_POST['password'];

$conn=new PDO("mysql:host=localhost;dbname=writing","root","");
$sql=$conn->prepare("SELECT * FROM user WHERE username=? AND pass=?");
$sql->execute(["$username","$password"]);
$result=$sql->fetchAll();

if(count($result))
{
    foreach($result as $row)
    {
    session_start();
    $_SESSION['id']=$row['id'];
    $_SESSION['fullname']=$row['fullname'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['pass'];
    }
    header("location:profile.php");
}
else
{
    header("location:index.php?msg=something went wrong");
}
?>