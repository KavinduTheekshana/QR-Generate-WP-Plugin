<div class="tab-pane fade" id="pills-location" role="tabpanel"
     aria-labelledby="pills-location-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">Latitude</label>
            <input type="text" class="form-control" name="latitude" id="latitude" onchange="makeCodewithLocation()">
        </div>

        <input type="hidden" name="qr_type" value="Location">

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Longitude</label>
            <input type="text" class="form-control" name="longitude" id="longitude" onchange="makeCodewithLocation()">
        </div>


        <button class="btn btn-primary mt-4" type="button" onclick="makeCodewithLocation()" name="submit">Generate QR Code</button>



        <!--                                Location Options-->

        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExample1Location1" aria-expanded="true" aria-controls="collapseExample1Location1"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse show" id="collapseExample1Location1" style="">
            <div class="row">
                <div class="form-group">
                    <label class="">QR Stylle</label>
                    <select class="form-control" id="qr_style_location" onchange="makeCodewithLocation()">
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
                <input type="color" id="favcolor_location" onchange="makeCodewithLocation()" name="favcolor" value="#000000" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExample1Location2" aria-expanded="false" aria-controls="collapseExample1Location2"><i class="fa fa-picture-o" aria-hidden="true"></i>
            &nbsp; Add a Logo</button>
        <div class="collapse p-3 float-start full" id="collapseExample1Location2">
            <h6 class="float-start"> <i class="fa fa-eye" aria-hidden="true"></i> &nbsp; Logo
            </h6>
            <div class="row">
                <button id="my_file_manager_button_location" class="button">Open File Manager</button>
                <input id="selected_image_url_location" type="hidden" />
            </div>




            <hr>
        </div>


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExample1Location3" aria-expanded="false" aria-controls="collapseExample1Location3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExample1Location3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_location" value="300" placeholder="Please enter px" onchange="makeCodewithLocation()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" class="form-control"  id="margin_location" placeholder="Please enter px" onchange="makeCodewithLocation()">
            </div>

            <hr>
        </div>



    </form>
</div>