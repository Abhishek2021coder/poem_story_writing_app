<?php 
session_start();
$title=$_POST['title'];
$author=$_SESSION['username'];
$date=date("Y/m/d");
$poem_data=$_POST['poem_data'];


$conn=new PDO("mysql:host=localhost;dbname=writing","root","");
$sql=$conn->prepare("insert into poem(title,author,date,poem_data) values(?,?,?,?)");
if($sql->execute(["$title","$author","$date","$poem_data"]))
{
       header("location:profile.php?msg=your poem saved successfully");
}
else
{
    echo "SOMETHING WENT WRONG";
}
?>