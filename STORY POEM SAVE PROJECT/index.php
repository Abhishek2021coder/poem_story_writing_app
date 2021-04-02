 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>LOGIN </title>
 </head>
 <body bgcolor="yellow">
     <center><div style="background-color:green;height:200px;width:400px;margin-top:200px">
     <form action="login.php" method="post">
     <table>
     <tr>
     <td><b>USERNAME</b></td>
     <td><input type="text" name="username" autocomplete="off" ></td>
     </tr>
     <br><br>
     <tr>
     <td><b>PASSWORD</b></td>
     <td><input type="password" name="password" autocomplete="off"></td>
     </tr>
     <br><br>
     <tr>
     <td><input type="submit" value="LOGIN"></td>
     </tr>
     </table>
     </form>
     </div><center>
     <?php
     if(isset($_GET['msg']))
     {
         ?>
         <div style="background-color:red;height:100px;width:400px;margin-top:40px;padding-top:40px">
         <center><h1><?php echo $_GET['msg'] ?></h1></center>
         </div>
     <?php }
     ?>
 </body>
 </html>