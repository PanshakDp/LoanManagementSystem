<html>
    <style>
        #admintable{
            width: 100%;
            text-align: center;
        }
        th {
             border:  1px solid darkcyan;
             padding: 10px;
             font-size: 20px;
        }
        td{
            padding: 10px;
            color: blanchedalmond;
            background-color: darkcyan;
            font-size: 18px;
        }
        .logout{
            margin: 10px;
            top: 0;
            float: right;
            right: 0;
        }
        .link{
        width: auto;
        height: auto;
        text-align: center;
        justify-content: center;
        color: blanchedalmond ;
        background-color: darkcyan;
        text-decoration: none;
        }
        .link:hover{
            color: red;
        }
        a{
            text-decoration: none;  
        }
        a:visited{
            color: inherit;
        }
        a:active{
            color: inherit;
        }
    </style>
</html>
<?php
    if(isset($_SESSION) && !isset($_GET['view'])) {
        require '../main/connection.php';

        $sql = "SELECT * FROM userdata";
        $result = $conn->query($sql);
        $flag = 0;
        if($result->num_rows > 0 ) {
            echo "<table id='admintable'>".
            "<tr>".
            "<th>ID</th>".
            "<th>Name</th>".
            "<th>Email</th>".
            "<th>Purpose</th>".
            "<th>Status</th>".
            "<th>View</td>".
            "</tr>";
            while($row = $result->fetch_assoc()) {
                if($row['STATUS'] == 'PENDING') {
                    $_SESSION['view'] = 'YES';
                    echo "<tr>".
                    "<td>".$row['ID']."</td>".
                    "<td>".$row['FIRSTNAME'].' '.$row['LASTNAME']."</td>".
                    "<td>".$row['EMAIL']."</td>".
                    "<td>".$row['PURPOSE']."</td>".
                    "<td    >".$row['STATUS']."</td>".
                    "<td><a href='applications.php?view=true&id=".$row['ID']."'><div class='link' >View</div></a></td>".
                    "</tr>"; 
                }
                else {
                    $flag += 1;
                }
            }
            "</table>";
        }
        if($flag == $result->num_rows || $result->num_rows == 0) {
            echo "<div style='text-align:center; margin-top:20px'>No Records Found</div>";
        }
        echo '<form action="adminout.php" method="POST">
                <button class="logout" id="btn" type="submit" name="adminout">Logout</button>
            </form>';
    }
?>