<div class="tab-pane fade" id="pills-whatsapp" role="tabpanel"
     aria-labelledby="pills-whatsapp-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">Phone number</label>
            <input type="text" class="form-control" id="phonenumber_whatsapp" name="phonenumber">
        </div>

        <input type="hidden" name="qr_type" value="WhatsApp">

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1"> Prefilled WhatsApp message</label>
            <textarea class="form-control" id="prefilledwhatsappmessage" rows="2" name="prefilledwhatsappmessage" onkeyUp="makeCodeWithWhatsApp()"></textarea>
        </div>







        <!--                                WhatsApp Option-->

        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExampleWhatsApp1" aria-expanded="true" aria-controls="collapseExampleWhatsApp1"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse" id="collapseExampleWhatsApp1" style="">
            <div class="row">
                <div class="form-group">
                <h6 class="float-start"><i class="fa fa-qrcode" aria-hidden="true"></i> &nbsp;
                QR Stylle</h6>
     <div class="row">
                    <select class="form-control" id="whatsapp_qr_type" onchange="makeCodeWithWhatsApp()">
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
                <input type="color" id="favcolor_whatsapp" onchange="makeCodeWithWhatsApp()"  name="favcolor_whatsapp" value="#000000" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" id="my_file_manager_button_whatsapp" type="button"><i class="fa-solid fa-image"></i>
            &nbsp; Add a Logo</button>
        
                <!-- <button id="my_file_manager_button_whatsapp" class="button">Open File Manager</button> -->
                <input id="selected_image_url_whatsapp" type="hidden" />
     


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExampleWhatsApp3" aria-expanded="false" aria-controls="collapseExampleWhatsApp3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExampleWhatsApp3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_whatsapp" value="1000" placeholder="Please enter px" onchange="makeCodeWithWhatsApp()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" class="form-control" id="margin_whatsapp" placeholder="Please enter px" onchange="makeCodeWithWhatsApp()">
            </div>

            <hr>
        </div>



        <button class="btn btn-primary mt-4" type="button" onclick="makeCodeWithWhatsApp()" name="submit">Generate QR Code</button>
    </form>
</div>