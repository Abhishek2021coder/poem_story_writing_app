<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <a href="http://localhost/STORY%20POEM%20SAVE%20PROJECT/see_stories_list.php"><button style="margin-left:70px;padding-left:70px"><b>SEE ALL STORIES</b></button></a>
    <a href="logout.php"><button style="margin-left:70px;padding-left:70px"><b>LOGOUT</b></button></a>
    </div>
    <br><br><br><br><br><br>
    <center><h1>WELCOME <?php echo $_SESSION['fullname']; ?></h1></center>
    <?php if(isset($_GET['msg'])){ ?>
    <center><h1><?php echo $_GET['msg'] ?></h1></center>
    
    <?php } }
    else
    {
       header("location:index.php?msg= LOGIN FIRST");

    }
    ?>
</body>
</html>