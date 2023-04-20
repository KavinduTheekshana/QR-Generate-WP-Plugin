<div class="tab-pane fade" id="pills-sms" role="tabpanel" aria-labelledby="pills-sms-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">Phone number</label>
            <input type="tel" class="form-control" name="phonenumber" id="sms_phone_number">
        </div>

        <input type="hidden" name="qr_type" value="SMS">
        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1"> SMS Content</label>
            <textarea class="form-control" id="sms_content" name="smscontent" rows="2" onkeyUp="makeCodeWithSMS()"></textarea>
        </div>



        <!--                                SMS Contets-->

        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExample1SmsContent1" aria-expanded="true" aria-controls="collapseExample1SmsContent1"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse" id="collapseExample1SmsContent1" style="">
            <div class="row">
                <div class="form-group">
                <h6 class="float-start"><i class="fa fa-qrcode" aria-hidden="true"></i> &nbsp;
                QR Stylle</h6>
     <div class="row">
                    <select class="form-control" id="qr_style_sms_content" onchange="makeCodeWithSMS()">
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
                <input type="color" id="favcolor_sms_content" name="favcolor_sms_content" onchange="makeCodeWithSMS()" value="#000000" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" id="my_file_manager_button_sms_content" type="button"><i class="fa-solid fa-image"></i>
            &nbsp; Add a Logo</button>
      
                <!-- <button id="my_file_manager_button_sms_content" class="button">Open File Manager</button> -->
                <input id="selected_image_url_sms_content" type="hidden" />
   


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExample1SmsContent3" aria-expanded="false" aria-controls="collapseExample1SmsContent3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExample1SmsContent3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_sms_content" value="1000" placeholder="Please enter px" onchange="makeCodeWithSMS()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" class="form-control" id="margin_sms_content" placeholder="Please enter px" onchange="makeCodeWithSMS()">
            </div>

            <hr>
        </div>


        <button class="btn btn-primary mt-4" type="button"  onclick="makeCodeWithSMS()" name="submit">Generate QR Code</button>
    </form>
</div>