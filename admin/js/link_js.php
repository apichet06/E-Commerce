<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- dropdown select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- dataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- uploads file images -->
<script src="../js/file_upload_with_preview.min.js"></script>
<!-- แจ้งเตือน sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>

<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

	<!-- PAGE SCRIPTS
		<script src="../dist/js/pages/dashboard2.js"></script> -->
		<script type="text/javascript">
			$(document).ready(function(){
				/** add active class and stay opened when selected */
				var url = window.location;

			// for sidebar menu entirely but not cover treeview
			$('ul.nav-sidebar a').filter(function() {
				return this.href == url;
			}).addClass('active');

			// for treeview
			$('ul.nav-treeview a').filter(function() {
				return this.href == url;
			}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
			});
</script>