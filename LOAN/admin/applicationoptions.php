<?php session_start(); ?>
<?php
    if(isset($_GET['accept'])) {
        require '../main/connection.php';
        $id = $_SESSION['checkID'];
        $newstatus = 'ACCEPTED';
        $sql = "UPDATE userdata SET STATUS=? WHERE ID=?;";
        $stmt = $conn->stmt_init();
        
        if (!($stmt->prepare($sql))) {
            header("Location:admin.php?admin-error=SQLerrorACCEPT");
            exit();
        }
        else {
            $stmt->bind_param("si", $newstatus, $id);
            $stmt->execute();
            $_SESSION['view'] = null;
            header("Location:applications.php?");
            exit();
        }
        $stmt->close();
        $conn->close();
    }
    if(isset($_GET['reject'])) {
        require '../main/connection.php';

        $id = $_SESSION['checkID'];
        $newstatus = 'REJECTED';
        $sql = "UPDATE userdata SET STATUS=? WHERE ID=?;";
        $stmt = $conn->stmt_init();
        
        if (!($stmt->prepare($sql))) {
            header("Location:admin.php?admin-error=SQLerrorREJECT");
            exit();
        }
        else {
            $stmt->bind_param("si", $newstatus, $id);
            $stmt->execute();
            $_SESSION['view'] = null;
            header("Location:applications.php?");
            exit();
        }
        $stmt->close();
        $conn->close();
    }

    if(isset($_GET['back'])) {
        $_SESSION['view'] = null;
        header("Location:applications.php?");
        exit();
    }
?>