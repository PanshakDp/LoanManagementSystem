<html>
    <head></head>
    <?php
        if(isset($_POST['user-register'])) {
             require '../main/connection.php';

            $sql = "SELECT * FROM user";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->store_result();
            $num = $stmt->num_rows;

            $newuser = $_POST['uNewname'];
            $newpass = md5($_POST['uNewpwd']);
            $cnewpass = md5($_POST['uNewCpwd']);
            $newid = $num + 1;

            if(empty($newuser) || empty($newpass) || empty($cnewpass)) {
                header("Location:login.php?user-reg=true&reg-error=Empty Fields");
                exit();
            }
            else if($newpass != $cnewpass) {
                header("Location:register.php?reg-error=Passwords are not same");
                exit();
            }
            else {
                $sql = "SELECT USERNAME FROM user WHERE USERNAME=?;";
                $stmt = $conn->stmt_init();
               
                if (!($stmt->prepare($sql))) {
                    header("Location:register.php?reg-error=SQLerror1");
                    exit();
                }
                else {
                    $stmt->bind_param("s", $newuser);
                    $stmt->execute();
                    $stmt->store_result();
                    $result = $stmt->num_rows;

                    if($result > 0) {
                        header("Location:register.php?reg-error=Username already taken");
                        exit();
                    }
                    else {
                        $sql = "INSERT INTO user(ID, USERNAME, PASSWORD) VALUES(?, ?, ?)";
                        $stmt = $conn->stmt_init();
                        
                        if (!($stmt->prepare($sql))) {
                            header("Location:register.php?reg-error=SQLerror2");
                            exit();
                        }
                        else {
                            $stmt->bind_param("iss", $newid, $newuser, $newpass);
                            $stmt->execute();
                            header("Location:register.php?reg-success=Registered Successfully&id=".$newid);
                            exit();
                        }
                    }
                }
            }
            $stmt->close();
            $conn->close();
        }
        else {
            header("Location:register.php?reg-error=NOTSET");
            exit;
        }
    ?>
</html>