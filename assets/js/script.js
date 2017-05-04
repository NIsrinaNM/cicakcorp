function edit_slider(id){
     // $('#edit-slider')[0].reset();
     $('form')[0].reset()
     // $('form').attr('action', BASE_URL+"admin/Create/updateSlider/"+id);
     $('[name="id"]').val(id);
     $.ajax({
      url:BASE_URL+"admin/Create/ajax_show_per_id/"+id,
      type:"GET",
      dataType:"JSON",
      success: function(data){
        $('[name="captionEdit"]').val(data.caption);
        $('[name="file"]').val(data.gambar);
        
        // alert(id);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
     }); 
  };

$('input.number').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});

function addKategori(){
  var data = $('form#add-kategori').serialize();
  $.ajax({
    url: BASE_URL+'admin/Product/addKategori',
    type:"POST",
    dataType: "json",
    data: data,
    success:function(res){
      if (res['success']) {
        location.reload(); 
      }else if (res['error']) {
        $('#notif').html('<div class="alert alert-danger alert-dismissable">'+
  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
  '<strong>Oops!</strong> '+res['error']+''+
'</div>');
      }
      
    }
  })
}

    //datatables
    table = $('#table').DataTable();

function reload_table(){
    table.ajax.reload(null,false); //reload datatable ajax 
}
