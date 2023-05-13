
$(".spinner-grow").hide();
$('#insert_user').on('submit', function(event) {
	event.preventDefault();
	var insert = "insert_user";
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType: 'json',
		data:$(this).serialize()+"&insert="+ insert,
		beforeSend: function(){
			$('.spin_in').show();
			$("#btn_in").html('Loading...');
			$("#btn_in").prop('disabled', true);
		},
		success: function(data){
			if(data.data =="1"){
				setTimeout(function(){
					window.location.reload();
				},2000);		
			}else{

			}
		}
	});
	
});

$('.del').click(function(event) {
	event.preventDefault();
	var del = "del";
	var id = $(this).data('id');
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
				data:{'del' : del,'id' : id},
				beforeSend: function(){
					$('.spin_del').show();
				},
				success: function(data){
					if(data.data =="1"){
						setTimeout(function(){
							window.location.reload();
						},1000);		
					}
				}
			});
		}
	});
	
	
});


$(".update").click(function(event) {
	var id = $(this).data("id");
	var u_name = $(this).data("name");
	var u_lname = $(this).data("lname");
	var username = $(this).data("username");
	var status = $(this).data("status");
	
	$("#iduser").val(id);
	$("#u_name").val(u_name);
	$("#u_lname").val(u_lname);
	$("#username").val(username);
	$("#status").val(status);
});


$("#update_user").on('submit', function(event) {
	event.preventDefault();
	var update = "update";
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize() + "&update=" + update ,
		beforeSend : function(){
			$(".spin_update").show();
			$("#spin_update").html('Loading...');
			$("#spin_update").prop('disabled', true);
		},
		success : function(data){
			if(data.data=="1"){
				setTimeout(function(){
					$("#update").modal('hide');
				},500)
				setTimeout(function(){
					window.location.reload();
				},1000)

			}
		}
	})
});

