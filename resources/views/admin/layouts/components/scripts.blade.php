<!-- jQuery 
<script src="/assets/admin/js/jquery.min.js"></script>-->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>

<!-- Bootstrap 4 
<script src="/assets/admin/js/bootstrap.bundle.min.js"></script>-->

<!--Bootstarp 5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- toastr js -->
<script src="/assets/admin/js/toastr.min.js"></script>

<!-- AdminLTE App -->
<script src="/assets/admin/js/adminlte.min.js"></script>

<!-- Datatble -->
<link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

<!--toastr notification Start-->
<script>
toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

//success flash message
@if( Session::has("nSuccess") )
    toastr.success('{{Session::get("nSuccess")}}');
@endif

//error flash message
@if( Session::has("nFailure") )
    toastr.error('{{Session::get("nFailure")}}');
@endif

//warning flash message
@if( Session::has("nWarning") )
    toastr.warning('{{Session::get("nWarning")}}');
@endif
</script>
<!--toastr notification End-->

<!--Orders-->
<script>
	$(document).ready(function () {
		$('#all-orders').DataTable({
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'csv',
					text: 'Export',
					title: 'Orders-export-on-<?php echo date('Y-m-d'); ?>',
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4, 5, 6,7 ,8 ,9 ,10, 11, 12, 13 ]
						/*,
						    format: {
							body: function ( data, row, column, node ) {
								return data.replace('||', "\r\n");
							}
						}*/
					}					
				}
			]			
		});
	});
</script>
<!--Orders END-->


<!--Orders-->
<script>
	$(document).ready(function () {
		$('.all-seats').DataTable({
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'csv',
					text: 'Export',
					title: 'Seats-export-on-<?php echo date('Y-m-d'); ?>',
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4, 5, 6,7 ,8 ,9 ]
						/*,
						    format: {
							body: function ( data, row, column, node ) {
								return data.replace('||', "\r\n");
							}
						}*/
					}					
				}
			]			
		});
	});
</script>
<!--Orders END-->


<!--logs--->
<script>
	$(document).ready(function () {
		$('#all-logs').DataTable({
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'csv',
					text: 'Export',
					title: 'Logs-export-on-<?php echo date('Y-m-d'); ?>',
					exportOptions: {
						columns: [ 0, 1, 2, 3]
						/*,
						    format: {
							body: function ( data, row, column, node ) {
								return data.replace('||', "\r\n");
							}
						}*/
					}					
				}
			]			
		});
	});
</script>
<!--logs END-->


<!--Coupons-->
<script>
	$(document).ready(function () {
		$('#all-coupons').DataTable({
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'csv',
					text: 'Export',
					title: 'Coupons-export-on-<?php echo date('Y-m-d'); ?>',
					exportOptions: {
						columns: [ 0, 1, 2]
						/*,
						    format: {
							body: function ( data, row, column, node ) {
								return data.replace('||', "\r\n");
							}
						}*/
					}					
				}
			]			
		});
	});
</script>
<!--coupons END-->

<!--customer-->
<script>
	$(document).ready(function () {
		$('#all-customer').DataTable({
			dom: 'Bfrtip',
			buttons: [
				{
					extend: 'csv',
					text: 'Export',
					title: 'Doctors-export-on-<?php echo date('Y-m-d'); ?>',
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
						/*,
						    format: {
							body: function ( data, row, column, node ) {
								return data.replace('||', "\r\n");
							}
						}*/
					}					
				}
			]			
		});
	});
</script>
<!--customer END-->





<!-- Scrollable modal -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
		<div class="">
		  <div class="" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="Booking Info">View</h5>
				<button type="button" class="close" onclick="$('#view').modal('hide');" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				  <div id="order-content" style="padding:1rem 2%;font-size:14px;">

				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" onclick="$('#view').modal('hide');" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
	</div>
</div>




<script>

  			$('.order-details').click(function() {
				// 
				var id = $(this).attr('data-id');
				var content = $('.Booking_Info_'+id).html();
				$('#order-content').html(content);
    			$('#view').modal('show');

				
  			});
	

</script>
