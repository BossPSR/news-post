   <!-- BEGIN: Vendor JS-->
   <script src="assets/app-assets/vendors/js/vendors.min.js"></script>
   <script src="assets/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
   <!-- BEGIN Vendor JS-->

   <!-- BEGIN: Page Vendor JS-->
   <script src="assets/app-assets/vendors/js/ui/jquery.sticky.js"></script>
   <script src="assets/app-assets/vendors/js/charts/apexcharts.min.js"></script>
   <script src="assets/app-assets/vendors/js/extensions/tether.min.js"></script>
   <script src="assets/app-assets/vendors/js/extensions/shepherd.min.js"></script>
   <script src="assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
   <script src="assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
   <script src="assets/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
   <script src="assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
   <script src="assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
   <script src="assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
   <script src="assets/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
   <script src="assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
   <!-- END: Page Vendor JS-->

   <!-- BEGIN: Theme JS-->
   <script src="assets/app-assets/js/core/app-menu.js"></script>
   <script src="assets/app-assets/js/core/app.js"></script>
   <script src="assets/app-assets/js/scripts/components.js"></script>
   <!-- END: Theme JS-->

   <!-- BEGIN: Page JS-->
   <script src="assets/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
   <script src="assets/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
   <!-- END: Page JS-->
   <script type="text/javascript">
      <?php if ($this->session->flashdata('success_login')) : ?>
         Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Welcome.',
            showConfirmButton: false,
            timer: 1500,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
         });
      <?php endif; ?>

      <?php if ($this->session->flashdata('dont_click')) : ?>
         Swal.fire({
            title: "Error!",
            text: " You do not have rights!",
            type: "error",
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
         });
      <?php endif; ?>
   </script>