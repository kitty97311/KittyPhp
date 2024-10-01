/*
 Navicat Premium Data Transfer

 Source Server         : KittySQL
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : shopee

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 01/10/2024 16:05:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_attribute
-- ----------------------------
DROP TABLE IF EXISTS `tbl_attribute`;
CREATE TABLE `tbl_attribute`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `attr_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `attr_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_attribute
-- ----------------------------
INSERT INTO `tbl_attribute` VALUES (1, 501, 'Color', 'Red;Blue;Pink;White;Yellow');
INSERT INTO `tbl_attribute` VALUES (3, 501, 'Size', '10;9;5;6');
INSERT INTO `tbl_attribute` VALUES (4, 501, 'Sex', 'Boy;Girl;Male;Female;Old Man;Old Woman');

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `variation` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 502 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES (501, 'Jeans', 'Color;Size;Sex');

-- ----------------------------
-- Table structure for tbl_sales_info
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sales_info`;
CREATE TABLE `tbl_sales_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `variation_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `variation_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `variation_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sales_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_sales_info
-- ----------------------------
INSERT INTO `tbl_sales_info` VALUES (1, 501, 'Color;Size', 'asdf', 'images/39d3bdc38dc6d316542fdbb26e0da54a.jpg', '{\"_asdf\":\"23;4234;234\"}');

SET FOREIGN_KEY_CHECKS = 1;
