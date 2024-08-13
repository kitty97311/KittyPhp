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

    public function getAttributes($attrArray) {
        $sql = "SELECT attr_name, attr_value FROM tbl_attribute ";
        foreach ($attrArray as $key => $value) {
            if ($key) {
                $sql .= "OR attr_name = '" . $value . "' ";
            } else {
                $sql .= "WHERE attr_name = '" . $value . "' ";
            }
        }
        $stmt = $this->db->prepare($sql);
        // $stmt->bind_param("s", $attr);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $products;
    }

    public function getSalesInfoById($id) {
        $stmt = $this->db->prepare("SELECT id, product_id, variation_type, variation_name, variation_img, sales_info FROM tbl_sales_info WHERE product_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $result = array();
        foreach ($products as $value) {
            $value['sales_info'] = json_decode($value['sales_info']);
            array_push($result, $value);
        }
        return $result;
    }

    public function upsertSalesInfo($id, $dataArray) {
        if ($this->getSalesInfoById($id)) {
            $deleteStmt = $this->db->prepare("DELETE FROM tbl_sales_info WHERE product_id = ?");
            $deleteStmt->bind_param("i", $id);
            $deleteStmt->execute();
            $deleteStmt->close();
            $insertStmt = $this->db->prepare("INSERT INTO tbl_sales_info (product_id, variation_type, variation_img, variation_name, sales_info) 
                                            VALUES (?, ?, ?, ?, ?)");
            // $dataArray = json_decode($jsonData, true);
            foreach ($dataArray as $record) {
                $salesInfoJson = json_encode($record['sales_info']);
                $insertStmt->bind_param("sssss", 
                    $record['product_id'], 
                    $record['variation_type'], 
                    $record['variation_img'], 
                    $record['variation_name'], 
                    $salesInfoJson
                );
                $insertStmt->execute();
            }
            $insertStmt->close();
        } else {
            // $dataArray = json_decode($jsonData, true);
            $stmt = $this->db->prepare("INSERT INTO tbl_sales_info (product_id, variation_type, variation_img, variation_name, sales_info) 
            VALUES (?, ?, ?, ?, ?)");
            foreach ($dataArray as $record) {
                $salesInfoJson = json_encode($record['sales_info']);
                $stmt->bind_param("issss", 
                    $record['product_id'], 
                    $record['variation_type'], 
                    $record['variation_img'], 
                    $record['variation_name'], 
                    $salesInfoJson
                );
                $stmt->execute();
            }
            $stmt->close();
        }
    }
}
