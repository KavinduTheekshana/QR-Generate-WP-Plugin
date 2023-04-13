<?php
/*
Plugin Name: QR Code Manager
Description: A WordPress plugin to generate, download, and save QR codes with a user-friendly interface.
Version: 1.0
Author: Your Name
*/

  


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// 2. Limit access to the WP backend
function qr_code_manager_capability() {
    return 'manage_options'; // Only administrators can manage options
}

// 3. User-friendly UI: Add a menu item for the plugin in the WordPress admin area
add_action('admin_menu', 'qr_code_manager_add_menu_item');
add_action('wp_ajax_download_qr_code', 'qr_code_manager_download_qr_code');
add_action( 'admin_enqueue_scripts', 'my_enqueue_media_library' );


function my_enqueue_media_library() {
    // Replace 'your_page_slug' with the actual slug of your admin page
    wp_enqueue_media();

}



function qr_code_manager_add_menu_item() {
    add_menu_page(
        'QR Code List',
        'QR Code List',
        qr_code_manager_capability(),
        'qr-code-manager',
        'qr_code_manager_admin_page',
        'dashicons-schedule'
    );
    
    add_submenu_page(
        'qr-code-manager', 
        'Generate QR Code', 
        'Generate QR Code', 
        'manage_options', 
        'qr-code-manager-subpage', 
        'qr_code_manager_sub_admin_page'
    );

}

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;


function qr_code_manager_download_qr_code() {
    if (!current_user_can(qr_code_manager_capability()) || !isset($_GET['qr_code_id'])) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    $qr_code_id = intval($_GET['qr_code_id']);
    $qr_codes = get_option('qr_codes', []);

    foreach($qr_codes as $qrItem)
    {
        if($qrItem['id'] == $_GET['qr_code_id'])
        {
              $qr_code = $qrItem[$qr_code_id];
              $file_path = $qrItem['file_path'];
                if ($file_path) {
                    header('Content-Type: image/png');
                    header('Content-Disposition: attachment; filename="qr_code_' . $qr_code_id . '.png"');
                    header('Content-Length: ' . filesize($file_path));
                    readfile($file_path);
                    exit;
                } else {
                    wp_die(__('QR code file not found.'));
                }
        }else{
            if (!isset($qr_codes[$qr_code_id])) {
                wp_die(__('QR code not found.'));
            }
        }
    }
}


function qr_code_manager_sub_admin_page() {
    
      require_once __DIR__ . '/vendor/autoload.php';
    
    
    // Check user capability
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    
    
    if (isset($_POST['submit'])) {



    $dataParams = $_POST;

    $arrayData = null;
    foreach ($dataParams as $key => $item)
    {
        if($key != 'submit' && $key != 'qr_type')
        {
            if($_POST['qr_type'] == 'VCard' )
            {

                $arrayData = $_POST['file_string'];
            }elseif($_POST['qr_type'] == 'Text Content'){

                $arrayData = $_POST['file_string'];

            }elseif ($_POST['qr_type'] == 'URL')
            {
                $arrayData = $_POST['file_string'];
            }elseif ($_POST['qr_type'] == 'Phone Number')
            {
                $arrayData = $_POST['file_string'];
            }elseif ($_POST['qr_type'] == 'SMS')
            {

                $arrayData = $_POST['file_string'];


            }elseif($_POST['qr_type'] == 'WhatsApp') {

                $arrayData = $_POST['file_string'];


            } elseif($_POST['qr_type'] == 'FaceTime') {

                $arrayData = $_POST['file_string'];


            } elseif($_POST['qr_type'] == 'Location') {

                $arrayData = $_POST['file_string'];


            } elseif($_POST['qr_type'] == 'Wifi') {

                $arrayData = $_POST['file_string'];

            }

            $qr_code_data = null;
//            $arrayData .= $key.'_'.$item.', ';
        }

    }


        $qr_code_data = $arrayData;



        // // Generate the QR code
    //   $qrCode = new Endroid\QrCode\QrCode($qr_code_data);
    // $qrCode->setSize(300); // Set the size of the QR code image
    // $qrCode->setMargin(10); // Set the margin around the QR code image
    // $image_data = $qrCode->writeDataUri(); // Encode the image as a data URI



    echo '<script>window.location = "'.$admin_page_url = admin_url('admin.php?page=qr-code-manager').'";</script>';





        // $upload_dir = wp_upload_dir();
    // $qr_code_dir = $upload_dir['basedir'] . '/qr_codes';
    // if (!file_exists($qr_code_dir)) {
    //   mkdir($qr_code_dir, 0755, true);
    // }
    

    // $image_data = $result->getDataUri(); // Encode the image as a data URI
    // var_dump($qrCode);

    // // Save the QR code image
   
   
    // // Add the QR code to the list of QR codes (stored as an option in the WordPress database)
    $qr_codes = get_option('qr_codes', array());
    $qr_codes[] = array(
      'id' => uniqid(),
      'data' => $qr_code_data,
      'file_path' => $_POST['hash_qr'],
      'file_url' => $_POST['hash_qr'],
      'qr_type' => $_POST['qr_type'],
    );
    update_option('qr_codes', $qr_codes);
  }
    

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
    <style>
        li {
            margin-top: 20px;
        }

        /* Style buttons */
        .top-btn {
            background-color: #fff;
            border: none;
            color: #000;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
            padding-left: 20px;
            padding-right: 20px;
            -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.4);
            box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.4);
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 5px;
        }

        /* Darker background on mouse-over */
        .top-btn:hover {
            background-color: #4b4bdb;
            color: #fff;
        }

        li .active {
            background-color: #4b4bdb;
            color: #fff;
        }


        .btn-primary {
            background-color: #4b4bdb;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #4040bb;
        }

        .card {
            -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.4);
            box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.4);
            border: none;
        }

        .full {
            width: 100%;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        canvas {
          width: 300px !important;
          height: 300px !important;
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <div class="container p-5" align="center">
        <div>
            <h1 style="font-size: 3.75rem; font-weight: 700;">Phone QR code generator</h1>
            <P style="color: #222222;font-size: 1.45rem;">Generate custom Phone QR codes in minutes.</P>
        </div>


        <div class="mt-5">


            <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="top-btn active" onchange="makeCodeWithTextContent()" id="pills-text-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-text" type="button" role="tab" aria-controls="pills-text"
                        aria-selected="true"><i class="fa fa-paragraph" aria-hidden="true"></i> Text</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-url-tab"  onchange="makeCodeWithUrl()" data-bs-toggle="pill" data-bs-target="#pills-url"
                        type="button" role="tab" aria-controls="pills-url" aria-selected="false"><i class="fa fa-link"
                            aria-hidden="true"></i> URL</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-phone-tab" onchange="makeCodeWithPhone()" data-bs-toggle="pill" data-bs-target="#pills-phone"
                        type="button" role="tab" aria-controls="pills-phone" aria-selected="false"><i
                            class="fa fa-phone-square" aria-hidden="true"></i> Phone</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-sms-tab" data-bs-toggle="pill" onchange="makeCodeWithSMS()" data-bs-target="#pills-sms"
                        type="button" role="tab" aria-controls="pills-sms" aria-selected="false"><i
                            class="fa fa-commenting" aria-hidden="true"></i> SMS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-email-tab" data-bs-toggle="pill" onchange="makeCodeWithEmail()" data-bs-target="#pills-email"
                        type="button" role="tab" aria-controls="pills-email" aria-selected="false"><i
                            class="fa fa-envelope" aria-hidden="true"></i> Email</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-whatsapp-tab" data-bs-toggle="pill" onchange="makeCodeWithWhatsApp()"
                        data-bs-target="#pills-whatsapp" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-facetime-tab" data-bs-toggle="pill" onchange="makeCodeWithFaceTime()"
                        data-bs-target="#pills-facetime" type="button" role="tab" aria-controls="pills-facetime"
                        aria-selected="false"><i class="fa fa-headphones" aria-hidden="true"></i> FaceTime</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-location-tab" data-bs-toggle="pill" onchange="makeCodewithLocation()"
                        data-bs-target="#pills-location" type="button" role="tab" aria-controls="pills-location"
                        aria-selected="false"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-wifi-tab" data-bs-toggle="pill" data-bs-target="#pills-wifi" onchange="makeCodewithWifi()"
                        type="button" role="tab" aria-controls="pills-wifi" aria-selected="false"><i class="fa fa-wifi"
                            aria-hidden="true"></i> WiFi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="top-btn" id="pills-vcard-tab" data-bs-toggle="pill" data-bs-target="#pills-vcard" onchange="makeCodewithvCard()"
                        type="button" role="tab" aria-controls="pills-vcard" aria-selected="false"><i
                            class="fa fa-address-card" aria-hidden="true"></i> vCard</button>
                </li>
            </ul>

            <div class="row" style="margin-top:85px;">
                <div class="col card m-4 p-5">

                    <div class="tab-content" id="pills-tabContent">


                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/text_content.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/url.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/phone_number.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/sms_content.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/email.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/whatsapp.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/face_app.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/location.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/wifi.php');  ?>
                        <?php require_once(plugin_dir_path(__FILE__) . 'form_sections/vcard.php');  ?>
                    </div>
                </div>


                <div class="col card m-4 p-5">
                    <form method="post" action="">
                        <!-- <p> QR CODE HERE</p> -->
                        <div id="qrcode">

                        </div>
                        <input type="hidden" name="hash_qr" id="hash_qr">
                        <input type="hidden" name="file_string" id="file_string">   
                        <input type="hidden" name="qr_type" id="qr_type">
                        <div class="row">
                             <button class="btn btn-dark mt-4 pb-3 pt-3"  type="button" onclick="getDownload()">Download</button>
                             <button class="btn btn-danger mt-2 pt-3 pb-3" name="submit"  type="submit">Save QR</button>
                        </div>

                        
                     
                    </form>
                </div>



                <!-- partial -->
                <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>




            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script>



//        qrCode.download({ name: "qr", extension: "svg" });

    </script>




    <script>
        jQuery(document).ready(function($) {
            var file_frame;

            $('#my_file_manager_button_email').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_email').val(attachment.url);
                    makeCodeWithEmail();
                });

                file_frame.open();
            });

            $('#my_file_manager_button_faceapp').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_facebook').val(attachment.url);
                    makeCodeWithFaceTime()
                });

                file_frame.open();
            });

            $('#my_file_manager_button_location').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_location').val(attachment.url);
                    makeCodewithLocation();
                });

                file_frame.open();
            });


            $('#my_file_manager_button_phone_number').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_phone_number').val(attachment.url);
                    makeCodeWithPhone();
                });

                file_frame.open();
            });

            $('#my_file_manager_button_sms_content').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_sms_content').val(attachment.url);
                    makeCodeWithSMS();
                });

                file_frame.open();
            });

            $('#my_file_manager_button_text_content').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_text_content').val(attachment.url);
                    makeCodeWithTextContent();
                });

                file_frame.open();
            });


            $('#my_file_manager_button_url').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_url').val(attachment.url);
                    makeCodeWithUrl();
                });

                file_frame.open();
            });


            $('#my_file_manager_button_vcard').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_vcard').val(attachment.url);
                    makeCodewithvCard();
                });

                file_frame.open();
            });

            $('#my_file_manager_button_whatsapp').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_whatsapp').val(attachment.url);
                    makeCodeWithWhatsApp();
                });

                file_frame.open();
            });

            $('#my_file_manager_button_wifi').on('click', function(event) {
                event.preventDefault();

                if (file_frame) {
                    file_frame.open();
                    return;
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a file',
                    button: {
                        text: 'Use this file'
                    },
                    multiple: false
                });

                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#selected_image_url_wifi').val(attachment.url);
                    makeCodewithWifi();
                });

                file_frame.open();
            });
        });


        function getDownload() {
            var tmp_canvas = document.getElementsByTagName('canvas');

            var image = tmp_canvas[0].toDataURL();


            var link = document.createElement("a");
            link.download = "my-image.png";
            link.href = image;

            // Add the link to the DOM and click it to start the download
            document.body.appendChild(link);
            link.click();

            // Remove the link from the DOM
            document.body.removeChild(link);

//            $('#thumbnail_list').append($('<img/>', { src : dataURL }).addClass('image'));
        }



        // Make is Text Content QR
        function makeCodeWithTextContent() {

            document.getElementById("qrcode").innerHTML = '';
            var conceptName = $('#qr_style_text_content').find(":selected").val();
            var varColor = $('#favcolor_text_content').val();
            var selectedImageUrl = $('#selected_image_url_text_content').val();
            var size_data = $('#size_text_content').val();
            var type = 'Text Content';

            $('#file_string').val(type);

            console.log(varColor);
            console.log(conceptName);


            var elText = document.getElementById("textcontent");
            if (!elText.value) {
                elText.focus();
                return;
            }

            var margin_vals = $('#margin_text_content').val();




            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: elText.value,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                },
                imageOptions: {
                    crossOrigin: "anonymous",
                    margin: margin_vals
                }
            });

            qrCode.append(document.getElementById("qrcode"));


            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val( image);
            $('#file_string').val(elText.value);

        }

        // Make it URL Content QR
        function makeCodeWithUrl () {
            document.getElementById("qrcode").innerHTML = '';
            var elText = document.getElementById("url");
            if (!elText.value) {
                elText.focus();
                return;
            }
            var varColor = $('#favcolor_url').val();
            console.log(varColor);

            var selectedImageUrl = $('#selected_image_url_url').val();

            var size_data = $('#size_url').val();

            var type = 'URL';

            $('#qr_type').val(type);

            var url = elText.value;
            if (!url.startsWith("http://") && !url.startsWith("https://")) {
                url = "http://" + url;
            }

            var conceptName = $('#qr_style_url').find(":selected").val();

            var margin_vals = $('#margin_face_app').val();


            console.log(conceptName);

            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: url,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                },
                imageOptions: {
                    margin: margin_vals
                }
            });





//            hash_qr,file_string
            qrCode.append(document.getElementById("qrcode"));


            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(url);

        }


        function makeCodeWithPhone () {
            document.getElementById("qrcode").innerHTML = '';
            var elText = document.getElementById("phone_number");
            if (!elText.value) {
                elText.focus();
                return;
            }

            var conceptName = $('#qr_style_phone_number').find(":selected").val();
            var varColor = $('#favcolor_phone_number').val();

            var selectedImageUrl = $('#selected_image_url_phone_number').val();

            var phoneNumberString = "tel:" + elText.value;
            var size_data = $('#size_phone_number').val();



            var type = 'Phone Number';
            $('#qr_type').val(type);

            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: phoneNumberString,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                }
            });

            qrCode.append(document.getElementById("qrcode"));


            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(phoneNumberString);

        }

        function makeCodeWithSMS() {
            document.getElementById("qrcode").innerHTML = '';
            var phone_number_sms = document.getElementById("sms_phone_number");
            var sms_content = document.getElementById("sms_content");


            if (!phone_number_sms.value || !sms_content.value) {
                alert("Please fill in both phone number and SMS content fields.");
                return;
            }

            var varColor = $('#favcolor_sms_content').val();

            var conceptName = $('#qr_style_sms_content').find(":selected").val();

            var selectedImageUrl = $('#selected_image_url_sms_content').val();

            var finalData = "SMSTO:" + phone_number_sms.value + ":" + sms_content.value;

            var size_data = $('#size_sms_content').val();

            var type = 'SMS';
            $('#qr_type').val(type);


            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: finalData,
                type: conceptName,

                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                }
            });

            qrCode.append(document.getElementById("qrcode"));


            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(finalData);

        }


        function makeCodeWithEmail() {
            document.getElementById("qrcode").innerHTML = '';
            var email = document.getElementById("email_send_email");
            var subject = document.getElementById("prefilledemailsubject");
            var email_content = document.getElementById("prefilledemailmessage");

            var varColor = $('#favcolor_email').val();
            var selectedImageUrl = $('#selected_image_url_email').val();

            var size_data = $('#size_email').val();

            var type = 'Email';
            $('#qr_type').val(type);


            if (!email.value) {
                alert("Please fill in the email address field.");
                return;
            }

            var finalData = "mailto:" + encodeURIComponent(email.value)
                + "?subject=" + encodeURIComponent(subject.value)
                + "&body=" + encodeURIComponent(email_content.value);

            var conceptName = $('#qr_style_email').find(":selected").val();


            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: finalData,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                }
            });

            qrCode.append(document.getElementById("qrcode"));



            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(finalData);
        }

        function makeCodeWithWhatsApp() {
            document.getElementById("qrcode").innerHTML = '';
            var phonenumber = document.getElementById("phonenumber_whatsapp");
            var prefilledwhatsappmessage = document.getElementById("prefilledwhatsappmessage");
            var conceptName = $('#qr_style_whatsapp').find(":selected").val();
            var varColor = $('#favcolor_whatsapp').val();

            var selectedImageUrl = $('#selected_image_url_whatsapp').val();

            var size_data = $('#size_whatsapp').val();

            var type = 'WhatsApp';
            $('#qr_type').val(type);


            if (!phonenumber.value) {
                alert("Please fill in the phone number field.");
                return;
            }

            var finalData = "https://wa.me/" + encodeURIComponent(phonenumber.value)
                + "?text=" + encodeURIComponent(prefilledwhatsappmessage.value);

            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                type : conceptName,
                data: finalData,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                }
            });

            qrCode.append(document.getElementById("qrcode"));


            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(finalData);
        }

        function makeCodeWithFaceTime() {
            document.getElementById("qrcode").innerHTML = '';
            var phonenumberoremail = document.getElementById("phonenumberoremailaddress_facetime");

            if (!phonenumberoremail.value) {
                alert("Please fill in the phone number or email address field.");
                return;
            }

            var finalData = "facetime://" + encodeURIComponent(phonenumberoremail.value);
            var conceptName = $('#qr_style_facetime').find(":selected").val();
            var selectedImageUrl = $('#selected_image_url_facetime').val();

            var varColor = $('#favcolor_facetime').val();

            var size_data = $('#size_face_app').val();

            var type = 'FaceTime';
            $('#qr_type').val(type);


            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: finalData,
                type : conceptName,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                }
            });

            qrCode.append(document.getElementById("qrcode"));

            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(finalData);
        }


        function makeCodewithLocation() {
            document.getElementById("qrcode").innerHTML = '';

            var latitude = document.getElementById("latitude");
            var longitude = document.getElementById("longitude");

            var selectedImageUrl = $('#selected_image_url_location').val();
            var size_data = $('#size_location').val();


            if (!latitude.value || !longitude.value) {
                alert("Please fill in both the latitude and longitude fields.");
                return;
            }

            var finalData = "geo:" + latitude.value + "," + longitude.value;
            var conceptName = $('#qr_style_location').find(":selected").val();
            var varColor = $('#favcolor_location').val();

            var type = 'Location';
            $('#qr_type').val(type);


            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: finalData,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                }
            });

            qrCode.append(document.getElementById("qrcode"));

            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(finalData);
        }

        function makeCodewithWifi() {
            document.getElementById("qrcode").innerHTML = '';
            var wifi_name = document.getElementById("wifi_name");
            var encryption = document.getElementById("encryption");
            var password = document.getElementById("password");
            var wifiishidden = document.getElementById("wifiishidden");
            var conceptName = $('#qr_style_wifi').find(":selected").val();

            var selectedImageUrl = $('#selected_image_url_wifi').val();
            var size_data = $('#size_wifi').val();


            if (!wifi_name.value || !encryption.value) {
                alert("Please fill in the WiFi name and encryption fields.");
                return;
            }
            var varColor = $('#favcolor_wifi').val();

            var finalData = "WIFI:T:" + encryption.value + ";S:" + wifi_name.value + ";";

            if (password.value) {
                finalData += "P:" + password.value + ";";
            }

            if (wifiishidden.value) {
                finalData += "H:" + wifiishidden.value + ";";
            }

            finalData += ";";

            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: finalData,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                }
            });
            var type = "Wifi";
            $('#qr_type').val(type);

            qrCode.append(document.getElementById("qrcode"));


            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(finalData);

//            qrCode.download({ name: "qr", extension: "svg" });

        }



        function makeCodewithvCard() {

            document.getElementById("qrcode").innerHTML = '';
            var firstname = document.getElementById("firstname");
            var lastname = document.getElementById("lastname");
            var email = document.getElementById("email_vcard");
            var websiteurl = document.getElementById("websiteurl");
            var company = document.getElementById("company");
            var jobtitle = document.getElementById("jobtitle");
            var birthday = document.getElementById("birthday");
            var streetaddress = document.getElementById("streetaddress");
            var city = document.getElementById("city");
            var postalcode = document.getElementById("postalcode");
            var state = document.getElementById("state");
            var country = document.getElementById("country");
            var password = document.getElementById("password_form");

            var conceptName = $('#qr_style_vcard').find(":selected").val();
            var varColor = $('#favcolor_vcard').val();

            var size_data = $('#size_vcard').val();



            var selectedImageUrl = $('#selected_image_url_vcard').val();

            var finalData = "BEGIN:VCARD\n" +
                "VERSION:3.0\n" +
                "N:" + lastname.value + ";" + firstname.value + ";;;\n" +
                "FN:" + firstname.value + " " + lastname.value + "\n" +
                "EMAIL;TYPE=PREF,INTERNET:" + email.value + "\n" +
                "URL:" + websiteurl.value + "\n" +
                "ORG:" + company.value + "\n" +
                "TITLE:" + jobtitle.value + "\n" +
                "BDAY:" + birthday.value + "\n" +
                "ADR;TYPE=WORK:;;" + streetaddress.value + ";" + city.value + ";" + state.value + ";" + postalcode.value + ";" + country.value + "\n" +
                "END:VCARD";

            const qrCode = new QRCodeStyling({
                width: size_data,
                height: size_data,
                data: finalData,
                image: selectedImageUrl,
                dotsOptions: {
                    color: varColor,
                    type: conceptName
                },
                cornersSquareOptions: {
                    type: conceptName,
                    color: varColor
                }
            });

            var type = "VCard";

            $('#qr_type').val(type);

            qrCode.append(document.getElementById("qrcode"));

            var tmp_canvas = document.getElementsByTagName('canvas');
            var image = tmp_canvas[0].toDataURL();
            $('#hash_qr').val(image);
            $('#file_string').val(finalData);
        }



    </script>
</body>

</html>




<!--<h2>Create a new QR code</h2>-->
<!--<form method="post" action="">-->
     
<!--   <div class="row" style="background: white;padding: 13px;border-style: solid;border-width: 2px;border-color: #c7c7c7;">-->
<!--     <div class="col-md-6">-->
<!--       <label for="qr_code_data">QR code data:</label>-->
<!--       <input type="text" name="qr_code_data" id="qr_code_data" class="regular-text" />-->
               
       <!--<label for="qr_code_data">QR code data:</label>-->
       <!--<input type="text" name="qr_code_data" id="qr_code_data" class="regular-text" />-->
               
<!--       <input type="submit" name="submit" id="submit" class="button button-primary" value="Generate QR code" />-->
<!--     </div>     -->
<!--   </div>-->
        
      <!--<table class="form-table">-->
      <!--  <tr>-->
      <!--    <th scope="row">-->
      <!--      <label for="qr_code_data">QR code data:</label>-->
      <!--    </th>-->
      <!--    <td>-->
      <!--      <input type="text" name="qr_code_data" id="qr_code_data" class="regular-text" />-->
      <!--    </td>-->
      <!--  </tr>-->
      <!--</table>-->
     
<!--</form>-->

<?php

}



if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class QR_Codes_List_Table extends WP_List_Table {
    public function get_columns() {
        return [
            'qr_code' => __('QR Code'),
            'id' => __('ID'),
            'qr_type' => 'QR Type',
            'data' => __('Data'),
            'actions' => __('Actions'),
        ];
    }

    public function prepare_items() {
        $this->_column_headers = [$this->get_columns(), [], []];
        $this->items = get_option('qr_codes', []);
    }

    public function column_default($item, $column_name) {

        switch ($column_name) {
            case 'qr_code':
                return sprintf('<img src='.$item['file_path'].' style="object-fit:contain;width:100px;height:50px;border: solid 1px #CCC"/>', esc_url($item['file_url']));
            case 'id':
                return $item['id'];
            case 'qr_type':
                return $item['qr_type'];
            case 'data':

                return $item['data'];
            case 'actions':
//                $download_url = admin_url('admin-ajax.php') . '?action=download_qr_code&qr_code_id=' . $item['id'];
//                $delete_url = wp_nonce_url(admin_url('admin.php?page=qr_code_manager&delete_qr_code_id=' . $item['id']), 'delete_qr_code_' . $item['id']);
//                $actions = [
//                    'download' => sprintf('<a href="%s">%s</a>', esc_url($download_url), __('Download')),
//                    'delete' => sprintf('<a href="%s" onclick="return confirm(\'%s\')">%s</a>', esc_url($delete_url), __('Are you sure you want to delete this QR code?'), __('Delete')),
//                ];
//                return $this->row_actions($actions);


                $delete_url = wp_nonce_url(
                    add_query_arg([
                            'action' => 'delete',
                            'page' => 'qr-code-manager',
                            'qr_type' => $item['qr_type'],
                            'qr_code_id' => $item['id']],
                            menu_page_url('qr_code_manager',
                                false)),
                    'delete_qr_code_' . $item['id']
                );
                return '<a style="background: #999999;padding: 4px;color: white;border-radius: 6px;padding-left: 10px;padding-right: 10px;" href="' . $item['file_path'] . '" download>Download</a> <a style="
    background: #F44336;
    padding: 5px;
    color: white;
    border-radius: 6px;
    padding-left: 13px;padding-right: 13px;" href="' . $delete_url . '" onclick="return confirm_delete();">Delete</a>';

            default:
                return '';
        }
    }
}


function qr_code_manager_admin_page() {



    $qr_codes_list_table = new QR_Codes_List_Table();
    $qr_codes_list_table->prepare_items();

    // Check if the user has the required capability
    if (!current_user_can(qr_code_manager_capability())) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }





    if (isset($_GET['action'], $_GET['qr_code_id']) && $_GET['action'] === 'delete') {
        if (check_admin_referer('delete_qr_code_' . $_GET['qr_code_id'])) {
            $qr_code_id = $_GET['qr_code_id'];
            $qr_codes = get_option('qr_codes', []);

            $dataArray = [];

            foreach ($qr_codes as $qrItem)
            {
                if($qrItem['id'] == $qr_code_id)
                {

                }else{
                    array_push($dataArray,$qrItem);
                }
            }


            update_option('qr_codes', $dataArray);


            echo '<script>window.location = "'.$admin_page_url = admin_url('admin.php?page=qr-code-manager').'";</script>';
            exit;

        }
    }

    ?>
    <div class="wrap">
        <h1>QR Code Manager Admin Page</h1>
        <br>
        <a href="<?php echo admin_url('admin.php?page=qr-code-manager-subpage')?>" class="page-title-action">Create new QR Code</a>

        <form method="post">
            <?php
            $qr_codes_list_table->search_box('search', 'search_id');
            $qr_codes_list_table->display();
            ?>
        </form>
    </div>

    <script>
        function confirm_delete() {
            return window.confirm('Are you sure you want to delete this QR code?');
        }
    </script>
    <?php
}





// Enqueue plugin styles and scripts in the WordPress admin area
add_action('admin_enqueue_scripts', 'qr_code_manager_admin_enqueue_scripts');

function qr_code_manager_admin_enqueue_scripts() {
    wp_enqueue_style('qr-code-manager-admin-style', plugin_dir_url(__FILE__) . 'css/admin-style.css');
    wp_enqueue_script('qr-code-manager-admin-script', plugin_dir_url(__FILE__) . 'js/admin-script.js', array('jquery'), '1.0', true);
}
