<div class="col card m-4 p-5">
    <form method="post" action="">
        <!-- <p> QR CODE HERE</p> -->
        <div id="qrcode">

        </div>
        <input type="hidden" name="hash_qr" id="hash_qr">
        <input type="hidden" name="file_string" id="file_string">
        <input type="hidden" name="qr_type" id="qr_type">
        <div class="row">
                             <button class="btn btn-dark mt-4 pb-3 pt-3"  type="button" onclick="getDownload()">Download</button>
                             <button class="btn btn-danger mt-2 pt-3 pb-3" name="submit"  type="submit">Save QR</button>
                        </div>

        <!-- <button class="btn btn-danger mt-4 pt-3 pb-3" name="submit"  type="submit">Save QR</button>
        <button class="btn btn-dark mt-4 pt-3 pb-3"  type="button" onclick="getDownload()">Download</button> -->
    </form>
</div>