function not_approve(){
	var id = document.getElementById("id_pprove").value;
console.log(id);
	Swal.fire({
		title: 'Are you sure?',
		text: "Confirm disapprove!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Not approve!'
	}).then((result) => {
		if (result.value) { 
			$.ajax({
				url: 'manages.php',
				type: 'POST',
				dataType: 'json',
				data: {'approve':"0","id": id },
				success:function(data){
					if(data.data=="1"){
						Swal.fire({icon: 'success',
							title: 'Success...',
							text: 'Successful confirmation!',
							showConfirmButton: false,
						});
						setTimeout(function(){
							window.location.href = "../home/index.php"
						},2000)
					}
				}
			})
			
		} 
	})
}

function approve(){
	var id = document.getElementById("id_pprove").value;
	Swal.fire({
		title: 'Are you sure?',
		text: "Confirm approve!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, approve!'
	}).then((result) => {
		if (result.value) { 
			$.ajax({
				url: 'manages.php',
				type: 'POST',
				dataType: 'json',
				data: {'approve':"1","id": id },
				success:function(data){
					if(data.data=="1"){
						Swal.fire({icon: 'success',
							title: 'Success...',
							text: 'Successful confirmation!',
							showConfirmButton: false,
						});
						setTimeout(function(){
							window.location.href = "../home/index.php"
						},2000)
					}
				}
			})
			
		} 
	})
}