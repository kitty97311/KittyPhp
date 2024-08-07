<?php

require 'sales_information_view.php';

class SalesInformationController {
    private $model;

    public function __construct(SalesInformationModel $model) {
        $this->model = $model;
    }

    public function index() {

        if (!isset($_GET['id'])) $_GET['id'] = 501;

        $data['product'] = $this->model->getProductById($_GET['id']);
        $data['attribute'] = $this->model->getAttrByProductId($_GET['id']);
        $attribute = array();
        foreach ($data['attribute'] as $attr) {
            $attribute[$attr['attr_name']] = $attr['attr_value'];
        }
        $data['attribute'] = json_encode($attribute);
        $salesInfView = new SalesInformationView();
        $salesInfView->render($data);
}

    public function updateUserView() {
        // Fetch user data from the database and update the view
    }
}
?>
