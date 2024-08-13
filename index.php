<?php

require 'sales_information_model.php';
require 'sales_information_controller.php';

// Connect to MySQL database
$db = new mysqli('localhost', 'root', '', 'shopee');

$salesInfModel = new SalesInformationModel($db);
$salesInfController = new SalesInformationController($salesInfModel);

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $salesInfController->add();
} else if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $salesInfController->edit();
} else if (isset($_POST['action']) && $_POST['action'] === 'save') {
    $salesInfController->saveData();
} else {
    $salesInfController->index();
}

$db->close();
?>