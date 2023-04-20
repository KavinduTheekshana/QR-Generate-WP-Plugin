<div class="tab-pane fade" id="pills-url" role="tabpanel" aria-labelledby="pills-url-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">URL</label>
            <input type="url" class="form-control" name="url" id="url">
            <input type="hidden" name="qr_type" value="URL">
        </div>
     




        <!--                                URL Option -->

        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="true" aria-controls="collapseExample1"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse" id="collapseExample1" style="">
            <div class="row">
                <div class="form-group">
                <h6 class="float-start"><i class="fa fa-qrcode" aria-hidden="true"></i> &nbsp;
                QR Stylle</h6>
     <div class="row">
                    <select class="form-control" id="qr_style_url" onchange="makeCodeWithUrl()">
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
                <input type="color" id="favcolor_url" name="favcolor_url" onchange="makeCodeWithUrl()" value="#000000" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" id="my_file_manager_button_url"  type="button" ><i class="fa-solid fa-image"></i>
            &nbsp; Add a Logo</button>
     
                <!-- <button id="my_file_manager_button_url" class="button">Open File Manager</button> -->
                <input id="selected_image_url_url" type="hidden" />
          


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExample1Url3" aria-expanded="false" aria-controls="collapseExample1Url1Url3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExample1Url3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_url" value="1000" placeholder="Please enter px" onchange="makeCodeWithUrl()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" class="form-control" id="margin_url" placeholder="Please enter px" onchange="makeCodeWithUrl()">
            </div>

            <hr>
        </div>
        <button class="btn btn-primary mt-4" type="button"  onclick="makeCodeWithUrl()"  name="submit">Generate QR Code</button>

    </form>
</div>