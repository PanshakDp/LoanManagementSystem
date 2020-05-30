<html>
    <head>
        <title>New User Registration</title>
        <link rel="stylesheet" href="/LOAN/main/style.css">
    <style>
        #reg{
            height: 100%;
            width: 100%;
            display: flex;
            position: fixed;
            justify-content: center;
        }
        #regform{
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #regform > label {
            margin-bottom: 5px;
        }
        #regform > input {
            padding: 5px;
            height: 30px;
            border: darkcyan;
            font-size: 18px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        #btn{
            justify-content: center;
            font-size: 18px;
            height: 40px;
            border: none;
            background-color: darkcyan;
            color: blanchedalmond;
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
        #btn:hover{
            cursor: pointer;
            border: 1px solid darkcyan;
            background-color: blanchedalmond;
            color: darkcyan;
        }
    </style>
    <body>
        <?php 
            if(isset($_GET['reg-success'])) {
                echo "<div id='msg' style='color:darkcyan;'>".$_GET['reg-success']."</div>";
            }
            if(isset($_GET['reg-error'])) {
                echo "<div id='msg'>".$_GET['reg-error']."</div>";
            }
        ?>
        <div id="reg">
            <form id="regform" action="registerAut.php" method="POST">
                <label for="uNewname">Enter Userame</label>
                <input type="text" name="uNewname" required placeholder="Enter New Username" maxlength="20">
                <br><br>
                <label for="uNewpwd">Enter Password</label>
                <input id="pwd" type="password" name="uNewpwd" required placeholder="Enter New Password" maxlength="15">
                <br><br>
                <label for="uNewCpwd">Confirm Password</label>
                <input id="Cpwd" type="password" name="uNewCpwd" required placeholder="Confirm Your Password">
                <br><br>
                <button id="btn" type="submit" name="user-register">Register</button>
                <br><br>
                <div style="text-align:center;">Already Registered? <a href="login.php">Login</a></div>
            </form>
        </div>
    </body>
</html>