jQuery(document).ready(function () {
	jQuery("#stock").keypress(function (e) {
		var length = jQuery(this).val().length;
		if(length > 9) {
			return false;
		} else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});
});

$(".update_stock").click(function(event) {
	event.preventDefault();
	var id = $(this).data("id");
	var name = $(this).data("name");
	var stock = $(this).data("stock");

	$("#name").text(name);
	$("#id").val(id);
	$("#stock").val(stock);
});

$("#update_stock").on('submit',function(event) {
	event.preventDefault();
	$.ajax({
		url: 'update_stock.php',
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize(),
		success: function(data){
			if(data.data=="1"){
				setTimeout(function(){
					$("#modal_stock").modal('hide');
				},200)

				setTimeout(function(){	
					Swal.fire({
						icon: 'success',
						title: 'Update Stock Success',
						showConfirmButton: false,
						timer: 1000
					})
				},500)	
				setTimeout(function(){
					window.location.reload();	
				},1500)		       				
			}
		}
	})

});

$('.example').DataTable({
	lengthChange: false,
	"searching" : false,
	"lengthMenu": [ 10, 25,50, 75, 100 ],
	"sPaginationType" : 'full_numbers', 'sPaging' : 'pagination',
	"drawCallback": function () {
		$('.dataTables_paginate > .pagination').addClass('pagination-sm');

	}
});
