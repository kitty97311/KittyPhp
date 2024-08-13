<?php

class SalesInformationView {
    public function render($data) {
        $product_id = $data['product_id'];
        $product = $data['product'];
        $sales_info = $data['sales_info'];
        $decoded_sales_info = json_decode($sales_info);
        $variation_type = explode(";", $decoded_sales_info[0]->variation_type);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Shopee</title>
            <link rel="icon" href="https://deo.shopeemobile.com/shopee/shopee-seller-live-sg/mmf_portal_seller_root_dir/shopee/favicon.ico">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
            <style>
                .primary_text {
                    color: #ee4d2d;
                }
                .primary_button {
                    background: #ee4d2d;
                    border-color: #ee4d2d;
                }
                .primary_button:hover, .primary_button:active, .primary_button:visited, .primary_button:focus {
                    background: #ee4d2d !important;
                    border-color: #ee4d2d !important;
                    color: #eeeeee !important;
                }
                .main_image {
                    height: 500px;
                }
                .sub_image {
                    width: 100px;
                    height: 100px;
                    filter: blur(2px);
                    cursor: pointer;
                }
                .sub_image.choosed {
                    filter: initial;
                }
                .price_panel {
                    background: #fafafa;
                    font-size: 1.5rem;
                }
                .label_panel {
                    width: 50px;
                }
            </style>
        </head>
        <body>
            <div class="container my-5 shadow  p-5 bg-white rounded">
                <h3>Product name: <?php echo $product['product_name'];?></h3>
                <div class="image_container align-items-center d-flex flex-column my-4">
                    <img class="main_image img-thumbnail" src="<?php echo $decoded_sales_info[0]->variation_img;?>">
                    <div class="row mt-3">
                        <?php foreach ($decoded_sales_info as $key => $item) { ; ?>
                        <img class="sub_image mx-2 rounded <?php echo $key == 0 ? 'choosed' : '';?>" src="<?php echo $item->variation_img;?>" onclick="showImage(this)">
                        <?php } ;?>
                    </div>
                </div>
                <div class="price_panel py-3 px-4">
                    $ <span class="price">311</span>
                </div>
                <div class="py-2 px-3 mt-4">
                    <label class="label_panel">Stock: </label>
                    <span class="stock">311</span>
                </div>
                <div class="py-2 px-3 mt-4">
                    <label class="label_panel"><?php echo $variation_type[0];?>: </label>
                    <div class="btn-group">
                        <?php foreach ($decoded_sales_info as $key => $item) { ;?>
                        <button type="button" onclick="changeVariation(this)" id="main_<?php echo $key;?>" class="btn <?php echo $key ? 'btn-outline-primary' : 'btn-primary';?>"><?php echo $item->variation_name;?></button>
                        <?php } ;?>
                    </div>
                </div>
                <div class="py-2 px-3 mt-4">
                    <label class="label_panel"><?php echo $variation_type[1];?>: </label>
                    <div class="btn-group">
                        <?php $i = 0; foreach ($decoded_sales_info[0]->sales_info as $key => $item) { ;?>
                        <button type="button" onclick="changeVariation(this)" id="sub_<?php echo $key;?>" class="btn <?php echo $i ++ ? 'btn-outline-primary' : 'btn-primary';?>"><?php echo str_replace('_', '', $key);?></button>
                        <?php } ;?>
                    </div>
                </div>
            </div>
        </body>
        <script>

            var salesInfoArray = JSON.parse('<?php echo $sales_info;?>');
            var productId = <?php echo $product_id;?>

            setSalesInfo();

            function setSalesInfo() {
                var selButton = $('button.btn-primary');
                var mainKey = parseInt(($(selButton[0]).attr('id') + "").replace('main_', ''));
                var subKey = ($(selButton[1]).attr('id') + "").replace('sub_', '');
                var salesInfo = salesInfoArray[mainKey]['sales_info'][subKey].split(';');
                $('span.price').html(salesInfo[0])
                $('span.stock').html(salesInfo[1])
                $('img.main_image').attr('src', salesInfoArray[mainKey]['variation_img']);
                $('img.sub_image.choosed').removeClass('choosed');
                $($('img.sub_image')[mainKey]).addClass('choosed');
            }

            function showImage(e) {
                $('img.main_image').attr('src', e.src);
                $('img.sub_image.choosed').removeClass('choosed');
                $(e).addClass('choosed');
            }

            function changeVariation(e) {
                $(e).parent().find('button.btn-primary').attr('class', 'btn btn-outline-primary');
                $(e).attr('class', 'btn btn-primary');
                setSalesInfo();
            }

        </script>
        </html>
        <?php
    }
}
?>