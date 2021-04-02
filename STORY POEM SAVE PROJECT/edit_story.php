<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WRITE STORY</title>
</head>
<body bgcolor="yellow">

<?php
$conn=new PDO("mysql:host=localhost;dbname=writing","root","");
if(isset($_POST['update']))
{
    $date=date("Y/m/d");
$sql=$conn->prepare("update story set title=?,date=?,story_data=? where id=?");
if($sql->execute(["{$_POST['title']}","{$date}","{$_POST['story_data']}","{$_POST['id']}"]))
{
       header("location:profile.php?msg=your story updated successfully");
}
else
{
    header("location:edit_story.php?msg=something went wrong");
}
}
?>

<center><h1 style="font-style:italic;color:green">Write your beutiful story below</h1></center>
<center><div style="background-color:yellow;height:500px;width:700px;margin-top:50px">
       <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
       
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
$conn=new PDO("mysql:host=localhost;dbname=writing","root","");
$sql=$conn->prepare("SELECT * FROM story where id=?");
$sql->execute(["$id"]);
$result=$sql->fetchAll();
if(count($result)>0)
{
    foreach($result as $row)
    {
?>
                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
        <center><input style="color:green;font-weight:bold" type="text" name="title" value="<?php echo $row['title']; ?>" autocomplete="off" required></center>
        <textarea  style="color:blue;font-style: italic" cols="90" rows="30" name="story_data" required><?php echo $row['story_data'] ?></textarea>
         <center><input type="submit" name="update" value="UPDATE"></center>
         <?php }} ?>
       </form>
    </div><center>
    <br><a href="profile.php"><button>GO TO PROFILE</button></a>
</body>
</html>
<?php
}

else
{
    header("location:index.php?msg= LOGIN FIRST");
}

?>