<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="/LOAN/main/style.css">
    </head>
    <style>
        #form{
            height: 80%;
            width: 100%;
            display: flex;
            position: fixed;
            justify-content: center;
        }
        #adminform{
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #adminform > label {
            margin-bottom: 5px;
        }
        #adminform > input {
            padding: 5px;
            height: 30px;
            border: darkcyan;
            font-size: 18px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        #msg {
            height: 20%;
            width: 100%;
            align-items: center;
            font-size: 20px;
            position: fixed;
            display: flex;
            justify-content: center;
            color: red;
        }
        #btn{
            justify-content: center;
            font-size: 18px;
            height: 40px;
            border: none;
            background-color: darkcyan;
            color: blanchedalmond;
        }
        #btn:hover{
            cursor: pointer;
            border: 1px solid darkcyan;
            background-color: blanchedalmond;
            color: darkcyan;
        }
    </style>
    <body>
        <?php
        if(isset($_SESSION['AID'])) {
            require 'applicationlist.php';
            
            if(isset($_GET['admin-success'])) {
                echo "<title>".$_GET['admin-success']."</title>";
            }
            else {
                echo "<title>Logged-In</title>";
            }
        }
        else {
            if(!isset($_GET['admin-success'])) {
                echo "<title>Admin Login</title>";
            }
            if(isset($_GET['admin-error'])) {
                echo "<div id='msg'>".$_GET['admin-error']."</div>";
            }
            echo '<div id="form"><form id="adminform" action="adminAut.php" method="POST" >
                    <br>
                    <label for="adminname">Admin Name</label>
                    <input type="text" name="adminname" placeholder="Enter Admin-name" min="4" max="10" required>
                    <br><br>
                    <label for="adminpwd">Password</label>
                    <input type="password" name="adminpwd" placeholder="Enter Password" min="5" max="10" required>
                    <br><br>
                    <button id="btn" type="submit" name="submit" >Login</button>
                    <br><br>
                    <a style="text-align:center;" href="/LOAN/main/main.php">Go Back to Main-Page</a>
                    </form>';
        }
        ?>
    </body>
</html>