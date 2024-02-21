     <!-- jQuery -->
     <script src="../plugins/jquery/jquery.min.js"></script>
     <!-- jQuery UI 1.11.4 -->
     <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script>
         $.widget.bridge('uibutton', $.ui.button)
     </script>
     <!-- Bootstrap 4 -->
     <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- ChartJS -->
     <script src="../plugins/chart.js/Chart.min.js"></script>
     <!-- Sparkline -->
     <script src="../plugins/sparklines/sparkline.js"></script>
     <!-- JQVMap -->
     <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
     <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
     <!-- jQuery Knob Chart -->
     <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
     <!-- daterangepicker -->
     <script src="../plugins/moment/moment.min.js"></script>
     <script src="../plugins/daterangepicker/daterangepicker.js"></script>
     <!-- Tempusdominus Bootstrap 4 -->
     <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
     <!-- Summernote -->
     <script src="../plugins/summernote/summernote-bs4.min.js"></script>
     <!-- overlayScrollbars -->
     <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
     <!-- AdminLTE App -->
     <script src="../dist/js/adminlte.js"></script>
     <!-- AdminLTE for demo purposes -->
     <script src="../dist/js/demo.js"></script>
     <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     <script src="../dist/js/pages/dashboard.js"></script>



     <!-- 22222222222 DATATABLESS -->
     <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
     <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
     <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
     <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
     <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
     <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
     <script src="../plugins/jszip/jszip.min.js"></script>
     <script src="../plugins/pdfmake/pdfmake.min.js"></script>
     <script src="../plugins/pdfmake/vfs_fonts.js"></script>
     <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
     <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
     <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

     <script>
         $(function() {
             $("#example1").DataTable({
                 "responsive": true,
                 "lengthChange": false,
                 "autoWidth": false,
                 "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
             }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
             $('#example2').DataTable({
                 "paging": true,
                 "lengthChange": false,
                 "searching": false,
                 "ordering": true,
                 "info": true,
                 "autoWidth": false,
                 "responsive": true,
             });
         });
     </script>


     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



     <?php if (isset($_GET['reggi'])) : ?>
         <script>
             const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 timer: 3000,
                 timerProgressBar: true,
                 didOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                 }
             })

             Toast.fire({
                 icon: 'success',
                 title: 'Successfully Login to Registrar Dashboard!'
             })
         </script>

     <?php endif; ?>



     <?php if (isset($_GET['enr'])) : ?>
         <script>
             const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 timer: 3000,
                 timerProgressBar: true,
                 didOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                 }
             })

             Toast.fire({
                 icon: 'success',
                 title: 'Status Updated!'
             })
         </script>

     <?php endif; ?>



     <?php if (isset($_GET['comp'])) : ?>
         <script>
             Swal.fire({
                 title: '<span style="color: green;  font-family:Segoe Script;">Successfully Added!</span> <br>' + '<span style="color: green;  font-family:Segoe Script; font-size:20px;">with</span>',
                 html: '<br><h1 class="alert alert-warning badge badge-lg" style="background-color: yellow;">COMPLETE REQUIREMENTS</h1><br><br>' +


                     '',
                 icon: 'success',
                 showCloseButton: true,
                 focusConfirm: false,
                 confirmButtonText: '<a href="enrollment_status.php" class = "text-light text-bold" style = " border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);">Mask as Complete</a>',

                 confirmButtonAriaLabel: 'Thumbs up, great!'

             })
         </script>
     <?php endif; ?>



     <?php if (isset($_GET['sad'])) : ?>
         <script>
             Swal.fire({
                 title: '<span style="color: green;">Successfully Added!</span>',
                 html: '<br><h1 class="alert alert-warning badge badge-lg" style="background-color: yellow;">INCOMPLETE REQUIREMENTS</h1><br><br>' +
                     '<p style="color: dark;">No Good Moral</p>' +
                     '<p style="color: dark;">No Form 137</p>' +
                     '<p style="color: dark;">No Barangay Clearance Certificate</p>' +
                     '<p style="color: dark;">No Permanent Record Sf10</p>' +
                     '',
                 icon: 'success',
                 showCloseButton: true,
                 focusConfirm: false,
                 confirmButtonText: '<a href="enrollment_status.php" class = "text-light text-bold">Mask as Incomplete</a>',

                 confirmButtonAriaLabel: 'Thumbs up, great!'

             })
         </script>
     <?php endif; ?>





     <?php if (isset($_GET['sadF'])) : ?>
         <script>
             Swal.fire({
                 title: '<span style="color: green;">Successfully Added!</span>',
                 html: '<br><h1 class="alert alert-warning badge badge-lg" style="background-color: yellow;">INCOMPLETE REQUIREMENTS</h1><br><br>' +
                     '<p style="color: dark;">No Good Moral</p>' +
                     '<p style="color: dark;">No Form 137</p>' +
                     '<p style="color: dark;">No Barangay Clearance Certificate</p>' +

                     '',
                 icon: 'success',
                 showCloseButton: true,
                 focusConfirm: false,
                 confirmButtonText: '<a href="enrollment_status.php" class = "text-light text-bold">Mask as Incomplete</a>',

                 confirmButtonAriaLabel: 'Thumbs up, great!'

             })
         </script>
     <?php endif; ?>




     <?php if (isset($_GET['sadist'])) : ?>
         <script>
             Swal.fire({
                 title: '<span style="color: green;">Successfully Added!</span>',
                 html: '<br><h1 class="alert alert-warning badge badge-lg" style="background-color: yellow;">INCOMPLETE REQUIREMENTS</h1><br><br>' +
                     '<p style="color: dark;">No Good Moral</p>' +
                     '<p style="color: dark;">No Form 137</p>' +

                     '',
                 icon: 'success',
                 showCloseButton: true,
                 focusConfirm: false,
                 confirmButtonText: '<a href="enrollment_status.php" class = "text-light text-bold">Mask as Incomplete</a>',

                 confirmButtonAriaLabel: 'Thumbs up, great!'

             })
         </script>
     <?php endif; ?>





     </body>



     </html>