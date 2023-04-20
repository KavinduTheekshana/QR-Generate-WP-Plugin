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

            } elseif ($_POST['qr_type'] == 'Email'){
                $arrayData = $_POST['file_string'];
            }

            $qr_code_data = null;
//            $arrayData .= $key.'_'.$item.', ';
        }

    }


        $qr_code_data = $arrayData;


    echo '<script>window.location = "'.$admin_page_url = admin_url('admin.php?page=qr-code-manager').'";</script>';

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




    <?php require_once(plugin_dir_path(__FILE__) . 'pages/qr_code_generator/qr_code_generator.php');  ?>


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





                return '
                <a style="background: #999999;padding: 4px;color: white;border-radius: 6px;padding-left: 10px;padding-right: 10px;" href="' . $item['file_path'] . '" download>Download</a>
                <a style="background: #999999;padding: 4px;color: white;border-radius: 6px;padding-left: 10px;padding-right: 10px;" href="' . $item['file_path'] . '" onclick="previewqr(\''.$item['file_path'].'\');"> View</a>
                <a style="background: #F44336;padding: 5px;color: white;border-radius: 6px;padding-left: 13px;padding-right: 13px;" href="' . $delete_url . '" onclick="return confirm_delete();">Delete</a>';

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

    <?php require_once(plugin_dir_path(__FILE__) . 'pages/saved_qr_codes/saved_qr_codes.php');  ?>



    <?php
}





// Enqueue plugin styles and scripts in the WordPress admin area
add_action('admin_enqueue_scripts', 'qr_code_manager_admin_enqueue_scripts');

function qr_code_manager_admin_enqueue_scripts() {
    wp_enqueue_style('qr-code-manager-admin-style', plugin_dir_url(__FILE__) . 'css/admin-style.css');
    wp_enqueue_script('qr-code-manager-admin-script', plugin_dir_url(__FILE__) . 'js/admin-script.js', array('jquery'), '1.0', true);
}
