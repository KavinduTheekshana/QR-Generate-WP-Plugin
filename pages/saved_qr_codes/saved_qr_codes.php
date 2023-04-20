
<div class="wrap">
    <h1>QR Code Manager Admin Page</h1>
    <br>
    <a href="<?php echo admin_url('admin.php?page=qr-code-manager-subpage')?>" class="page-title-action">Create new QR Code</a>

    <form method="post">
        <?php
        $qr_codes_list_table->search_box('search', 'search_id');
        $qr_codes_list_table->display();
        ?>
    </form>
</div>

<script>

   function previewqr(data) {
        var image = new Image();
        image.src = data;

        var w = window.open("");
        w.document.write(image.outerHTML);
    }

    function confirm_delete() {
        return window.confirm('Are you sure you want to delete this QR code?');
    }
</script>