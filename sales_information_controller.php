<?php

require 'sales_information_view.php';
require 'sales_information_view_add.php';
require 'sales_information_view_edit.php';

class SalesInformationController {
    private $model;

    public function __construct(SalesInformationModel $model) {
        $this->model = $model;
    }

    public function index() {
        if (!isset($_GET['id'])) $_GET['id'] = 501;

        $data['product_id'] = $_GET['id'];
        $data['product'] = $this->model->getProductById($data['product_id']);
        $data['sales_info'] = json_encode($this->model->getSalesInfoById($data['product_id']));
        $salesInfView = new SalesInformationView();
        $salesInfView->render($data);
    }

    public function add() {
        
        if (!isset($_GET['id'])) $_GET['id'] = 501;

        $data['product_id'] = $_GET['id'];
        $data['product'] = $this->model->getProductById($data['product_id']);
        $data['attribute'] = $this->model->getAttributes(explode(';', $data['product']['variation']));
        $attribute = array();
        foreach ($data['attribute'] as $attr) {
            $attribute[$attr['attr_name']] = $attr['attr_value'];
        }
        $data['attribute'] = json_encode($attribute);
        $salesInfView = new SalesInformationAddView();
        $salesInfView->render($data);
    }

    public function edit() {
        
        if (!isset($_GET['id'])) $_GET['id'] = 501;

        $data['product_id'] = $_GET['id'];
        $data['product'] = $this->model->getProductById($data['product_id']);
        $data['attribute'] = $this->model->getAttributes(explode(';', $data['product']['variation']));
        $data['sales_info'] = json_encode($this->model->getSalesInfoById($data['product_id']));
        $attribute = array();
        foreach ($data['attribute'] as $attr) {
            $attribute[$attr['attr_name']] = $attr['attr_value'];
        }
        $data['attribute'] = json_encode($attribute);
        $salesInfView = new SalesInformationEditView();
        $salesInfView->render($data);
    }

    public function saveData() {
        $data = array();
        foreach (json_decode($_POST['record'], true) as $value) {
            if ($value['variation_img']) {
                $imageData = $value['variation_img'];
                list($type, $imageData) = explode(';', $imageData);
                list(, $imageData)      = explode(',', $imageData);
                $imageData = base64_decode($imageData);
                $extension = '';
                if (strpos($type, 'image/jpeg') !== false) {
                    $extension = 'jpg';
                } elseif (strpos($type, 'image/png') !== false) {
                    $extension = 'png';
                } elseif (strpos($type, 'image/gif') !== false) {
                    $extension = 'gif';
                } elseif (strpos($type, 'image/webp') !== false) {
                    $extension = 'webp';
                } else {
                    array_push($data, $value);
                    continue;
                }
                $datetime = new DateTime();
                $datetime_string = $datetime->format('Y-m-d H:i:s');
                $hashed_file_name = md5($datetime_string . "_" . $value['product_id'] . "_" . $value['variation_name']);
                $file_path = 'images/' . $hashed_file_name . "." . $extension;
                $value['variation_img'] = $file_path;
                file_put_contents($file_path, $imageData);
            }
            array_push($data, $value);
        }
        $this->model->upsertSalesInfo($_POST['product_id'], $data);
        echo json_encode(["status" => "success", "message" => $data]);
    }
}
?>
