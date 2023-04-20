<script src="<?php echo plugins_url( 'qr-code-manager/includes/js/bootstrap.min.js') ?>" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


<script src="<?php echo plugins_url( 'qr-code-manager/includes/js/bootstrap5.min.js') ?>" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script>



    //        qrCode.download({ name: "qr", extension: "svg" });

</script>




<script>
    
    function clearQR() {

        var qrdoe =document.getElementById("qrcode");
        qrdoe.innerHTML = "";

    }
    
    
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

        $('#my_file_manager_button_facetime').on('click', function(event) {
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
                $('#selected_image_url_facetime').val(attachment.url);
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
            margin: margin_vals,
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

        var margin_vals = $('#margin_url').val();


        console.log(conceptName);

        const qrCode = new QRCodeStyling({
            width: size_data,
            height: size_data,
            data: url,
            image: selectedImageUrl,
            margin: margin_vals,
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


    function makeCodeWithPhone() {
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
        var margin_vals = $('#margin_phone_number').val();



        var type = 'Phone Number';
        $('#qr_type').val(type);

        const qrCode = new QRCodeStyling({
            width: size_data,
            height: size_data,
            data: phoneNumberString,
            image: selectedImageUrl,
            margin: margin_vals,
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

        var margin_vals = $('#margin_sms_content').val();


        const qrCode = new QRCodeStyling({
            width: size_data,
            height: size_data,
            data: finalData,
            image: selectedImageUrl,
            margin: margin_vals,
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

        var margin_vals = $('#margin_email').val();


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
            margin: margin_vals,
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
        var conceptName = $('#whatsapp_qr_type').find(":selected").val();
        var varColor = $('#favcolor_whatsapp').val();

        var margin_vals = $('#margin_whatsapp').val();


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
            data: finalData,
            margin: margin_vals,
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

        var size_data = $('#size_facetime').val();

        var type = 'FaceTime';
        $('#qr_type').val(type);

        var margin_vals = $('#margin_face_app').val();


        const qrCode = new QRCodeStyling({
            width: size_data,
            height: size_data,
            data: finalData,
            margin: margin_vals,
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

        var margin_vals = $('#margin_location').val();


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
            margin: margin_vals,
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

        var margin_vals = $('#margin_wifi').val();



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
            margin: margin_vals,
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

        var margin_vals = $('#margin_vcard').val();


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
            margin: margin_vals,
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