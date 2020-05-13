<?php
    session_start();
    //Gets new item details from POST form
    $bulk = new MongoDB\Driver\BulkWrite();
    $itemid = $_POST['new-id'];
    $description = $_POST['new-description'];
    $quantity = $_POST['new-quantity'];
    $item = [
        '_id' => new MongoDB\BSON\ObjectId,
        'item_id' => $itemid,
        'item_desc' => $description,
        'item_qty' => $quantity
    ];

    //Appends item details to Items Collection in MongoDB
    try{
        $bulk->insert($item);
        $db = new MongoDB\Driver\Manager('mongodb+srv://phpmongoAdmin:phpmongoAdmin1234@ong-cluster-smaha.mongodb.net/phpmongo');
        $res = $db->executeBulkWrite('phpmongo.items', $bulk);
        header('Location: ../pages/admin/');
    } catch(MongoDB\Driver\Exception\Exception $e){
        die('Error Encountered: '.$e);
    }
?>