
// ++++++++++++++++++++++++++++++++++++++++++++++
//                Insert Type Name
// ++++++++++++++++++++++++++++++++++++++++++++++
$('.spinner_in').hide();
$("#insert").on('submit', function(event) {
	event.preventDefault();
	var insert = "insert";
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize() +"&insert=" + insert,
		beforeSend: function(){
			$("#btnpro_in").html('Loading...');
			$("#btnpro_in").prop('disabled', true);
			$('.spinner_in').show();
		},
		success : function(data){
			if(data.in_type=="1"){
				setTimeout(function(){
					window.location.reload();
				},1000);
			}else{
				Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!'})
			}
		}
	});

});

// ++++++++++++++++++++++++++++++++++++++++++++++
//                Insert Type Name
// ++++++++++++++++++++++++++++++++++++++++++++++
$(".spinner-grow").hide();
$(".del").click(function(e) {
	e.preventDefault();
	var id = $(this).data("id");
	//console.log(id)
	var del = "del";
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) { 
			$.ajax({
				url: 'manages.php',
				type: 'POST',
				dataType: 'json',
				data: {'id' : id,'del' : del},
				beforeSend : function(){
					$(".spinner_del").show();
				},
				success : function(data){
					if(data.del_type=="1"){
						//Swal.fire('Deleted!','Your file has been deleted.','success');
						setTimeout(function(){
							window.location.reload();
						},500);
					}else if(data.del_type=="0"){
						$(".spinner_del").hide();
						Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!'});
					}else if(data.del_type=="00"){
						$(".spinner_del").hide();
						Swal.fire({icon : 'error',title: 'Oops...',text: 'Used, cannot be deleted.'});
					}
				}
			})
		}

	});

});


$('.update').click(function(event) {
	event.preventDefault();
	var cat_id = $(this).data("cat_id");
	var type_id = $(this).data("type_id");
	var type_name1 = $(this).data("type_name1");
	var type_name2 = $(this).data("type_name2");

	$("#cat_id").val(cat_id).trigger('change');
	$("#type_id").val(type_id);
	$("#type_name1").val(type_name1);
	$("#type_name2").val(type_name2);
});

$('#update_type').on('submit', function(event) {
	event.preventDefault();
    var update = "update";
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize() +"&update="+ update,
		beforeSend :function(){
			$(".spin_update").show();
			$("#btn_update").html('Loading...');
			$("#btn_update").prop('disabled', true);
		},
		success : function(data){
			if(data.update_type=="1"){
				setTimeout(function(){
					$('#update').modal('hide');
				},500)  
				setTimeout(function(){
					window.location.reload();
				},1000)
			}		  	
		}
	});
	
});