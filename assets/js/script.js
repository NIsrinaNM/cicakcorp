function edit_slider(id){
     // $('#edit-slider')[0].reset();
     $.ajax({
      url:BASE_URL+"admin/Create/ajax_show_per_id/"+id,
      type:"GET",
      dataType:"JSON",
      success: function(data){
        $('[name="captionEdit"]').val(data.caption);
        $('[name="fileEdit"]').val(data.gambar);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
     }); 
  };