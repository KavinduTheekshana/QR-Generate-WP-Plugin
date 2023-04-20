<div class="tab-pane fade" id="pills-wifi" role="tabpanel" aria-labelledby="pills-wifi-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">WiFi name (SSID)</label>
            <input type="text" class="form-control" name="wifi_name" id="wifi_name" onchange="makeCodewithWifi()">
        </div>

        <input type="hidden" name="qr_type" value="Wifi">


        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlSelect1">Encryption</label>
            <select class="form-control" id="encryption" name="encryption" onchange="makeCodewithWifi()">
                <option>WEP</option>
                <option>WPA/WPA2</option>
                <option>No encryption</option>
            </select>
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control" name="password" id="password" onchange="makeCodewithWifi()">
        </div>

        <input type="hidden" name="qr_type" value="Encryption">


        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlSelect1"> WiFi is hidden</label>
            <select class="form-control" id="wifiishidden" name="wifiishidden" onchange="makeCodewithWifi()">
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <button class="btn btn-primary mt-4" type="button" onclick="makeCodewithWifi()" name="submit">Generate QR Code</button>



        <!--                                Wifi Optins-->

        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExampleWifi1" aria-expanded="true" aria-controls="collapseExampleWifi1"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse show" id="collapseExampleWifi1" style="">
            <div class="row">
                <div class="form-group">
                    <label class="">QR Stylle</label>
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

            <br>
            <h6 class="float-start"> <i class="fa fa-eyedropper" aria-hidden="true"></i> &nbsp;
                Color</h6>
            <div class="row">
                <input type="color" id="favcolor_wifi" name="favcolor_wifi" value="#000000" onchange="makeCodewithWifi()" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExampleWifi2" aria-expanded="false" aria-controls="collapseExampleWifi2"><i class="fa fa-picture-o" aria-hidden="true"></i>
            &nbsp; Add a Logo</button>
        <div class="collapse p-3 float-start full" id="collapseExampleWifi2">
            <h6 class="float-start"> <i class="fa fa-eye" aria-hidden="true"></i> &nbsp; Logo
            </h6>
            <div class="row">
                <button id="my_file_manager_button_wifi" class="button">Open File Manager</button>
                <input id="selected_image_url_wifi" type="hidden" onchange="makeCodewithWifi()" />
            </div>




            <hr>
        </div>


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExampleWifi3" aria-expanded="false" aria-controls="collapseExampleWifi3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExampleWifi3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_wifi" value="300" placeholder="Please enter px" onchange="makeCodewithWifi()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" class="form-control" id="margin_wifi" placeholder="Please enter px" onchange="makeCodewithWifi()">
            </div>

            <hr>
        </div>

    </form>
</div>