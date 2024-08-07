<?php

class SalesInformationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tbl_product WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $products[0];
    }

    public function getAttrByProductId($id) {
        $stmt = $this->db->prepare("SELECT attr_name, attr_value FROM tbl_attribute WHERE product_id = ? GROUP BY attr_name");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $products;
    }

}
