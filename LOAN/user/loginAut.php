<html>
    <head></head>
    <?php
        if(isset($_POST['user-login'])) {
            require '../main/connection.php';
            $loginuser = $_POST['uname'];
            $loginpass = md5($_POST['upwd']);

            if(empty($loginuser) || empty($loginpass)) {
                header("Location:login.php?login-error=Fields Empy");
                exit();
            }
            else {
                $sql = "SELECT * FROM user WHERE USERNAME=? OR PASSWORD=?";
                $stmt = $conn->stmt_init();

                if (!($stmt->prepare($sql))) {
                    header("Location:login.php?login-error=SQLerror");
                    exit();
                }
                else {
                    $stmt->bind_param("ss", $loginuser, $loginpass);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if($loginuser == $row['USERNAME']) {
                                if($loginpass == $row['PASSWORD'] && $loginuser == $row['USERNAME']) {
                                    session_start();
                                    $_SESSION['ID'] = $row['ID'];
                                    header("Location:login.php?login-success=User Logged-In&newapp=New Application&id=".$row['ID']);
                                    exit();
                                }
                                else {
                                    header("Location:login.php?login-error=Incorrect Credentials");
                                    exit();
                                }
                            }
                            else {
                                header("Location:login.php?login-error=No User Found");
                                exit();
                            }
                        }
                    }
                    else {
                        header("Location:login.php?login-error=No User Found");
                        exit();
                    }
                }
            }
            $stmt->close();
            $conn->close();
        }
        else {
            header("Location:login.php?login-error=Sorry No User Found");
            exit();
        }
    ?>
</html>