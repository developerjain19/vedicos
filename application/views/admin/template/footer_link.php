<!-- plugins:js -->
<script src="<?= base_url(); ?>assets/admin/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url(); ?>assets/admin/vendors/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/jquery.cookie.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url(); ?>assets/admin/js/off-canvas.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/hoverable-collapse.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/misc.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/settings.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?= base_url(); ?>assets/admin/js/dashboard.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/data-table.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page -->
<script>
  CKEDITOR.replace('editor1', {
    height: 200,
    // By default, some basic text styles buttons are removed in the Standard preset.
    // The code below resets the default config.removeButtons setting.
    removeButtons: '',
    removeButtons: 'PasteFromWord'
  });
</script>
<script type="application/javascript">
  $(document).ready(function() {
    //group add limit
    var maxGroup = 200;
    //add more fields group
    $(".addMore").click(function() {
      if ($('body').find('.fieldGroup').length < maxGroup) {
        var fieldHTML = '<div class="form-group fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
        $('body').find('.fieldGroup:last').after(fieldHTML);
      } else {
        alert('Maximum ' + maxGroup + ' groups are allowed.');
      }
    });

    //remove fields group
    $("body").on("click", ".remove", function() {
      $(this).parents(".fieldGroup").remove();
    });



  });

  $("body").on("click", ".edit", function() {

    if (confirm("Are you sure to Update it ??")) {
      $('#updatedata').submit();
    } else {

    }
  });
  $(document).on('click', '.decline', function() {
    var rid = $(this).data('id');
    if (confirm('Are you sure you want to decline')) {
      $.ajax({
        method: "POST",
        url: "<?= base_url('admin_Dashboard/declinerequest') ?>",
        data: {
          rid: rid
        },
        success: function(response) {
          alert('Request declined');
          window.location="<?= base_url('admin_Dashboard/withdrawrequest') ?>";
        }
      });
    }
  });
  $(document).on('click', '.accept', function() {
    var rid = $(this).data('id');
    $('#requestfile'+rid).show();
  });
</script>