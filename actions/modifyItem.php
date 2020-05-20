<?php
/* For every start of the system, it must be called first which user has been validated and shown at the top of the header page. */
    session_start();
    if((!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]==false)||($_SESSION["access_level"]!=2)){
        header('Location: ../../');
    }
    //Gets new item details from POST form
    $bulk = new MongoDB\Driver\BulkWrite();
    $id = $_POST["id"];
    $itemid = $_POST["edit-id"];
    $name = $_POST["edit-name"];
    $series = $_POST["edit-series"];
    $quantity = $_POST["edit-quantity"];
    $trend = $_POST["edit-trend"];
    $created = $_POST["created-at"];
    $username = $_SESSION['username'];
    date_default_timezone_set('Asia/Taipei');

    //Updates item detail using _id as query
    try{
        $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id)],
        [
            'item_id' => $itemid,
            'item_name' => $name,
            'item_series' => $series,
            'item_qty' => $quantity,
            'trend_val' => $trend,
            'createdAt' => $created,
            'updatedAt' => date('d/m/Y h:i', time()),
            'updatedBy' => $username
        ]);
        
        include('../config/connect.php');
        $res = $db->executeBulkWrite('phpmongo.items', $bulk);
        header('Location: ../pages/admin/');
    } catch(MongoDB\Driver\Exception\Exception $e){
        die('Error Encountered: '.$e);
    }
?>