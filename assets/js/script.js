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
  }

function more_info(id){
     // $('form')[0].reset();
     // $('form').attr('action', BASE_URL+"admin/Create/updateSlider/"+id);
     // var id = $(this).find('#username_v').text();
     // alert(id);
     
     $.ajax({
      url:BASE_URL+"admin/User/userInfo/"+id,
      type:"GET",
      dataType:"JSON",
      success: function(data){
        // alert(data[0].nama);
        $('#foto_v').attr('src',BASE_URL+'assets/image/'+data[0].foto);
        $('#nama_v1').html(data[0].nama);
        $('#nama_v').html(data[0].nama);
        $('#email_v').html(data[0].email);
        $('#uname_v').html(data[0].uname);
        $('#addrr_v').html(data[0].alamat);
        $('#telp_v').html(data[0].noTelp);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          // alert('Error get data from ajax');
      }
     });
}

function jasa_more(id) {
  $.ajax({
      url:BASE_URL+"admin/Pemesanan/orderjasainfo/"+id,
      type:"GET",
      dataType:"JSON",
      success: function(data){
        // alert(data[0].nama);
        $('#modalorder').html(
          "<table class='table'>" +
          "<tr>" +
            "<td>Kode</td><td>" + data[0].kode + "</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Username</td><td>" + data[0].username + "</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Tanggal</td><td>" + data[0].tanggal + "</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Nama Barang</td><td>" + data[0].namabarang + "</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Jumlah</td><td>"+ data[0].jumlah +"</td>" +
          "</tr>" +
        "</table>"
          );
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          // alert('Error get data from ajax');
      }
     });
}

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
