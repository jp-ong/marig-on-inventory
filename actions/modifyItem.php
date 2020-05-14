<?php
    session_start();
    if($_SESSION["access_level"]!=1&&$_SESSION["access_level"]!=2){
        header('Location: ../../');
    }
    //Gets new item details from POST form
    $bulk = new MongoDB\Driver\BulkWrite();
    $id = $_POST["id"];
    $itemid = $_POST["edit-id"];
    $description = $_POST["edit-description"];
    $quantity = $_POST["edit-quantity"];

    //Updates item detail using _id as query
    try{
        $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id)],
        [
            'item_id' => $itemid,
            'item_desc' => $description,
            'item_qty' => $quantity,
        ]);
        $db = new MongoDB\Driver\Manager('mongodb+srv://phpmongoAdmin:phpmongoAdmin1234@ong-cluster-smaha.mongodb.net/phpmongo');
        $res = $db->executeBulkWrite('phpmongo.items', $bulk);
        header('Location: ../pages/admin/');
    } catch(MongoDB\Driver\Exception\Exception $e){
        die('Error Encountered: '.$e);
    }
?>