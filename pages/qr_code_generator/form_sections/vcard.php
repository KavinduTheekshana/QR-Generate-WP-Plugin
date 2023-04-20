<div class="tab-pane fade" id="pills-vcard" role="tabpanel" aria-labelledby="pills-vcard-tab">
    <form action="" method="post">

        <div class="row">

            <div class="col">
                <label class="d-flex" for="exampleFormControlSelect1">First name</label>
                <input type="text" class="form-control" name="firstname" id="firstname" onchange="makeCodewithvCard()">
            </div>
            <div class="col">
                <label class="d-flex" for="exampleFormControlSelect1">Last name</label>
                <input type="text" class="form-control" name="lastname" id="lastname" onchange="makeCodewithvCard()">
            </div>
        </div>


        <input type="hidden" name="qr_type" value="VCard">

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" name="email" id="email_vcard" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Website URL</label>
            <input type="text" class="form-control" name="websiteurl" id="websiteurl" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Company</label>
            <input type="text" class="form-control" name="company" id="company" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1"> Job title</label>
            <input type="text" class="form-control" name="jobtitle" id="jobtitle" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1"> Birthday</label>
            <input type="date" class="form-control" name="birthday" id="birthday" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Street address</label>
            <input type="text" class="form-control" name="streetaddress" id="streetaddress" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">City</label>
            <input type="text" class="form-control" name="city" id="city" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1"> Postal/ZIP code</label>
            <input type="text" class="form-control" name="postalcode" id="postalcode" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Region/State</label>
            <input type="text" class="form-control" name="state" id="state" onchange="makeCodewithvCard()">
        </div>

        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Country</label>
            <input type="text" class="form-control" name="country" id="country" onchange="makeCodewithvCard()">
        </div>



        <div class="form-group mt-2">
            <label class="d-flex" for="exampleFormControlInput1">Password</label>
            <textarea class="form-control" id="password_form" name="password" rows="2" onchange="makeCodewithvCard()">

                                    </textarea>
        </div>


        <button class="btn btn-primary mt-4" type="button" onclick="makeCodewithvCard()" name="submit">Generate QR Code</button>

        <button class="btn btn-warning mt-4 full" type="button" data-toggle="collapse" data-target="#collapseExampleVcard1" aria-expanded="true" aria-controls="collapseExampleVcard1"><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp; Custom QR Design</button>
        <div class="p-3 float-start full collapse show" id="collapseExampleVcard1" style="">
            <div class="row">
                <div class="form-group">
                    <label class="">QR Stylle</label>
                    <select class="form-control" id="qr_style_vcard" onchange="makeCodewithvCard()">
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
                <input type="color" id="favcolor_vcard" name="favcolor_vcard" value="#000000" onchange="makeCodewithvCard()" style="padding: 0; height: 40px;">
            </div>
            <br>
            <hr>
        </div>

        <button class="btn btn-danger mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExampleVcard2" aria-expanded="false" aria-controls="collapseExampleVcard2"><i class="fa fa-picture-o" aria-hidden="true"></i>
            &nbsp; Add a Logo</button>
        <div class="collapse p-3 float-start full" id="collapseExampleVcard2">
            <h6 class="float-start"> <i class="fa fa-eye" aria-hidden="true"></i> &nbsp; Logo
            </h6>
            <div class="row">
                <button id="my_file_manager_button_vcard" class="button">Open File Manager</button>
                <input id="selected_image_url_vcard" type="hidden" onchange="makeCodewithvCard()" />
            </div>




            <hr>
        </div>


        <button class="btn btn-dark mt-2 full" type="button" data-toggle="collapse" data-target="#collapseExampleVcard3" aria-expanded="false" aria-controls="collapseExampleVcard3"><i class="fa fa-wrench" aria-hidden="true"></i>
            &nbsp; Quality Settings</button>
        <div class="collapse p-3 float-start full" id="collapseExampleVcard3">
            <h6 class="float-start"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> &nbsp;
                Size</h6>
            <div>
                <input type="number" class="form-control" id="size_vcard" value="300" placeholder="Please enter px" onchange="makeCodewithvCard()">
            </div>
            <br>
            <h6 class="float-start"> <i class="fa fa-square" aria-hidden="true"></i> &nbsp;
                Margin Size</h6>
            <div>
                <input type="number" class="form-control" id="margin_vcard" placeholder="Please enter px" onchange="makeCodewithvCard()">
            </div>

            <hr>
        </div>

    </form>
</div>