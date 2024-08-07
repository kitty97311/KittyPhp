<?php

require 'sales_information_model.php';
require 'sales_information_controller.php';

// Connect to MySQL database
$db = new mysqli('localhost', 'root', '', 'shopee');

$salesInfModel = new SalesInformationModel($db);
$salesInfController = new SalesInformationController($salesInfModel);

$salesInfController->index();

$db->close();
?>