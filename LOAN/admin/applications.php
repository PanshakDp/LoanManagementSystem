<?php session_start(); ?>
<html>
    <head></head>
    <link rel="stylesheet" href="/LOAN/main/style.css">
    <style>
        #app{
            width: 100%;
            display: flex;
            justify-content: center;
        }
        #appform{
            margin-top: 70px;
            width: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #appform > label {
            margin-bottom: 5px;
        }
        #appform > input, #status {
            padding: 5px;
            height: 30px;
            background-color: white;
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
            position: absolute;
            float: right;
        }
        .btn:hover{
            cursor: pointer;
            border: 1px solid darkcyan;
            background-color: blanchedalmond;
            color: darkcyan;
        }
        #status {
            background-color: blanchedalmond !important;
            color: purple;
            width: 100%;
            border: 1px dotted purple;
            text-align: center;
        }
        #msg {
            margin-top: 12px;
            width: 100%;
            align-items: center;     
            font-size: 20px;
            position: absolute;
            display: flex;
            justify-content: center;
            color: darkcyan;
        }
    </style>
    <!--###################### PHP CODE##################### -->
    <?php
    echo "<div id='msg'>Applicant ID : ".$_GET['id']."</div>";

    if(isset($_GET['view']) && isset($_SESSION['view'])) {
        require '../main/connection.php';
        $id = $_GET['id'];
        $_SESSION['checkID'] = $_GET['id'];
        $sql = "SELECT * FROM userdata WHERE ID=?";
        $stmt = $conn->stmt_init();

        echo "<title>Applicant ID : ".$_GET['id']."</title>";

        if (!($stmt->prepare($sql))) {
            header("Location:admin.php?admin-error=SQLerrorADMIN");
            exit();
        }
        else {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
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
            }
        }
        $stmt->close();
        $conn->close();
    }
    else {
        header("Location:admin.php");
        exit();
    }
    ?>
      <!--###################### HTML ##################### -->
    <body>
        <div id="app">
        <form id="appform" action="applicationoptions.php" method="GET">
        <div>
        <label style="color:darkcyan" for="status">Status</label>
        <input id='status' type="text" name="status"  disabled value="<?php echo $status; ?>">
        </div>
        <br>
        <label for="fname">First Name</label>
        <input type="text" name="fname" disabled value="<?php echo $fname; ?>">
        <br>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" disabled value="<?php echo $lname; ?>">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" disabled value="<?php echo $email; ?>">
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
        <button class="btn" name="reject" type="submit" value="Rejected">Reject</button>
        <br>
        <button class="btn" name="accept" type="submit" value="Accepted">Accept</button>
        <br>
        <button class="btn" name="back" type="submit" value="Back">Back</button>
        </form>
        <form action="adminout.php" method="POST">
                     <button class="btn logout" id="btn" type="submit" name="adminout">Logout</button>
        </form>
        </div>
    </body>
</html>