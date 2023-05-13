$(".clear_insert").click(function(event) { 
	upload.clearPreviewImage(); 
	$('.textarea').summernote('reset');
	$("#reset_select2").val('').trigger('change')

});


var upload = new FileUploadWithPreview('myUniqueUploadId', {

	showDeleteButtonOnImages: true,
	text: {
		chooseFile: ' ChooseImages',
		browse: 'Browse',
		selectedCount: 'Files Selected', /*files selected*/
	},
			//maxFileCount: 0,
		});


// ++++++++++++++++++++++++++++++++++++++++++++++
//        po payment update delivery 
// ++++++++++++++++++++++++++++++++++++++++++++++

$(".update_po").click(function(event) {
	var id = $(this).data("id");
	$("#po_id").val(id);
});

$('.progress').hide();
$('.spinner-grow').hide();
$("#update").on('submit', function(e) {
	e.preventDefault();
	var fd = new FormData(this);
	var update_delivery  = "update_delivery"; 
	fd.append('update_delivery',update_delivery);
	$.ajax({
		url: 'manages.php',
		type: 'POST',
		dataType:"json",
		data: fd,
		contentType: false,
		cache: false,
		processData:false,
		beforeSend : function(){
			$('.progress').show();
			$("#btn_in").html('Loading...');
			$("#btn_in").prop('disabled', true);
			$("#btn_c").prop('disabled',true);
		},
		xhr: function () {
			var xhr = $.ajaxSettings.xhr();
			xhr.upload.onprogress = function (e) {
         // For uploads
         if (e.lengthComputable) {
         	var percentComplete =Math.floor((e.loaded / e.total)* 100) + '%';
         	$('#pro_in').css({width : percentComplete});
         	$("#percen").html(percentComplete);
         }
     }
     return xhr;
 },
 success: function(data){
 	if(data.data=="1"){
 		setTimeout(function(){
 			window.location.reload();
 		},2000);
 	}

 }


})


});