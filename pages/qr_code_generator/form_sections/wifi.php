<div class="tab-pane fade" id="pills-wifi" role="tabpanel" aria-labelledby="pills-wifi-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">WiFi name (SSID)</label>
            <input type="text" class="form-control" name="wifi_name" id="wifi_name">
        </div>

        <input type="hidden" name="qr_type" value="Wifi">


        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlSelect1">Encryption</label>
            <select class="form-control" id="encryption" name="encryption">
                <option>WEP</option>
                <option>WPA/WPA2</option>
                <option>No encryption</option>
            </select>
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <input type="hidden" name="qr_type" value="Encryption">


        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlSelect1"> WiFi is hidden</label>
            <select class="form-control" id="wifiishidden" name="wifiishidden">
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        



        <!--                                Wifi Optins-->

        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExampleWifi1" aria-expanded="true" aria-controls="collapseExampleWifi1"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse" id="collapseExampleWifi1" style="">
            <div class="row">
                <div class="form-group">
                <h6 class="float-start"><i class="fa fa-qrcode" aria-hidden="true"></i> &nbsp;
                QR Stylle</h6>
     <div class="row">
                    <select class="form-control" id="qr_style_wifi" onchange="makeCodewithWifi()">
                        <option value="square">Square</option>
                        <option value="dots">Dots</option>
                        <option value="rounded">Rounded</option>
                        <option value="extra-rounded" selected="">Extra rounded</option>
                        <option value="classy">Classy</option>
                        <option value="classy-rounded">Classy rounded</option>
                    </select>
                </div>
                </div>
            </div>

            <br>
            <h6 class="float-start"> <i class="fa fa-eyedropper" aria-hidden="true"></i> &nbsp;
                Color</h6>
            <div class="row">
                <input type="color" id="favcolor_wifi" name="favcolor_wifi" value="#000000" onchange="makeCodewithWifi()" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" type="button" id="my_file_manager_button_wifi"><i class="fa-solid fa-image"></i>
            &nbsp; Add a Logo</button>
       
                <!-- <button id="my_file_manager_button_wifi" class="button">Open File Manager</button> -->
                <input id="selected_image_url_wifi" type="hidden" onchange="makeCodewithWifi()" />
           


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExampleWifi3" aria-expanded="false" aria-controls="collapseExampleWifi3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExampleWifi3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_wifi" value="1000" placeholder="Please enter px" onchange="makeCodewithWifi()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" class="form-control" id="margin_wifi" placeholder="Please enter px" onchange="makeCodewithWifi()">
            </div>

            <hr>
        </div>
        <button class="btn btn-primary mt-4" type="button" onclick="makeCodewithWifi()" name="submit">Generate QR Code</button>
    </form>
</div>