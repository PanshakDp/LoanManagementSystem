<html>
    <head></head>
    <style>
        #old{
            width: 100%;
            display: flex;
            justify-content: center;
        }
        #oldform{
            width: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #oldform > label {
            margin-bottom: 5px;
        }
        #status {
            background-color: blanchedalmond !important;
        }
        #oldform > input, #status {
            padding: 5px;
            background-color: whitesmoke;
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
            margin: 10px;
            /* z-index: 3; */
            float: right;
        }
        .btn:hover{
            cursor: pointer;
            border: 1px solid darkcyan;
            background-color: blanchedalmond;
            color: darkcyan;
        }
        #msg {
            height: 20%;
            width: 100%;
            align-items: center;     
            font-size: 20px;
            position: absolute;
            display: flex;
            justify-content: center;
            color: darkcyan;
        }
    </style>
        <?php
        $oldemail = $email;
            if(isset($_GET['save'])) {
                require '../main/connection.php';

                $newemail = $_GET['email'];
                $sql = "UPDATE userdata SET EMAIL=? WHERE EMAIL=?";
                $stmt = $conn->stmt_init();

                if (!($stmt->prepare($sql))) {
                    header("Location:login.php?login-error=SQLerrorSAVE");
                    exit();
                }
                else {
                    $stmt->bind_param("ss", $newemail, $oldemail);
                    $stmt->execute();
                    $email = $newemail;
                    echo "<div style='top: 12px; height: 0;' id='msg'>".$_GET['save']."</div>";
                }
                $stmt->close();
                $conn->close();
            }
            if(isset($_GET['delete'])) {
                require '../main/connection.php';

                $sql = "DELETE FROM userdata WHERE EMAIL=?";
                $stmt = $conn->stmt_init();

                if (!($stmt->prepare($sql))) {
                    header("Location:login.php?login-error=SQLerrorDELETE");
                    exit();
                }
                else {
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    unset($_GET['delete']);
                    session_unset();
                    session_destroy();
                    echo "<meta http-equiv='refresh' content='0; URL='logout.php?login-success=Application Deleted''/>" ;
                    exit();
                }
                $stmt->close();
                $conn->close();
            }
        ?>
            <body>
        <form action="logout.php" method="POST">
                    <button class="btn logout" type="submit" name="logout">Logout</button>
            </form>
        <div id="old">  
            <form id="oldform">
            <label style="text-align:center;"><h1>Applied Form</h1></label>
            <br>
            <div>
                <label for="status">Status : </label>
                <input id="status" type="text" name="status"  disabled value="<?php echo $status; ?>">
            </div>
            <br>
            <label for="fname">First Name</label>
            <input type="text" name="fname" disabled value="<?php echo $fname; ?>">
            <br>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" disabled value="<?php echo $lname; ?>">
            <br>
            <label for="email">Email <span style="color: darkcyan;">(Can be changed)</span></label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <br>
            <label for="age">Age</label>
            <input type="text" name="age" disabled value="<?php echo $age; ?>">
            <br>
            <label for="dob">DOB</label>
            <input type="text" name="dob" disabled value="<?php echo $dob; ?>">
            <br>
            <label for="income">Income</label>
            <input type="text" name="income" disabled value="<?php echo $income; ?>">
            <br>
            <label for="amount">Amount</label>
            <input type="text" name="amount" disabled value="<?php echo $amount; ?>">
            <br>
            <label for="purpose">Purpose</label>
            <input type="text" name="purpose" disabled value="<?php echo $purpose; ?>">
            <br>
            <label for="tenure">Tenure</label>
            <input type="text" name="tenure" disabled value="<?php echo $tenure; ?>">
            <br>
            <hr>
            <button class="btn" name="save" type="submit" value="Updated Successfull">Save Changes</button>
            <br>
            <button class="btn" name="delete" type="submit" value="Application Deleted Successfully">Delete Application</button>
            </form>
        </div>
    </body>
    <script>
        let status = document.getElementById('status');
        if(status.value == 'REJECTED') {
            status.style.color = 'red';
        }
        else if (status.value == 'ACCEPTED') {
            status.style.color = 'darkcyan';
        }
        else {
            status.style.color = 'purple';
        }
    </script>
</html>