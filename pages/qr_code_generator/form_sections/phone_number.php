<div class="tab-pane fade" id="pills-phone" role="tabpanel" aria-labelledby="pills-phone-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">Phone number</label>
            <input type="text" class="form-control" name="phonenumber" id="phone_number" onchange="makeCodeWithPhone();">
            <input type="hidden" name="qr_type" value="Phone Number">

        </div>


        <!--                                Phone Number -->

        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExample1Phone1" aria-expanded="true" aria-controls="collapseExample1Phone1"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse show" id="collapseExample1Phone1" style="">
            <div class="row">
                <div class="form-group">
                    <label class="">QR Stylle</label>
                    <select class="form-control" id="qr_style_phone_number" onchange="makeCodeWithPhone()">
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
                <input type="color" id="favcolor_phone_number" onchange="makeCodeWithPhone()" name="favcolor" value="#000000" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExample1Phone2" aria-expanded="false" aria-controls="collapseExample1Phone2"><i class="fa fa-picture-o" aria-hidden="true"></i>
            &nbsp; Add a Logo</button>
        <div class="collapse p-3 float-start full" id="collapseExample1Phone2">
            <h6 class="float-start"> <i class="fa fa-eye" aria-hidden="true"></i> &nbsp; Logo
            </h6>
            <div class="row">
                <button id="my_file_manager_button_phone_number" class="button">Open File Manager</button>
                <input id="selected_image_url_phone_number" type="hidden" />
            </div>




            <hr>
        </div>


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExample1Phone3" aria-expanded="false" aria-controls="collapseExample1Phone3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExample1Phone3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_phone_number" value="300" placeholder="Please enter px" onchange="makeCodeWithPhone()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" id="margin_phone_number" class="form-control" placeholder="Please enter px" onchange="makeCodeWithPhone()">
            </div>

            <hr>
        </div>


        <button class="btn btn-primary mt-4" type="button" onclick="makeCodeWithPhone()" name="submit">Generate QR Code</button>
    </form>
</div>
