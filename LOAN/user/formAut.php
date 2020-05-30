<?php session_start(); ?>
<html>
    <head></head>
    <?php
        if(isset($_SESSION) && isset($_GET['newuser'])) {
            require '../main/connection.php';
            $status = $_GET['status'];
            $id = $_SESSION['ID'];
            $fname = $_GET['fname'];
            $lname = $_GET['lname'];
            $email = $_GET['email'];
            $age = $_GET['age'];
            $dob = $_GET['dob'];;
            $income = $_GET['income'];
            $amount = $_GET['amount'];
            $purpose = $_GET['purpose'];
            $tenure = $_GET['tenure'];

            $sql = "INSERT INTO userdata(ID, FIRSTNAME, LASTNAME, EMAIL, AGE, DOB, INCOME, AMOUNT, PURPOSE, TENURE, STATUS) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->stmt_init();
            if(!empty($tenure)) {
                if (!($stmt->prepare($sql))) {
                    header("Location:login.php?login-error=SQLerrorFORM");
                    exit();
                }
                else {
                    $stmt->bind_param("isssisiisss", $id, $fname, $lname, $email, $age, $dob, $income, $amount, $purpose, $tenure, $status);
                    $stmt->execute();
                    header("Location:login.php?login-success=Application Filled Successfully&id=".$id);
                    exit();
                }
            }
            else {
                header("Location:login.php?login-error=Some Fields Empty!");
                exit();
            }
        }
        else {
            header("Location:login.php?login-error=You Are Logged-OUT");
            exit();
        }
    ?>
</html>