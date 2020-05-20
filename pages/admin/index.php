<?php 
    session_start();
    if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]==false||$_SESSION["access_level"]!=2){
        header("Location: ../../");}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marig-On | Admin</title>
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
            <div class="table-header-col col-group-1">ID</div>
            <div class="table-header-col col-group-1">Name</div>
            <div class="table-header-col col-group-1">Series</div>
            <div class="table-header-col col-group-1">Quantity</div>
            <div class="table-header-col col-group-2">Trend</div>
            <div class="table-header-col col-group-2">Created At</div>
            <div class="table-header-col col-group-2">Updated At</div>
            <div class="table-header-col col-group-2">Updated By</div>
            <div class="table-header-col col-group-1">Actions</div>
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
                    echo "<div class='table-col col-group-1-data'>$row->item_qty</div>";
                    echo "<div class='table-col col-group-2-data'>$row->trend_val</div>";
                    echo "<div class='table-col col-group-2-data'>$row->createdAt</div>";
                    echo "<div class='table-col col-group-2-data'>$row->updatedAt</div>";
                    echo "<div class='table-col col-group-2-data'>$row->updatedBy</div>";
                    echo "<div class='table-col col-group-1'>
                    <button class='modify-button' onClick='modifyItem(\"$row->_id\",\"$row->item_id\",\"$row->item_name\",\"$row->item_series\",\"$row->item_qty\",\"$row->trend_val\",\"$row->createdAt\")'>Modify</button>
                    <button class='delete-button' onClick='deleteItem(\"$row->_id\")'>Delete</button></div>";
                    echo "</div>";
                };
            ?>
        </div>
        <button class="add-button" type="button" onClick="openAddModal()">Add Item</button>
    </div>
    <div class="modal" id="add-modal">
        <div class="modal-header">NEW ITEM</div>
        <form method="POST" action="../../actions/addItem.php">
            <div class="modal-body">
                <input type="text" placeholder="ID" name="new-id" id="new-id">
                <input type="text" placeholder="Name" name="new-name" id="new-name">
                <input type="text" placeholder="Series" name="new-series" id="new-series">
                <input type="number" placeholder="Quantity" name="new-quantity" id="new-quantity">
                <input type="text" placeholder="Trend" name="new-trend" id="new-trend">
            </div>
            <div class="modal-footer">
                <button class="save-button" type="submit">Add</button>
                <button class="cancel-button" type="button" onClick="closeAddModal()">Cancel</button>
            </div>
        </form>
    </div>
    <div class="modal" id="modify-modal">
        <div class="modal-header">MODIFY</div>
        <form method="POST" action="../../actions/modifyItem.php">
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="created-at" id="created-at">
                <input type="text" placeholder="ID" name="edit-id" id="edit-id">
                <input type="text" placeholder="Name" name="edit-name" id="edit-name">
                <input type="text" placeholder="Series" name="edit-series" id="edit-series">
                <input type="number" placeholder="Quantity" name="edit-quantity" id="edit-quantity">
                <input type="text" placeholder="Trend" name="edit-trend" id="edit-trend">
            </div>
            <div class="modal-footer">
                <button class="save-button" type="submit">Save</button>
                <button class="cancel-button" type="button" onClick="closeModifyModal()">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>