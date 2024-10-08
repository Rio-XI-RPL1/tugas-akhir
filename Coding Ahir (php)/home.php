<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>

        <div class="right-link">

            <?php?
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_Id = $result['Id'];
            }

            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            >
 
            
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>
        
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_Email ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And you are <b>2<?php echo $res_Age ?> Years old</b>.</p>
                </div>
            </div>
        </div>

    </main>
</body>
</html>