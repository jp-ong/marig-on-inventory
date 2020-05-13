<?php
    session_start();
    //Gets _id of item from POST form
    $bulk = new MongoDB\Driver\BulkWrite;
    $id = $_GET["id"];

    //Delets item from Items Collection using _id as query
    try{
        $bulk->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);
        $db = new MongoDB\Driver\Manager("mongodb+srv://phpmongoAdmin:phpmongoAdmin1234@ong-cluster-smaha.mongodb.net/phpmongo");
        $res = $db->executeBulkWrite('phpmongo.items', $bulk);
        header('Location: ../pages/admin/');
    } catch(MongoDB\Driver\Exception\Exception $e){
        die('Error Encountered: '.$e);
    }
?>