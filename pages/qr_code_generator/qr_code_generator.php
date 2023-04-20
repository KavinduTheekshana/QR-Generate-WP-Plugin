<?php require_once(plugin_dir_path(__FILE__) . 'partials/header.php');  ?>

    <div class="mt-5">
        <?php require_once(plugin_dir_path(__FILE__) . 'partials/navbars.php');  ?>
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
            <?php require_once(plugin_dir_path(__FILE__) . 'partials/qr_preview_section.php');  ?>
            <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        </div>
    </div>
    </div>

<?php require_once(plugin_dir_path(__FILE__) . 'partials/footer.php');  ?>