<html>
    <head>
        <title>Admin : Logged-In</title>    
    </head>
    <?php 
        if(isset($_POST)){
            require '../main/connection.php';

            $adminname = $_POST['adminname'];
            $adminpass = $_POST['adminpwd'];

            $sql = "SELECT * FROM admin WHERE AID=? OR APWD=?";
            $stmt = $conn->stmt_init();

            if (!($stmt->prepare($sql))) {
                header("Location:admin.php?admin-error=SQLerrorADMIN");
                exit();
            }
            else {
                $stmt->bind_param("ss", $adminname, $adminpass);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($adminname == $row['AID']) {
                            if($adminpass == $row['APWD'] && $adminname == $row['AID']) {
                                session_start();
                                $_SESSION['AID'] = $row['AID'];
                                header("Location:admin.php?admin-success=Logged-In");
                                exit();
                            }
                            else {
                                header("Location:admin.php?admin-error=Incorrect Credentials");
                                exit();
                            }
                        }
                    }
                }
                else {
                    header("Location:admin.php?admin-error=No User Found");
                    exit();
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
    <body>
    </body>
</html>