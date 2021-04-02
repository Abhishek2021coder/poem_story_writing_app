<?php 
$conn=new PDO("mysql:host=localhost;dbname=writing","root","");
$sql=$conn->prepare("delete from story where id=?");
if($sql->execute(["{$_GET['id']}"]))
{
    header("location:see_stories_list.php?msg=deletion success");
}
else
{
    header("location:see_stories_list.php?msg=deletion failed");
}
?>