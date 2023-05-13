var upload = new FileUploadWithPreview('myUniqueUploadId', {

	showDeleteButtonOnImages: true,
	text: {
		chooseFile: ' ChooseImages',
		browse: 'Browse',
		selectedCount: 'Files Selected', /*files selected*/
	},
			//maxFileCount: 0,
		});

var upload = new FileUploadWithPreview('myUniqueUploadId1', {

	showDeleteButtonOnImages: true,
	text: {
		chooseFile: ' ChooseImages',
		browse: 'Browse',
		selectedCount: 'Files Selected', /*files selected*/
	},
			//maxFileCount: 0,
		});
var upload = new FileUploadWithPreview('myUniqueUploadId2', {

	showDeleteButtonOnImages: true,
	text: {
		chooseFile: ' ChooseImages',
		browse: 'Browse',
		selectedCount: 'Files Selected', /*files selected*/
	},
			//maxFileCount: 0,
		});
var upload = new FileUploadWithPreview('myUniqueUploadId3', {

	showDeleteButtonOnImages: true,
	text: {
		chooseFile: ' ChooseImages',
		browse: 'Browse',
		selectedCount: 'Files Selected', /*files selected*/
	},
			//maxFileCount: 0,
		});
var upload = new FileUploadWithPreview('myUniqueUploadId4', {

	showDeleteButtonOnImages: true,
	text: {
		chooseFile: ' ChooseImages',
		browse: 'Browse',
		selectedCount: 'Files Selected', /*files selected*/
	},
			//maxFileCount: 0,
		});
$(".spinner-grow").hide();
$("#insert_images_slide").on('submit', function(e){
	e.preventDefault();
	var numFiles = $("#clear")[0].files.length;
	if(numFiles >3 ){
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Limit maximum of 3 images !'
		})
	}else{
      //ถ้าภกาพน้อยกว่า 3 ให้ผ่าน 
      var fd = new FormData(this);
      var insert_imagse_slide  = "insert_imagse_slide"; 
      fd.append('insert_imagse_slide',insert_imagse_slide);
      $.ajax({
      	url: 'manages.php',
      	type: 'POST',
      	dataType :"json",
      	data: fd,
      	contentType: false,
      	cache: false,
      	processData:false,
      	beforeSend : function(){
      		$(".slide_img").show();
      		$("#slide_img").html('Loading...');
      		$("#slide_img").prop('disabled', true);
      	},
      	success: function(data){
      		console.log(data.data);
      		if(data.data=="1"){
      			setTimeout(function(){
      				window.location.reload();
      			},2000);
      		}
      	}
      })
  }
});


$("#images_above").on('submit', function(e){
	e.preventDefault();
	var fd = new FormData(this);
	var images_above  = "images_above"; 
	fd.append('images_above',images_above);
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType :"json",
		data: fd,
		contentType: false,
		cache: false,
		processData:false,
		beforeSend : function(){
			$(".above_img").show();
			$("#above_img").html('Loading...');
			$("#above_img").prop('disabled', true);
		},
		success: function(data){
			console.log(data.data);
			if(data.data=="1"){
				setTimeout(function(){
					window.location.reload();
				},2000);
			}
		}
	})
});

$("#images_below").on('submit', function(e){
	e.preventDefault();
	var fd = new FormData(this);
	var images_below  = "images_below"; 
	fd.append('images_below',images_below);
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType :"json",
		data: fd,
		contentType: false,
		cache: false,
		processData:false,
		beforeSend : function(){
			$(".below_img").show();
			$("#below_img").html('Loading...');
			$("#below_img").prop('disabled', true);
		},
		success: function(data){
			console.log(data.data);
			if(data.data=="1"){
				setTimeout(function(){
					window.location.reload();
				},2000);
			}
		}
	})
});

$("#images_left").on('submit', function(e){
	e.preventDefault();
	var fd = new FormData(this);
	var images_left  = "images_left"; 
	fd.append('images_left',images_left);
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType :"json",
		data: fd,
		contentType: false,
		cache: false,
		processData:false,
		beforeSend : function(){
			$(".left_img").show();
			$("#left_img").html('Loading...');
			$("#left_img").prop('disabled', true);
		},
		success: function(data){
			console.log(data.data);
			if(data.data=="1"){
				setTimeout(function(){
					window.location.reload();
				},2000);
			}
		}
	})
});

$("#images_right").on('submit', function(e){
	e.preventDefault();
	var fd = new FormData(this);
	var images_right  = "images_right"; 
	fd.append('images_right',images_right);
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType :"json",
		data: fd,
		contentType: false,
		cache: false,
		processData:false,
		beforeSend : function(){
			$(".right_img").show();
			$("#right_img").html('Loading...');
			$("#right_img").prop('disabled', true);
		},
		success: function(data){
			console.log(data.data);
			if(data.data=="1"){
				setTimeout(function(){
					window.location.reload();
				},2000);
			}
		}
	})
});