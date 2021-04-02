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
    <title>STORIES LIST</title>
</head>

<?php
$conn=new PDO("mysql:host=localhost;dbname=writing","root","");
$sql=$conn->prepare("SELECT * FROM story");
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);

?>

<body bgcolor="yellow">



 <div style="background-color:green;width:100%;height:70px;padding-left:100px;padding-top:30px">
 <a href="poem_write.php"><button style="margin-left:70px;padding-left:70px"><b>WRITE POEM</b></button></a>
 <a href="story_write.php"><button style="margin-left:70px;padding-left:70px"><b>WRITE STORY</b></button></a>
 <a href="see_poems.php"><button style="margin-left:70px;padding-left:70px"><b>SEE ALL POEMS</b></button></a>
 <a href="see_stories_list.php"><button style="margin-left:70px;padding-left:70px"><b>SEE ALL STORIES</b></button></a>
 <a href="logout.php"><button style="margin-left:70px;padding-left:70px"><b>LOGOUT</b></button></a>
 </div>

<center><table cellpadding="10" cellspacing="0" border="1" style="margin-top:150px">
<th>POEM ID</th>
<th>STORY TITLE</th>
<th>DATE</th>
<th colspan="2">ACTION</th>
<?php
if(count($result)>0)
{
    foreach($result as $row)
    {
?>
<tr>
<td><?php echo $row['id'] ?></td>
<td><a href="see_fullstory.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></td>
<td><?php echo $row['date'] ?></td>
<td><a href="edit_story.php?id=<?php echo $row['id'] ?>">EDIT</a></td>
<td><a href="delete_story.php?id=<?php echo $row['id'] ?>">DELETE</a></td>
</tr>



<?php }} ?>
</table><center>
</body>
</html>
<?php
}
else
{
    header("location:index.php?msg= LOGIN FIRST");
}

?>