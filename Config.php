<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=comikku', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Include model and service
include_once (__DIR__ . '/Models/ComicsModel.php');
include_once (__DIR__ . '/Services/ComicsService.php');

// Initialize model and service instances
$comicsModel = new ComicsModel($db);
$comicsService = new ComicsService($comicsModel);
?>