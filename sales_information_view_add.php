<?php

class SalesInformationAddView {
    public function render($data) {
        $product_id = $data['product_id'];
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
                .primary_button {
                    background: #ee4d2d;
                    border-color: #ee4d2d;
                }
                .primary_button:hover, .primary_button:active, .primary_button:visited, .primary_button:focus {
                    background: #ee4d2d !important;
                    border-color: #ee4d2d !important;
                    color: #eeeeee !important;
                }
                .save_button {
                    background: #2673dd;
                    border-color: #2673dd;
                }
                .save_button:hover, .save_button:active, .save_button:visited, .save_button:focus {
                    background: #2673dd !important;
                    border-color: #2673dd !important;
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
                /* .variation_container > .variation_section > .input_container > .input_section > .input_remove {
                    cursor: not-allowed;
                } */
                .variation_container > .variation_section > .input_container > .input_section > .input_move {
                    cursor: not-allowed;
                }
                .input_container > .input_section:nth-of-type(odd) {
                    padding-right: 0.5rem !important;
                }
                .input_container > .input_section:nth-of-type(even) {
                    padding-left: 0.5rem !important;
                }
                .variation_image {
                    width: 50px;
                    height: 50px;
                    display: block;
                    margin-right: auto;
                    margin-left: auto;
                }
                .error_text {
                    color: #ff424f;
                }
            </style>
        </head>
        <body>
            <div class="template d-none">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control price required" placeholder="Price">
                                </div>
                            </td>
                            <td><input type="number" class="form-control stock required" placeholder="Stock"></td>
                            <td><input type="number" class="form-control sku" placeholder="SKU"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="w-50 d-flex my-2 input_section">
                    <label class="btn btn_image_upload m-0 d-none">
                        <i class="upload_icon far fa-image primary_text"></i>
                        <img alt="Uploaded Image" class="uploaded_image">
                        <input type="file" accept="image/*" onchange="uploadImage(this)">
                    </label>
                    <div class="flex-grow-1 mx-1 position-relative">
                        <div class="input-group input_border">
                            <input type="text" class="form-control input_height border-0" placeholder="Input" oninput="changeVariationValue(this)">
                            <span class="input-group-text input_height">0/20</span>
                        </div>
                        <div class="dropdown-menu w-100">
                            
                        </div>
                    </div>
                    <span class="variation_item_control mx-2 d-flex align-items-center input_move">
                        <i class="fa-solid fa-up-down-left-right"></i>
                    </span>
                    <span class="variation_item_control d-flex align-items-center input_remove" onclick="removeInput(this)">
                        <i class="far fa-trash-can"></i>
                    </span>
                </div>
                <div class="variation_section section_background w-100 rounded p-3 position-relative mb-4">
                    <span class="variation_title">
                        <div class="input-group input_border w-50">
                            <input type="text" class="form-control input_height border-0" placeholder="Input">
                            <span class="input-group-text input_height">0/20</span>
                        </div>
                    </span>
                    <span class="variation_close m-3" onclick="removeSection(this)">
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
                            <!-- <hr/> -->
                            <a class="dropdown-item text-primary d-none" data-value="" onclick="selectVariation(this)">Add Custom</a>
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
                                <!-- <hr/> -->
                                <a class="dropdown-item text-primary d-none" data-value="" onclick="selectVariation(this)">Add Custom</a>
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
                            <input type="number" class="form-control all_price" placeholder="Price">
                            <input type="number" class="form-control all_stock" placeholder="Stock">
                            <input type="number" class="form-control rounded-right all_sku" placeholder="SKU">
                            <button class="btn btn-primary ml-4 primary_button" onclick="applyToAll()">Apply To All</button>
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
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center h-100 my-4 price_panel">
                    <div class="label_part text-right">
                        <span class="primary_text mx-1">*</span>Price
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Input">
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center h-100 my-4 stock_panel">
                    <div class="label_part text-right">
                        <span class="primary_text mx-1">*</span>Stock
                        <i class="far fa-question-circle"></i>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <input type="number" class="form-control" value="0">
                        </div>
                    </div>
                </div>
                <div class="flex-wrap align-items-center h-100 my-4 d-none">
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
                <div class="flex-wrap align-items-center h-100 my-4 d-none">
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
                
                <div class="save_panel ms-auto d-flex flex-wrap">
                    <div class="label_part"></div>
                    <div class="col-10">
                        <span class="error_text d-none">Please fill all the input.</span>
                        <button class="btn btn-primary ml-auto d-flex save_button" onclick="saveAll()">Save All</button>
                    </div>
                </div>
            </div>
        </body>
        <script>

            var jsonAttr = JSON.parse('<?php echo $attribute;?>')
            var maxInputCount = []
            var productId = <?php echo $product_id;?>

            togglePanel()

            function saveAll() {
                catchData().then(result => {
                    saveData(result);
                }).catch(error => {
                    console.log('Error:', error);
                });
            }

            function catchData() {
                return new Promise((resolve, reject) => {
                    var isActive = true;
                    isActive = $('.variation_section').length > 2;
                    $('.variation_table > tbody > tr > td > .required').each((index, ele) => {
                        if (!ele.value) {
                            isActive = false;
                        }
                    })
                    $('.variation_table > tbody > tr > td').each((index, ele) => {
                        if (!ele.innerHTML || ele.innerHTML == '<img class="variation_image d-none" src="">') {
                            isActive = false;
                        }
                    })
                    if (!isActive) {
                        $('.error_text').removeClass('d-none');
                        return;
                    } else {
                        $('.error_text').addClass('d-none');
                    }
                    var recordArray = [];
                    var iterNum = -1;
                    $('.variation_table > tbody > tr').each((index, ele) => {
                        if ($(ele).find('td:first').attr('data-title') == $('.variation_section').eq(1).find('.variation_title').attr('data-variation')) {
                            var record = {};
                            record['product_id'] = productId;
                            record['variation_type'] = $('.variation_section').eq(1).find('.variation_title').attr('data-variation') 
                                                            + ";" + $('.variation_section').eq(2).find('.variation_title').attr('data-variation');
                            record['variation_img'] = $(ele).find('td:first > img').attr('src');
                            record['variation_name'] = $(ele).find('td:first').text();
                            record['sales_info'] = {};
                            record['sales_info']['_' + $(ele).find('td').eq(1).text()] = $(ele).find('td input').eq(0).val() 
                                                                                    + ";" + $(ele).find('td input').eq(1).val() 
                                                                                    + ";" + $(ele).find('td input').eq(2).val();
                            recordArray.push(record);
                            iterNum ++;
                        } else {
                            recordArray[iterNum]['sales_info']['_' + $(ele).find('td').eq(0).text()] = $(ele).find('td input').eq(0).val() 
                                                                                    + ";" + $(ele).find('td input').eq(1).val() 
                                                                                    + ";" + $(ele).find('td input').eq(2).val();
                        }
                    });
                    resolve(JSON.stringify(recordArray));
                });
            }

            function saveData(result) {
                $.ajax({
                    url: 'http://localhost/',
                    type: 'POST',
                    data: { 
                        action: 'save',
                        product_id: productId,
                        record: result
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            }

            function applyToAll() {
                $('.variation_table > tbody > tr > td input.price').val($('input.all_price').val());
                $('.variation_table > tbody > tr > td input.stock').val($('.all_stock').val());
                $('.variation_table > tbody > tr > td input.sku').val($('.all_sku').val());
            }

            function removeInput(e) {
                const title = $(e.closest('.variation_section')).find('.variation_title').attr('data-variation');
                const level = $(e.closest('.input_section')).find('input[type="text"]').attr('data-level');
                const index = parseInt($(e.closest('.input_section')).find('input[type="text"]').attr('data-index') + "");
                var rowspan = $('.variation_table > tbody > tr > td:first').attr('rowspan');
                rowspan = rowspan ? parseInt(rowspan) : 1;
                if (index == 0 || index == maxInputCount[title]) return;
                if (level == 0) {
                    for (var i = 0; i < rowspan; i ++) {
                        $('.variation_table > tbody > tr:nth-child(' + (rowspan * index + 1) + ')').remove();
                    }
                } else {
                    const iterCount = $('.variation_table > tbody > tr').length / rowspan
                    for (var i = 0; i < iterCount; i ++) {
                        $('.variation_table > tbody > tr:nth-child(' + (rowspan * i + index + 1 - i) + ')').remove();
                    }
                    $('.variation_table > tbody > tr > td[rowspan="' + rowspan + '"]').attr('rowspan', rowspan - 1);
                }
                for (var i = index; i <= maxInputCount[title]; i ++) {
                    var ele = $('input[type="text"][data-index="' + i + '"][data-level="' + level + '"' + ']');
                    ele.attr('data-index', i - 1);
                    ele.closest('.input_section').find('label').attr('for', 'image_upload_' + (i - 1));
                    ele.closest('.input_section').find('input[type="file"]').attr('id', 'image_upload_' + (i - 1));
                }
                maxInputCount[title] -= 1;
                $(e).parent().remove()
            }

            function uploadImage(e) {
                const [file] = e.files;
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(m) {
                        const uploadIcon = e.parentNode.getElementsByTagName('i')[0];
                        const uploadedImage = e.parentNode.getElementsByTagName('img')[0];
                        uploadedImage.setAttribute('src', m.target.result);
                        uploadedImage.style.display = 'block';
                        uploadIcon.style.display = 'none';
                        const title = $(e).closest('.variation_section').find('.variation_title').attr('variation_title');
                        const index = parseInt(($(e).closest('label').attr('for') + "").replace('image_upload_', ''));
                        $('.variation_table > tbody > tr > td > img').eq(index).removeClass('d-none');
                        $('.variation_table > tbody > tr > td > img').eq(index).attr('src', m.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            };

            function selectVariation(e) {
                var title = e.getAttribute('data-value');
                maxInputCount[title] = 0;

                addTitleToTable(title);
                addSection(title);
                togglePanel();
                $('a[data-value="' + title + '"]').addClass("disabled");
            }

            function addValueToTable(index, level, title, value) {
                var rowspan = $('.variation_table > tbody > tr > td:first').attr('rowspan');
                rowspan = parseInt(rowspan ? rowspan : 1)
                if (level == 0) {
                    if ($('td[data-title="' + title + '"]').length > index) {
                        $('td[data-title="' + title + '"]').eq(index).html(value + $('td[data-title="' + title + '"]').eq(index).find('img')[0].outerHTML);
                    } else {
                        var template = $('.variation_table > tbody > tr:lt(' + rowspan + ')').clone();
                        template.find('input').val('');
                        template.find('td[data-title="' + title + '"]').html(value + '<img class="variation_image d-none" src="">');
                        $('.variation_table tbody').append(template);
                    }
                } else {
                    if (rowspan > index) {
                        for (var i = 0; i < $('td[data-title="' + $('table > thead > tr > th:first').attr('data-head') + '"]').length; i ++) {
                            $('td[data-title="' + title + '"]').eq(rowspan * i + index).html(value);
                        }
                    } else {
                        var template = $('.template > table > tbody > tr').clone();
                        template.prepend('<td data-title="' + title + '">' + value + '</td>');
                        $('.variation_table > tbody > tr:nth-of-type(' + rowspan + 'n + ' + index + ')').after(template);
                        $('.variation_table > tbody > tr > td[data-title="' + $('table > thead > tr > th:first').attr('data-head') + '"]').attr('rowspan', index + 1);
                    }
                }
            }

            function getRandomColor() {
                let letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            function removeValueFromTable() {
                var rowspan = $('.variation_table > tbody > tr > td:first').attr('rowspan');
                rowspan = rowspan ? parseInt(rowspan) : 1;
                const temp = $('.variation_table > tbody > tr:nth-child(' + rowspan + 'n + 1)');
                $('.variation_table > tbody').html(temp);
                $('td').removeAttr('rowspan');
            }

            function addTitleToTable(title) {
                if ($('.variation_table > thead > tr > th').length > 3) {
                    $('.variation_table > thead > tr > th:first').after("<th data-head='" + title + "'>" + title + "</th>");
                    $('.variation_table > tbody > tr > td:first-child').after("<td data-title='" + title + "'>" + "" + "</td>");
                } else {
                    $('.variation_table thead > tr').prepend("<th data-head='" + title + "'>" + title + "</th>");
                    var template = $('.template > table > tbody > tr').clone();
                    template.prepend("<td data-title='" + title + "'>" + '<img class="variation_image d-none" src="">' + "</td>");
                    $('.variation_table > tbody').html(template);
                }
            }

            function removeTitleFromTable(title) {
                $('th[data-head="' + title + '"]').remove();
                $('td[data-title="' + title + '"]').remove();
            }

            function changeVariationValue(e, selecting = true) {
                e.parentNode.getElementsByTagName('span')[0].innerHTML = e.value.length + "/" + 20;
                const title = e.closest('.variation_section').getElementsByClassName('variation_title')[0].innerHTML;
                var dropdown = "";
                jsonAttr[title].split(';').forEach(element => {
                    if (element.toLowerCase().includes(e.value.toLowerCase())) {
                        dropdown += "<a class=\"dropdown-item\" onclick=\"selectAttribute(this)\">" + element + "</a>"
                    }
                });
                var dropdownNode = e.parentNode.parentNode.getElementsByClassName('dropdown-menu')[0];
                if (dropdown && selecting) {
                    dropdownNode.classList.add('show');
                } else {
                    dropdownNode.classList.remove('show')
                }
                dropdownNode.innerHTML = dropdown
                if (maxInputCount[title] == e.getAttribute('data-index')) {
                    maxInputCount[title] = maxInputCount[title] + 1
                    var template = $('.template > .input_section').clone();
                    if (e.getAttribute('data-level') == 0) {
                        template.find('label').removeClass('d-none');
                        template.find('label').attr('for', 'image_upload_' + maxInputCount[title]);
                        template.find('input[type="file"]').attr('id', 'image_upload_' + maxInputCount[title]);
                    }
                    template.find('input[type="text"]').attr('data-index', maxInputCount[title]);
                    template.find('input[type="text"]').attr('data-level', e.getAttribute('data-level'));
                    $(e.closest('.input_container')).append(template);
                }
                addValueToTable(parseInt($(e).attr('data-index') + ""), parseInt($(e).attr('data-level') + ""), title, e.value);
            }

            function selectAttribute(e) {
                var inputNode = e.parentNode.parentNode.getElementsByTagName('input')[0];
                inputNode.value = e.innerHTML;
                inputNode.parentNode.getElementsByTagName('span')[0].innerHTML = e.innerHTML.length + "/" + 20
                e.parentNode.classList.remove('show');
                changeVariationValue(inputNode, false);
            }

            function removeSection(e) {
                e.parentNode.parentNode.removeChild(e.parentNode)
                togglePanel()
                const title = $(e).siblings('.variation_title').attr('data-variation');
                if ($(e.parentNode).find('.input_section input[type="text"]').attr('data-level') == 0) {
                    $('.input_container > .input_section > label').removeClass('d-none');
                    $('input[data-level="1"]').attr('data-level', 0);
                }
                removeTitleFromTable(title);
                removeValueFromTable()
                delete maxInputCount[title];
                $('a[data-value="' + title + '"]').removeClass("disabled");
            }

            function addSection(title) {
                var section = $('.template > .variation_section').clone();
                if (title) {
                    section.find('.variation_title').html(title);
                    section.find('.variation_title').attr('data-variation', title);
                }
                if (title == 'Size') {
                    // section.find('.size_panel').removeClass('d-none');
                }
                var input_template = $('.template > .input_section').clone();
                if ($('.variation_section').length == 1) {
                    input_template.find('label').removeClass('d-none');
                    input_template.find('label').attr('for', 'image_upload_0');
                    input_template.find('input[type="file"]').attr('id', 'image_upload_0');
                }
                input_template.find('input[type="text"]').attr('data-index', 0);
                input_template.find('input[type="text"]').attr('data-level', $('.variation_section').length - 1);
                $(section[0]).find('.input_container').append(input_template);
                $('.variation_container').append(section[0]);
            }

            function togglePanel() {
                if ($('.variation_section').length > 1) {
                    $('.variation_selector').addClass('d-none')
                    $('.list_panel').addClass('d-flex')
                    $('.list_panel').removeClass('d-none')
                    $('.price_panel, .stock_panel').removeClass('d-flex');
                    $('.price_panel, .stock_panel').addClass('d-none');
                } else {
                    $('.variation_selector').removeClass('d-none')
                    $('.list_panel').removeClass('d-flex')
                    $('.list_panel').addClass('d-none')
                    $('.price_panel, .stock_panel').addClass('d-flex');
                    $('.price_panel, .stock_panel').removeClass('d-none');
                }

                if ($('.variation_section').length == 2) {
                    var addSection = $('.template > .add_variation_section').clone();
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