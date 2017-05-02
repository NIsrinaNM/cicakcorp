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