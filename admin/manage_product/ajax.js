// ++++++++++++++++++++++++++++++++++++++++++++++
//                 category insert
// ++++++++++++++++++++++++++++++++++++++++++++++
$(".spin_in").hide();
$("#insert_cat").on('submit', function(event) {
	event.preventDefault();
	var insert_cate  = "insert_cate"; 
 $.ajax({
  url: 'manages.php',
  type: 'POST',
  data: $(this).serialize()+ "&insert="+ insert_cate,
  beforeSend : function(){
    $('.spin_in').show();
    $("#btncat_in").html('Loading...');
    $("#btncat_in").prop('disabled', true);
  },
  success : function(data){
    setTimeout(function(){
      window.location.reload();
    },500);

  }
})

});

// ++++++++++++++++++++++++++++++++++++++++++++++
//                 category delete
// ++++++++++++++++++++++++++++++++++++++++++++++
$(".del_cat").click(function(e){
 e.preventDefault();
 var id = $(this).data('id');
 //console.log(id);
 var del ="delete_cat";
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
      data: {'id' : id, 'delete_cat' : del},
      beforeSend : function(){
        $(".spin_del").show();
      },
      success: function(data){
        if(data=="1"){
          //Swal.fire('Deleted!','Your file has been deleted.','success');
          setTimeout(function(){
            window.location.reload();
          },1000);
        }else{
         Swal.fire({icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!'
        });
         $(".spin_del").hide();
       }
     }
   })

  }
});

});

// ++++++++++++++++++++++++++++++++++++++++++++++
//                 category Update
// ++++++++++++++++++++++++++++++++++++++++++++++

$(".up_cat").click(function(e) {
  e.preventDefault();

  var id = $(this).data("id");  
  var name = $(this).data("name");
  var number = $(this).data("number");
  //console.log(number)
  $('#cat_id').val(id);
  $('#cat_name').val(name);
  $('#cat_number').val(number);
});

$(".update_cat").on('submit',function(e) {
  e.preventDefault();
  var update_cat = "update_cat";
  $.ajax({
    url: 'manages.php',
    type: 'POST',
    data: $(this).serialize() + "&update_cat=" + update_cat,
    success : function(data){
      if (data==="1") {
        setTimeout(function(){
          $('#update_cat').modal('hide');
        },300);
        setTimeout(function(){
          window.location.reload();
        },2000) 
      } 
    }
  });
  
});

// ++++++++++++++++++++++++++++++++++++++++++++++
//                 porduct insert
// ++++++++++++++++++++++++++++++++++++++++++++++

$('.progress').hide();
$('.spinner-grow').hide();
$("#insert_pro").on('submit', function(e) {
 e.preventDefault();
 var numFiles = $("#clear")[0].files.length;

 if(document.insert_pro.detail.value == ""){
   $(".alert_detail").html(" *Please fill out Detail information*");
  document.insert_pro.detail.focus();
  return false;
}
if(numFiles >8 ){
 Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Limit maximum of 8 images !'
})
}else{
      //ถ้าภกาพน้อยกว่า 8 ให้ผ่าน 
      var fd = new FormData(this);
      var insert_pro  = "insert_pro"; 
      fd.append('insert_pro',insert_pro);
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
        $("#btnpro_in").html('Loading...');
        $("#btnpro_in").prop('disabled', true);
        $('.spinner-grow').show();
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
    }

  });


// ++++++++++++++++++++++++++++++++++++++++++++++
//                Delete Porduct 
// ++++++++++++++++++++++++++++++++++++++++++++++

$(".del_pro").click(function(e) {
  e.preventDefault();
  var id = $(this).data('id');
  var del = "delete_pro";
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
        data:{ 'id' : id,'del' : del },
        success : function(data){
          if(data=="1"){
            Swal.fire('Deleted!','Your file has been deleted.','success');
            setTimeout(function(){
              window.location.reload();
            },1000);
          }else{
           Swal.fire({icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })
         }

       }

     })
    }
  })
});



// ++++++++++++++++++++++++++++++++++++++++++++++
//                Update Porduct 
// ++++++++++++++++++++++++++++++++++++++++++++++

$('.edit_pro').click(function(e) {
  e.preventDefault();
  var id           = $(this).data('id');
  var type_id      = $(this).data('type_id'); 
  var pd_name1     = $(this).data('pd_name1');
  var pd_name2     = $(this).data('pd_name2');
  var pd_price     = $(this).data('pd_price');
  var pd_pricesell = $(this).data('pd_pricesell');
  var pd_discount  = $(this).data('pd_discount');
  var stock        = $(this).data('stock');
  var pd_promotion = $(this).data('pd_promotion');
  var pd_condition = $(this).data('pd_condition');

  $('#id_pro').val(id);
  $('#type_id').val(type_id).trigger('change');
  $('#pd_name1').val(pd_name1);
  $('#pd_name2').val(pd_name2);
  $('#pd_price').val(pd_price);
  $('#pd_pricesell').val(pd_pricesell);
  $('#pd_discount').val(pd_discount);
  $('#stock').val(stock);
  $('#pd_promotion').val(pd_promotion);
  $('#pd_condition').val(pd_condition);
});

$("#update_pro").on('submit', function(event) {
  event.preventDefault();
  var numFiles = $("#clear_updateimg")[0].files.length;
  if(numFiles > 8 ){
   Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Limit maximum of 8 images !'
  })
 }else{
      //ถ้าภกาพน้อยกว่า 8 ให้ผ่าน 
      var fd = new FormData(this);
      var update_pro  = "update_pro"; 
      fd.append('update_pro',update_pro);
      $.ajax({
       url: 'manages.php',
       type: 'POST',
       data: fd,
       contentType: false,
       cache: false,
       processData:false,
       beforeSend : function(){
        $('.progress_up').show();
        $("#btnpro_up").html('Loading...');
        $("#btnpro_up").prop('disabled', true);
        $('.spin_up').show();
      },
      xhr: function () {
        var xhr = $.ajaxSettings.xhr();
        xhr.upload.onprogress = function (e) {
         // For uploads
         if (e.lengthComputable) {
          var percentComplete =Math.floor((e.loaded / e.total)* 100) + '%';
          $('#pro_up').css({width : percentComplete});
          $("#percen_up").html(percentComplete);
        }
      }
      return xhr;
    },
    success : function(data){
      if(data=="1"){
        setTimeout(function(){
          $('#edit').model('hide');
        },500);
        setTimeout(function(){
          window.location.reload();
        },1000);
      }else{
        $("#btnpro_up").html('Update');
        $("#btnpro_up").prop('disabled', false);
        $('.spin_up').hide();
        $('.progress_up').hide();
        setTimeout(function(){
          $('#edit').modal('hide');
        },200);
        setTimeout(function(){
          Swal.fire({icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })
        },1000);

      }
    }
  })
    }
  });



// ++++++++++++++++++++++++++++++++++++++++++++++
//                 preview Detail 
// ++++++++++++++++++++++++++++++++++++++++++++++

$('.preview_detail').click(function(event) {
  event.preventDefault();
  var id = $(this).data('id');
  var detail = "preview_detail";
  $.ajax({
    url: 'data_preview.php',
    type: 'POST',
    dataType: "json",
    data: {"id": id ,"detail" : detail },
    success : function(data){ 
      $('.edit2').summernote('code',data.PD_Detail[0].template);
      $(".data_detail").html(data.PD_Detail);
      $("#id_detail").val(data.id);
      
    }
  });

});

$('.preview_images').click(function(event) {
  event.preventDefault();
  var id = $(this).data('id');

  var images = "preview_images";
  $.ajax({
    url: 'data_preview.php',
    type: 'POST',
    dataType: "json",
    data: {"id": id ,"images" : images },
    success : function(data){
     $(".data_images").html(data.img);

   }
 });

});




$("#update_detail").on('submit', function(event) {
  event.preventDefault();
  var markup = $('.textarea').text();
  console.log(markup);
  var fd = new FormData(this);
  var update_detail = "update_detail";
  //formData.append("summernote", $('.textarea').text() );
  fd.append('update_detail',update_detail);
  $.ajax({
   url: 'manages.php',
   type: 'POST',
   data: fd,
   contentType: false,
   cache: false,
   processData:false,
   beforeSend:function(){
    $(".spin_up").show();
    $("#update_preview_detail").html('Loading...');
    $("#update_preview_detail").prop('disabled', true);
  },
  success: function(data){
    setTimeout(function(){
      $('#preview_detail').modal('hide');
    },500);
    setTimeout(function(){
      window.location.reload();
    },1000);
  }


});
  
  
});

