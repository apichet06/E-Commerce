$(".clear_insert").click(function(event) { 
	upload.clearPreviewImage(); 
	$('.textarea').summernote('reset');
	$("#reset_select2").val('').trigger('change')

});
$(".clear_updateimg").click(function(event) {
	upload_update.clearPreviewImage();
});
$(document).ready(function() {

	$("#data").dataTable({
		lengthChange: true,
		"sPaginationType" : 'full_numbers', 'sPaging' : 'pagination',
		"drawCallback": function () {
			$('.dataTables_paginate > .pagination').addClass('pagination-sm')

		}
	})

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
var upload_update = new FileUploadWithPreview('myUniqueUploadIdUpdate', {

	showDeleteButtonOnImages: true,
	text: {
		chooseFile: ' ChooseImages',
		browse: 'Browse',
		selectedCount: 'Files Selected', /*files selected*/
	},
			//maxFileCount: 0,
		});


$(function () { 
		    // Summernote
		    var $summernote = $('.textarea');
		    //var isCodeView;

		    $(() => {
		    	$summernote.summernote({
		    		height: 150,
		    		focus: false,

		    		placeholder: 'Detail',
		    		toolbar: [
		    		['style', ['bold', 'italic', 'underline', 'clear']],
		    		['font', ['strikethrough', 'superscript', 'subscript']],
		    		['fontsize', ['fontsize']],
		    		['color', ['color']],
		    		['table', ['table']],
		    		['para', ['ul', 'ol', 'paragraph']],
		    		['height', ['height']]
		    		]

		    	});
		    });

		    $summernote.on('summernote.codeview.toggled', () => {
		    	isCodeView = $('.note-editor').hasClass('codeview');
		    });

		})

/*$(".edit").click(function(event) {
	event.preventDefault();
	var pd_detail = $(this).data('pd_detail');

	$('.textarea').summernote({placeholder: 'Hello bootstrap 4'});
});	*/

$('#keyup_discount').keyup(function(event) {
	var sum0=0;
	var sum1=0;
	var pd_pirce = document.getElementsByName('pd_pirce');
	var percent = document.getElementsByName('pd_discount');

		for(var i=0;i<pd_pirce.length;i++){sum1 = (sum1 * 1) + (pd_pirce[i].value * 1);} //sum1
		for(var i=0;i<percent.length;i++){sum0 = (sum0 * 1) + (percent[i].value * 1);} //sum0

			var per = Math.floor(sum1-sum0*sum1/100);	
		$('#keyup_pricesell').val(per);
	});

$('#keyup_pricesell').keyup(function(event) {
	var sum0=0;
	var sum1=0;
	var pd_pirce = document.getElementsByName('pd_pirce');
	var sell = document.getElementsByName('pd_pricesell');

		for(var i=0;i<pd_pirce.length;i++){sum1 = (sum1 * 1) + (pd_pirce[i].value * 1);} //sum1
		for(var i=0;i<sell.length;i++){sum0 = (sum0 * 1) + (sell[i].value * 1);} //sum1

			var discount = Math.floor((sum1-sum0)/sum1*100);	
		$('#keyup_discount').val(discount);
	});

$('#pd_discount').keyup(function(event) {
	var sum0=0;
	var sum1=0;
	var pd_pirce = document.getElementsByName('pd_pirce');
	var percent = document.getElementsByName('pd_discount');

		for(var i=0;i<pd_pirce.length;i++){sum1 = (sum1 * 1) + (pd_pirce[i].value * 1);} //sum1
		for(var i=0;i<percent.length;i++){sum0 = (sum0 * 1) + (percent[i].value * 1);} //sum0

			var per = Math.floor(sum1-sum0*sum1/100);	
		$('#pd_pricesell').val(per);
	});

$('#pd_pricesell').keyup(function(event) {
	var sum0=0;
	var sum1=0;
	var pd_pirce = document.getElementsByName('pd_pirce');
	var sell = document.getElementsByName('pd_pricesell');

		for(var i=0;i<pd_pirce.length;i++){sum1 = (sum1 * 1) + (pd_pirce[i].value * 1);} //sum1
		for(var i=0;i<sell.length;i++){sum0 = (sum0 * 1) + (sell[i].value * 1);} //sum1

			var discount = Math.floor((sum1-sum0)/sum1*100);	
		$('#pd_discount').val(discount);
	});