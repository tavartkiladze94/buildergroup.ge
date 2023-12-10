<br>
<br>
<br>
<br>
<br>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

  <div class="sidenav-overlay" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
    <div class="drag-target" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
        <!-- BEGIN: Vendor JS-->
    <script src="<?=base_url();?>assets/admin/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="<?=base_url();?>assets/admin/js/dropzone.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=base_url();?>assets/admin/js/katex.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/highlight.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/quill.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/toastr.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="<?=base_url();?>assets/admin/js/picker.js"></script>
    <script src="<?=base_url();?>assets/admin/js/picker.date.js"></script>
    <script src="<?=base_url();?>assets/admin/js/picker.time.js"></script>
    <script src="<?=base_url();?>assets/admin/js/legacy.js"></script>
    <script src="<?=base_url();?>assets/admin/js/flatpickr.min.js"></script>

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url();?>assets/admin/js/app-menu.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/app.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=base_url();?>assets/admin/js/app-email.min.js"></script>
     <script src="<?=base_url();?>assets/admin/js/formm-file-uploader.min.js"></script>
     <script src="<?=base_url();?>assets/admin/js/form-pickers.min.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
    <div class="modal-backdrop show" style="display:none;z-index:9999;"></div>
  </body>
  <!-- END: Body-->
</html>
