<?php 
    session_start();
    if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]==false||$_SESSION["access_level"]!=0){
        header("Location: ../../");}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marig-On | Guest</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <script src="../../assets/js/script.js"></script>
    <link rel="icon" href="../../assets/img/logo.png" />
</head>

<body>
    <nav>
        <div class="nav-left">
            <div class="brand-container">
                <a href="">
                    <span class="brand-prm">MARIG-ON</span>
                    <span class="brand-sec">Inventory</span>
                </a>
            </div>
        </div>
        <div class="nav-right">
            <div class="user-container">
                <div class="user-details"><span class="user-label">Username:</span>
                    <span class="user-text"><?php echo $_SESSION["username"];?></span>
                </div>
                <div class="user-details">
                    <span class="user-label">Access Level:</span>
                    <span class="user-text"><?php echo $_SESSION["access_level"];?></span>
                </div>
            </div>
            <div class="logout-button-container">
                <button class="logout-button" onClick='signout()'>Logout</button>
            </div>
        </div>
        <a class="back-button" href="../about/">View Team</a>
    </nav>


    <div class="table-container">
        <div class="table-header-row">
            <div class="table-header-col">ID</div>
            <div class="table-header-col">Name</div>
            <div class="table-header-col">Series</div>
        </div>
        <div class="table-body">
            <?php
                include('../../config/connect.php');
                $query = new MongoDB\Driver\Query([]);
                $rows = $db->executeQuery("phpmongo.items", $query);
                foreach($rows as $row){
                    echo "<div class='table-row'>";
                    echo "<div class='table-col col-group-1-data'>$row->item_id</div>";
                    echo "<div class='table-col col-group-1-data'>$row->item_name</div>";
                    echo "<div class='table-col col-group-1-data'>$row->item_series</div>";
                    echo "</div>";
                };
            ?>
        </div>
    </div>
</body>

</html>