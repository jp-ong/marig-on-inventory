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
    <script src="https://kit.fontawesome.com/b20e5faf37.js" crossorigin="anonymous"></script>
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
            <div class="table-header-col">Description</div>
            <div class="table-header-col">Quantity</div>
            <div class="table-header-col">Actions</div>
        </div>
        <div class="table-body">
            <?php
                $db = new MongoDB\Driver\Manager("mongodb+srv://phpmongoAdmin:phpmongoAdmin1234@ong-cluster-smaha.mongodb.net/phpmongo");
                $query = new MongoDB\Driver\Query([]);
                $rows = $db->executeQuery("phpmongo.items", $query);
                foreach($rows as $row){
                    echo "<div class='table-row'>";
                    echo "<div class='table-col col-id'>$row->item_id</div>";
                    echo "<div class='table-col col-des'>$row->item_desc</div>";
                    echo "<div class='table-col col-qty'>$row->item_qty</div>";
                    echo "<div class='table-col col-act'>
                    <button class='modify-button' onClick='modifyItem(\"$row->_id\",\"$row->item_id\",\"$row->item_desc\",\"$row->item_qty\")'>Modify</button>
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
                <input type="text" placeholder="Item ID" name="new-id" id="new-id">
                <input type="text" placeholder="Item Description" name="new-description" id="new-description">
                <input type="number" placeholder="Item Quantity" name="new-quantity" id="new-quantity">
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
                <input type="text" placeholder="Item ID" name="edit-id" id="edit-id">
                <input type="text" placeholder="Item Description" name="edit-description" id="edit-description">
                <input type="number" placeholder="Item Quantity" name="edit-quantity" id="edit-quantity">
            </div>
            <div class="modal-footer">
                <button class="save-button" type="submit">Save</button>
                <button class="cancel-button" type="button" onClick="closeModifyModal()">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>