<div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" name="email" id="email_send_email">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Prefilled email subject</label>
            <input type="text" class="form-control" name="prefilledemailsubject" id="prefilledemailsubject">
        </div>

        <input type="hidden" name="qr_type" value="Email">

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Prefilled email message</label>
            <textarea class="form-control" rows="2" id="prefilledemailmessage" name="prefilledemailmessage" onkeyUp="makeCodeWithEmail()"></textarea>
        </div>




        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExample1Email" aria-expanded="true" aria-controls="collapseExample1Email"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse" id="collapseExample1Email" style="">
            <div class="row">
                <div class="form-group">
                <h6 class="float-start"><i class="fa fa-qrcode" aria-hidden="true"></i> &nbsp;
                QR Stylle</h6>
     <div class="row">
                    <select class="form-control" id="qr_style_email" onselect="makeCodeWithEmail()">
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
                <input type="color" id="favcolor_email" name="favcolor" value="#000000" onchange="makeCodeWithEmail()" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" type="button" id="my_file_manager_button_email"><i class="fa-solid fa-image"></i>
            &nbsp; Add a Logo</button>
      
                <!-- <button id="my_file_manager_button_email" class="button">Open File Manager</button> -->
                <input id="selected_image_url_email" type="hidden" />
            


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExample1Email3" aria-expanded="false" aria-controls="collapseExample1Email3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExample1Email3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_email" value="1000" placeholder="Please enter px" onchange="makeCodeWithEmail()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" id="margin_email" class="form-control" placeholder="Please enter px" onchange="makeCodeWithEmail()">
            </div>

            <hr>
        </div>


        <button class="btn btn-primary mt-4" type="button" onclick="makeCodeWithEmail()" name="submit">Generate QR Code</button>
    </form>
</div>