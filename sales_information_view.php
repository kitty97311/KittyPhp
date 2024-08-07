<?php

class SalesInformationView {
    public function render($data) {
        $product = $data['product'];
        $variation = $product['variation'];
        $attribute = $data['attribute'];
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
                .input_divider {
                    border-right: none;
                }
                .dotted_border_btn {
                    border: 1px dashed #b7b7b7; /* Adjust the color and thickness as needed */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .dotted_border_btn:hover {
                    color: #ee4d2d;
                    background: rgb(238 77 45 / 4%);
                    border-color: #ee4d2d;
                }
                .dotted_border_btn .btn_icon {
                    margin-right: 5px; /* Space between icon and text */
                }
                .promotion_tip {
                    color: #999;
                    font-weight: 600;
                    font-size: 12px;
                    margin-left: 150px;
                }
                .label_part {
                    width: 150px;
                }
                .sizechart_select::after {
                    content: "\f078"; /* Font Awesome dropdown icon */
                    font-family: 'Font Awesome 5 Free';
                    position: absolute;
                    top: 50%;
                    right: 10px;
                    transform: translateY(-50%);
                    font-weight: 900;
                }
                .section_background {
                    background: #f6f6f6;
                }
                .variation_title {
                    color: #000;
                    font-weight: bold;
                }
                hr {
                    margin: 0.5rem 0 0.5rem 0;
                }
                .btn_image_upload {
                    padding: 0;
                    border: 1px dashed #d8d8d8;
                    background: none;
                    width: 32px;  /* Set the desired width */
                    height: 32px; /* Set the desired height */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 5px;
                    cursor: pointer;
                    overflow: hidden;
                }
                .btn_image_upload img {
                    width: 100%;  /* Set the desired icon width */
                    height: 100%; /* Set the desired icon height */
                }
                .btn_image_upload .uploaded_image {
                    width: 100%; /* Fill the button */
                    height: 100%; /* Fill the button */
                    object-fit: cover; /* Maintain aspect ratio and cover the button */
                    display: none;
                }
                .btn_image_upload input[type="file"] {
                    display: none;
                }
                .input_height {
                    height: 30px;
                }
                .input_border {
                    border: 1px solid #e5e5e5;
                    border-radius: 5px;
                }
                .input_border > span {
                    border: none;
                    border-left: 1px solid #e5e5e5;
                    border-radius: 0;
                }
                .variation_item_control {
                    color: #b7b7b7;
                    cursor: pointer;
                }
                .variation_close {
                    right: 0;
                    top: 0;
                    position: absolute;
                    cursor: pointer;
                }
                input[type="radio"]:checked {
                    background-color: #ee4d2d;
                    border-color: #ee4d2d;
                }
                .custom_button {
                    background: #ee4d2d;
                    border-color: #ee4d2d;
                }
                .custom_button:hover, .custom_button:active, .custom_button:visited, .custom_button:focus {
                    background: #ee4d2d !important;
                    border-color: #ee4d2d !important;
                    color: #eeeeee !important;
                }
                table th, table td {
                    text-align: center;
                    vertical-align: middle !important;
                }
                .list-group-item {
                    border: none;
                    font-size: 14px;
                }
            </style>
        </head>
        <body>
            <div class="template">
                <div class="variation_section section_background w-100 rounded p-3 position-relative mb-4 d-none">
                    <span class="variation_title">
                        <div class="input-group input_border w-50">
                            <input type="text" class="form-control input_height border-0" placeholder="Input">
                            <span class="input-group-text input_height">0/20</span>
                        </div>
                    </span>
                    <span class="variation_close m-3" onclick="closeSection(this)">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                    <hr/>
                    <div class="d-none w-100 flex-wrap my-4 size_panel">
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" checked class="form-check-input" name="optradio">Size (US)
                            </label>
                        </div>
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Size (Inch)
                            </label>
                        </div>
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Size (EU)
                            </label>
                        </div>
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Size (Tuổi)
                            </label>
                        </div>
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Size (Quốc Tế)
                            </label>
                        </div>
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Size (CO)
                            </label>
                        </div>
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Size (cm)
                            </label>
                        </div>
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Size (mm)
                            </label>
                        </div>
                        <div class="form-check-inline col-2 py-1">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optradio">Customize
                            </label>
                        </div>
                    </div>
                    <div class="w-100 flex-wrap d-flex input_container">
                        
                    </div>
                </div>
                <div class="add_variation_section section_background w-100 rounded p-3 d-none">
                    <div class="d-flex position-relative">
                        <button class="btn dotted_border_btn dropdown-toggle primary_text bg-white" data-toggle="dropdown">
                            <span class="btn_icon">+</span>
                            Add Variation 2
                        </button>
                        <div class="dropdown-menu w-100">
                            <?php
                            foreach (explode(";", $variation) as $v) {
                                echo "<a class=\"dropdown-item\" data-value=\"$v\" onclick=\"selectVariation(this)\">$v</a>";
                            } ;?>
                            <hr/>
                            <a class="dropdown-item text-primary" data-value="" onclick="selectVariation(this)">Add Custom</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container my-5 shadow  p-5 bg-white rounded">
                <h3>Sales information (<?php echo $product['product_name'];?>)</h3>
                <div class="d-flex flex-wrap h-100 my-4">
                    <div class="label_part text-right mt-2">
                        Variations
                    </div>
                    <div class="col-10 position-relative d-flex flex-wrap variation_container">
                        <div class="variation_selector position-relative">
                            <button class="btn dotted_border_btn dropdown-toggle primary_text" data-toggle="dropdown">
                                <span class="btn_icon">+</span>
                                Enable Variations
                            </button>
                            <div class="dropdown-menu w-100">
                                <?php
                                foreach (explode(";", $variation) as $v) {
                                    echo "<a class=\"dropdown-item variation_item\" data-value=\"$v\" onclick=\"selectVariation(this)\">$v</a>";
                                } ;?>
                                <hr/>
                                <a class="dropdown-item variation_item text-primary" data-value="" onclick="selectVariation(this)">Add Custom</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="h-100 w-100 d-none flex-wrap my-4 list_panel">
                    <div class="label_part text-right mt-2">
                        Variation List
                    </div>
                    <div class="col-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Price">
                            <input type="text" class="form-control" placeholder="Stock">
                            <input type="text" class="form-control rounded-right" placeholder="SKU">
                            <button class="btn btn-primary ml-4 custom_button">Apply To All</button>
                        </div>
                        <table class="table table-bordered mt-4 variation_table">
                            <thead>
                                <tr>
                                    <th><span class="primary_text mx-1">*</span>Price</th>
                                    <th><span class="primary_text mx-1">*</span>Stock</th>
                                    <th>SKU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Price">
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="Input 2"></td>
                                    <td><input type="text" class="form-control" placeholder="Input 3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center h-100 my-4">
                    <div class="label_part text-right">
                        <span class="primary_text mx-1">*</span>Price
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Input">
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center h-100 my-4">
                    <div class="label_part text-right">
                        <span class="primary_text mx-1">*</span>Stock
                        <i class="far fa-question-circle"></i>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <input type="text" class="form-control" value="0">
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center h-100 my-4">
                    <div class="label_part text-right">
                        Wholesale
                    </div>
                    <div class="col-10">
                        <button class="btn dotted_border_btn primary_text">
                            <span class="btn_icon">+</span>
                            Add Price Tier
                        </button>
                    </div>
                    <span class="col-10 promotion_tip">
                        Whole sale will be hidden when product is under Add-on Deal & Bundle Deal
                    </span>
                </div>
                <div class="d-flex flex-wrap align-items-center h-100 my-4">
                    <div class="label_part text-right">
                        Size Chart
                    </div>
                    <div class="d-flex flex-wrap flex-grow-1">
                        <div class="input-group col flex-grow-1">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle w-100" data-toggle="dropdown">
                                Use the size chart, will increase the search exposure of your product
                            </button>
                            <div class="dropdown-menu w-100">
                                <a class="dropdown-item" href="#">Link 1</a>
                                <a class="dropdown-item" href="#">Link 2</a>
                                <a class="dropdown-item" href="#">Link 3</a>
                            </div>
                        </div>
                        <button class="btn dotted_border_btn primary_text">
                            <span class="btn_icon">+</span>
                            Add New Size Chart
                        </button>
                    </div>
                </div>
            </div>
        </body>
        <script>

            var jsonAttr = JSON.parse('<?php echo $attribute;?>')
            var maxInputCount = []

            togglePanel()

            function uploadImage(e) {
                console.log(e.files)
                const [file] = e.files;
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(m) {
                        const uploadIcon = $(e.parentNode).find('.upload_icon')[0];
                        const uploadedImage = $(e.parentNode).find('.uploaded_image')[0];
                        
                        uploadedImage.setAttribute('src', m.target.result);
                        uploadedImage.style.display = 'block';
                        uploadIcon.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            };

            function selectVariation(e) {
                var variation_title = e.getAttribute('data-value');
                maxInputCount[variation_title] = 0;

                appendTitleToTable(variation_title);

                appendPanel(variation_title);
                togglePanel();
            }

            function appendTitleToTable(title) {
                $('.variation_table thead tr').prepend("<th>" + title + "</th>");
                $('.variation_table tbody tr').prepend("<td>" + "" + "</td>");
            }

            function changeVariationValue(e) {
                e.parentNode.getElementsByTagName('span')[0].innerHTML = e.value.length + "/" + 20;
                const title = e.closest('.variation_section').getElementsByClassName('variation_title')[0].innerHTML;
                var dropdown = "";
                jsonAttr[title].split(';').forEach(element => {
                    if (element.toLowerCase().includes(e.value.toLowerCase())) {
                        dropdown += "<a class=\"dropdown-item\" onclick=\"selectAttribute(this)\">" + element + "</a>"
                    }
                });
                var dropdownNode = e.parentNode.parentNode.getElementsByClassName('dropdown-menu')[0];
                if (dropdown) {
                    dropdownNode.classList.add('show');
                } else {
                    dropdownNode.classList.remove('show')
                }
                dropdownNode.innerHTML = dropdown
                if (maxInputCount[title] == e.getAttribute('data-index')) {
                    maxInputCount[title] = maxInputCount[title] + 1
                    var template = `
                        <div class="w-50 d-flex my-2 ` + (maxInputCount[title] % 2 == 0 ? 'pr-2' : 'pl-2') + `">
                            <label class="btn btn_image_upload m-0" for="image_upload_` + maxInputCount[title] + `">
                                <i class="upload_icon far fa-image primary_text"></i>
                                <img src="" alt="Uploaded Image" class="uploaded_image">
                                <input type="file" accept="image/*" onchange="uploadImage(this)" id="image_upload_` + maxInputCount[title] + `">
                            </label>
                            <div class="flex-grow-1 mx-1 position-relative">
                                <div class="input-group input_border">
                                    <input type="text" class="form-control input_height border-0" placeholder="Input" data-index="` + maxInputCount[title] + `" onclick="changeVariationValue(this)">
                                    <span class="input-group-text input_height">0/20</span>
                                </div>
                                <div class="dropdown-menu w-100">
                                    
                                </div>
                            </div>
                            <span class="variation_item_control mx-2 d-flex align-items-center">
                                <i class="fa-solid fa-up-down-left-right"></i>
                            </span>
                            <span class="variation_item_control d-flex align-items-center">
                                <i class="far fa-trash-can"></i>
                            </span>
                        </div>`;
                    $(e.closest('.input_container')).append(template);
                }
            }

            function selectAttribute(e) {
                var inputNode = e.parentNode.parentNode.getElementsByTagName('input')[0];
                inputNode.value = e.innerHTML;
                inputNode.parentNode.getElementsByTagName('span')[0].innerHTML = e.innerHTML.length + "/" + 20
                e.parentNode.classList.remove('show');
            }

            function closeSection(e) {
                e.parentNode.parentNode.removeChild(e.parentNode)
                togglePanel()
            }

            function appendPanel(title) {
                var section = $('.variation_section').clone();
                if (title)
                    section.find('.variation_title').html(title);
                if (title == 'Size') {
                    section.find('.size_panel').removeClass('d-none');
                }
                section.removeClass("d-none");
                var template = `
                    <div class="w-50 d-flex my-2 ` + (maxInputCount[title] % 2 == 0 ? 'pr-2' : 'pl-2') + `">
                        <label class="btn btn_image_upload m-0" for="image_upload_` + maxInputCount[title] + `">
                            <i class="upload_icon far fa-image primary_text"></i>
                            <img src="" alt="Uploaded Image" class="uploaded_image">
                            <input type="file" accept="image/*" onchange="uploadImage(this)" id="image_upload_` + maxInputCount[title] + `">
                        </label>
                        <div class="flex-grow-1 mx-1 position-relative">
                            <div class="input-group input_border">
                                <input type="text" class="form-control input_height border-0" placeholder="Input" data-index="` + maxInputCount[title] + `" onclick="changeVariationValue(this)">
                                <span class="input-group-text input_height">0/20</span>
                            </div>
                            <div class="dropdown-menu w-100">
                                
                            </div>
                        </div>
                        <span class="variation_item_control mx-2 d-flex align-items-center">
                            <i class="fa-solid fa-up-down-left-right"></i>
                        </span>
                        <span class="variation_item_control d-flex align-items-center">
                            <i class="far fa-trash-can"></i>
                        </span>
                    </div>`;
                section.find('.input_container').append(template);
                $('.variation_container').append(section[0]);
            }

            function togglePanel() {
                if ($('.variation_section').length > 1) {
                    $('.variation_selector').addClass('d-none')
                    $('.list_panel').addClass('d-flex')
                    $('.list_panel').removeClass('d-none')
                } else {
                    $('.variation_selector').removeClass('d-none')
                    $('.list_panel').removeClass('d-flex')
                    $('.list_panel').addClass('d-none')
                }

                if ($('.variation_section').length % 2 == 0) {
                    var addSection = $('.add_variation_section').clone();
                    addSection.removeClass('d-none');
                    $('.variation_container').append(addSection[0]);
                } else if ($('.add_variation_section').length > 1) {
                    $('.add_variation_section')[1].remove();
                }
            }
        </script>
        </html>
        <?php
    }
}
?>