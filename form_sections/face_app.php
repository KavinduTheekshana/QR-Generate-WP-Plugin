<div class="tab-pane fade" id="pills-facetime" role="tabpanel"
     aria-labelledby="pills-facetime-tab">
    <form action="" method="post">
        <div class="form-group">
            <label class="d-flex" for="exampleFormControlInput1">Phone number or email address</label>
            <input type="text" class="form-control" name="phonenumberoremailaddress" id="phonenumberoremailaddress_facetime" onchange="makeCodeWithFaceTime()">
        </div>

        <input type="hidden" name="qr_type" value="FaceTime">



        <button class="btn btn-primary mt-4" type="button" onclick="makeCodeWithFaceTime()" name="submit">Generate QR Code</button>


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExampleface3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExampleface3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_face_app" value="300" placeholder="Please enter px">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true" id="margin_face_app"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" class="form-control" placeholder="Please enter px">
            </div>

            <hr>
        </div>
    </form>
</div>