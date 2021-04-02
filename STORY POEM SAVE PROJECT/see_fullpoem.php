<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FULL POEM</title>
</head>
<body bgcolor="yellow">
<?php 

session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
    ?>

 <div style="background-color:green;width:100%;height:70px;padding-left:100px;padding-top:30px">
 <a href="poem_write.php"><button style="margin-left:70px;padding-left:70px"><b>WRITE POEM</b></button></a>
 <a href="story_write.php"><button style="margin-left:70px;padding-left:70px"><b>WRITE STORY</b></button></a>
 <a href="see_poems.php"><button style="margin-left:70px;padding-left:70px"><b>SEE ALL POEMS</b></button></a>
 <a href="see_stories_list.php"><button style="margin-left:70px;padding-left:70px"><b>SEE ALL STORIES</b></button></a>
 <a href="logout.php"><button style="margin-left:70px;padding-left:70px"><b>LOGOUT</b></button></a>
 </div>
 <center><div id="div_poem" style=" display:table;background-color:black;height:500px;width:700px;margin-top:80px"><br>
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
$conn=new PDO("mysql:host=localhost;dbname=writing","root","");
$sql=$conn->prepare("SELECT * FROM poem where id=?");
$sql->execute(["$id"]);
$result=$sql->fetchAll();
if(count($result)>0)
{
    foreach($result as $row)
    {
?>
<center><b style="color:white;font-size:30px"><?php echo $row['title'] ?></b></center><br>
<p style="color:white"><?php echo $row['poem_data'] ?></p>

</div>
<?php 

if(isset($_GET['txt']) && isset($_GET['id'])){
    $id=$_GET['id'];
    $txt=$row['poem_data'];
    $txt=htmlspecialchars($txt);
    $txt=rawurlencode($txt);
    $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-IN');
    $player="<audio controls='controls' autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
    echo $player; 

  }
  


?>
<center><a href="edit_poem.php"><button>EDIT</button></a></center>
<a href="see_fullpoem.php?txt=true &id=<?php echo $row['id'] ?>"><button>TEXT TO SPEECH</button></a>
<?php }} 

}
else
{
    header("location:index.php?msg= LOGIN FIRST");
}
?>
</body>
</html>