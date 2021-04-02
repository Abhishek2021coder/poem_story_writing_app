<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WRITE POEM</title>
</head>
<body bgcolor="yellow">
<center><h1 style="font-style:italic;color:green">Write your beutiful poem below</h1></center>
<center><div style="background-color:yellow;height:500px;width:700px;margin-top:50px">
       <form action="save_poem.php" method="post">
       
        <center><input style="color:green;font-weight:bold" type="text" name="title" placeholder="Enter Title" autocomplete="off" required></center>
        <textarea  style="color:blue;font-style: italic" cols="90" rows="30" name="poem_data" required></textarea>
         <center><input type="submit" value="SAVE"></center>
       </form>
    </div><center>
    <br><a href="profile.php"><button>BACK</button></a>
</body>
</html>