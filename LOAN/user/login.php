<?php session_start(); ?>
<html>

    <head>
    <link rel="stylesheet" href="/LOAN/main/style.css">
    </head>
    <style>
        #login{
            height: 80%;
            width: 100%;
            display: flex;
            position: fixed;
            justify-content: center;
        }
        #loginform{
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #loginform > label {
            margin-bottom: 5px;
        }
        #loginform > input {
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

        .new{
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .newform{
            width: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .newform > label {
            margin-bottom: 5px;
        }
        #status {
            background-color: blanchedalmond !important;
        }
        .newform > input, #status, select {
            padding: 5px;
            background-color: white;
            height: 30px;
            border: darkcyan;
            font-size: 18px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .btn{
            text-align: center;
            justify-content: center;
            font-size: 18px;
            height: 40px;
            border: none;
            background-color: darkcyan;
            color: blanchedalmond;
        }
        .logout{
            position: absolute;
            margin: 10px;
            top: 0;
            right: 0;
        }
        .btn:hover{
            cursor: pointer;
            border: 1px solid darkcyan;
            background-color: blanchedalmond;
            color: darkcyan;
        }
        .radio{
            display: flex;
            justify-content: center;
        }
        .radio > label {
            margin-right: 20px;
        }
    </style>
    <body>
        <?php
            $userlogin = '<div id="login"><form id="loginform" action="loginAut.php" method="POST">
                                    <label for="uname">User Name</label>
                                    <input type="text" name="uname" required placeholder="Enter Username" maxlength="20">
                                    <br><br>
                                    <label for="upwd">Password</label>
                                    <input type="password" name="upwd" required placeholder="Enter Your Password" maxlength="15">
                                    <br><br>
                                    <button id="btn" type="submit" name="user-login">Login</button>
                                    <br><br>
                                    <div style="text-align:center;">New User? <a href="register.php">SignUp</a></div>
                                    <br><br>
                                    <a style="text-align:center;" href="/LOAN/main/main.php">Go Back to Main-Page</a>
                                </form></div>';

            $newform = '<div class="new"><form class="newform" action="formAut.php" method="GET">
                                    <label style="text-align:center;"><h1>New Application</h1></label>
                                    <div>
                                    <input id="status" type="hidden" name="status" value="PENDING">
                                    </div>
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" maxlength="20" required>
                                    <br>
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" maxlength="20"  required>
                                    <br>
                                    <label for="email">EMail</label>
                                    <input type="email" name="email" maxlength="30" required>
                                    <br>
                                    <label for="age">Age</label>
                                    <input type="number" name="age" required min="18" max="60">
                                    <br>
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" required min="0000-00-00" max="2000-12-31">
                                    <br>
                                    <label for="income">Monthly Income (in Rs.)</label>
                                    <input type="number" name="income"  required min="10000" max="9999999">
                                    <br>
                                    <label for="amount">Loan Amount (in Rs.)</label>
                                    <input type="number" name="amount"  required min="10000" max="9999999">
                                    <br>
                                    <label for="purpose">Purpose</label>
                                    <select name="purpose"  required>
                                        <option value="">Select</option>
                                        <option value="Car Loan">Car Loan</option>
                                        <option value="Home Loan">Home Loan</option>
                                        <option value="Personal Loan">Personal Loan</option>
                                        <option value="Student Loan">Student Loan</option>
                                    </select>
                                    <br>
                                    <label for="tenure" >Tenure</label><br>
                                        <div class="radio">
                                        <input  type="radio" id="six" name="tenure" value="6 Months">
                                        <label for="6 Months">6 Months</label><br>
                                        <input  type="radio" id="tw" name="tenure" value="12 Months">
                                        <label for="12 Months">12 Months</label><br>
                                        <input  type="radio" id="tfour" name="tenure" value="24 Months">
                                        <label for="24 Months">24 Months</label><br>
                                        <input  type="radio" id="ttwo" name="tenure" value="32 Months">
                                        <label for="32 Months">32 Months</label>
                                        </div>
                                    <br>
                                    <button class="btn" type="submit" name="newuser">Submit</button>
                                </form></div>';
        ?>
        <?php
            if (isset($_SESSION['ID'])) {
                require '../main/connection.php';
                echo "<title>User Logged-In:".$_SESSION['ID']."</title>";
                $LOCK = 0;
                $id = $_SESSION['ID'];
                $sql = "SELECT ID FROM userdata WHERE ID=?";
                $stmt = $conn->stmt_init();

                if (!($stmt->prepare($sql))) {
                    header("Location:login.php?form-error=SQLerror1");
                    exit();
                }
                else {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->store_result();
                    $result = $stmt->num_rows;

                    if($result > 0) {
                        $sql = "SELECT * FROM userdata";
                        $result = $conn->query($sql);
                        
                        while($row = $result->fetch_assoc()) {
                            if($id == $row['ID']) {
                                $status = $row['STATUS'];
                                $fname = $row['FIRSTNAME'];
                                $lname = $row['LASTNAME'];
                                $email = $row['EMAIL'];
                                $age = $row['AGE'];
                                $dob = $row['DOB'];
                                $income = $row['INCOME'];
                                $amount = $row['AMOUNT'];
                                $purpose = $row['PURPOSE'];
                                $tenure = $row['TENURE'];
                                $LOCK = 1;
                            }
                        }
                        if($LOCK == 1) {
                            require 'form.php';
                        }
                        if(isset($_GET['login-success'])) {
                            echo "<div style='top: 12px; height: 0;' id='msg'>".$_GET['login-success']."</div>";
                        }
                    }
                    else {
                        echo $newform;
                        echo '<form action="logout.php" method="POST">
                                    <button class="logout" id="btn" type="submit" name="logout">Logout</button>
                                </form>';
                        if(isset($_GET['login-error'])) {
                            echo "<div style='top:15px; position:absolute; height: 0% ;' id='msg'>".$_GET['login-error']."</div>";
                        }
                    }
                }
            }
            else {
                echo "<title>User Login</title>";
                if(isset($_GET['login-error'])) {
                    echo "<div id='msg'>".$_GET['login-error']."</div>";
                }
                if(isset($_GET['delete'])) {
                    echo "<div id='msg'>".$_GET['delete']."</div>";
                }
                echo $userlogin;
            }
        ?>
    </body>
</html>