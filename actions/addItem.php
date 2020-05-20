<?php
/* For every start of the system, it must be called first which user has been validated and shown at the top of the header page. */
    session_start();
    if((!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]==false)||($_SESSION["access_level"]!=1&&$_SESSION["access_level"]!=2)){
        header('Location: ../../');
    }
    //Gets new item details from POST form
    $bulk = new MongoDB\Driver\BulkWrite();
    $itemid = $_POST['new-id'];
    $name = $_POST['new-name'];
    $series = $_POST['new-series'];
    $quantity = $_POST['new-quantity'];
    $trend = $_POST['new-trend'];
    $username = $_SESSION['username'];
    date_default_timezone_set('Asia/Taipei');
    $item = [
        '_id' => new MongoDB\BSON\ObjectId,
        'item_id' => $itemid,
        'item_name' => $name,
        'item_series' => $series,
        'item_qty' => $quantity,
        'trend_val' => $trend,
        'createdAt' => date('d/m/Y h:i', time()),
        'updatedAt' => date('d/m/Y h:i', time()),
        'updatedBy' => $username
    ];

    //Appends item details to Items Collection in MongoDB
    try{
        $bulk->insert($item);
        include('../config/connect.php');
        $res = $db->executeBulkWrite('phpmongo.items', $bulk);
        if($_SESSION["access_level"]==2){
            header('Location: ../pages/admin/');
        } else {
            header('Location: ../pages/user/');
        }
    } catch(MongoDB\Driver\Exception\Exception $e){
        die('Error Encountered: '.$e);
    }
?>