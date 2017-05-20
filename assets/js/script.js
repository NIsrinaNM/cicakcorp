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
        if(data[0].verify === '1') {
          status = 'Sudah Terverifikasi';
        } else {
          status = 'Belum Terverifikasi';
        }
        $('#foto_v').attr('src',BASE_URL+data[0].foto);
        $('#nama_v1').html(data[0].nama);
        $('#nama_v').html(data[0].nama);
        $('#email_v').html(data[0].email);
        $('#uname_v').html(data[0].uname);
        $('#addrr_v').html(data[0].alamat);
        $('#telp_v').html(data[0].noTelp);
        $('#verif_v').html(status);
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
            "<td>Kode Booking</td><td>" + data[0].kode + "</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Username</td><td>" + data[0].username + "</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Order</td><td>" + data[0].tanggal + "</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Nama Barang</td><td>" + data[0].namabarang + " buah" + "</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Jumlah</td><td>" + data[0].jumlah + " buah" + "</td>" +
          "</tr>" + 
          "<tr>" +
            "<td>Deskripsi</td><td>"+ data[0].deskripsi +"</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Desain</td><td>"+ data[0].desain +"</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Pemesan</td><td>"+ data[0].nama +"</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Alamat Pemesan</td><td>"+ data[0].alamat +"</td>" +
          "</tr>" +
          "<tr>" +
            "<td>No Telepon</td><td>"+ data[0].notelp +"</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Pengiriman</td><td>"+ data[0].metod +"</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Harga</td><td>"+ data[0].total +"</td>" +
          "</tr>" +
          "<tr>" +
            "<td>Status</td><td>"+ data[0].statusorder +"</td>" +
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

function barang_more(id) {
  $.ajax({
      url:BASE_URL+"admin/Pemesanan/orderbaranginfo/"+id,
      type:"GET",
      dataType:"JSON",
      success: function(data){
        // alert(data.kode);
        $('#ket_atas').html('<table>'+
                '<tr>'+
                    '<td>Kode</td>'+
                    '<td>'+data.kode+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Tanggal</td>'+
                    '<td>'+data.tanggal+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Alamat Pengiriman</td>'+
                    '<td>'+data.alamat+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Metode</td>'+
                    '<td>'+data.metode+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Status</td>'+
                    '<td>'+data.status+'</td>'+
                '</tr>'+
            '</table>');
        var dat = data.barang;
     
        for(var i in dat){
          var barang = dat[i];
          // console.log(barang);
          $('#ket_barang').append('<tr class="bsm1">'+
                            '<td>'+barang['kuantitas']+'</td>'+
                            '<td>'+barang['judul']+'</td>'+
                            '<td>'+barang['deskripsi']+'</td>'+
                            '<td class="num1">'+toNum(barang['harga'])+'</td>'+
                            '<td class="num2">'+toNum((barang['kuantitas']*barang['harga']))+'</td></tr>');
        }
                
        $('#foot_order').html(toNum(data.total));
        $('#foot_order1').html(toNum(data.ongkir));
        $('#foot_order2').html(toNum(data.subtotal));
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          // alert('Error get data from ajax');
      }
     });
}

function toNum(number){
  return number.toString().replace(/(\d)(?=(\d{3})+$)/g, "$1,");
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

function ubah_read1() {
  $('.dd-rs').remove();
    $.ajax({
      url: BASE_URL+'admin/Pemesanan/statusread1',
      type: "POST",
      processData:false,
      success: function(data){
        $('#span-rs').remove();
        var dat = JSON.parse(data);
        for(var i in dat ){
          var notif = dat[i];
          if (notif['read']=="1") {
            var a = "style='background-color: #AAF0E4'";
          }else{ var a= "";}
          // console.log(notif);
        
        $('<li class="dd-rs" '+a+'><a href="#">'+
                         '<div class="notification_desc">'+
                        '<p>Kode Order '+notif['kode_order']+'</p>'+
                        '<p><span>'+timeSince(new Date(notif['date'])) +' ago</span></p>'+
                        '</div>'+
                        '<div class="clearfix"></div>  '+
                       '</a>'+
                       '</li>').insertBefore('#ddn-rs');
        }
      },
      error: function(){}           
    });
 }

 function ubah_read2() {
  $('.dd-rs').remove();
    $.ajax({
      url: BASE_URL+'admin/Pemesanan/statusread2',
      type: "POST",
      processData:false,
      success: function(data){
        $('#span-rs1').remove();
        var dat = JSON.parse(data);
        for(var i in dat ){
          var notif = dat[i];
          if (notif['read']=="1") {
            var a = "style='background-color: #AAF0E4'";
          }else{ var a= "";}
          // console.log(notif);
        
        $('<li class="dd-rs" '+a+'><a href="#">'+
                         '<div class="notification_desc">'+
                        '<p>Kode Order '+notif['kode']+'</p>'+
                        '<p><span>'+timeSince(new Date(notif['tanggal'])) +' ago</span></p>'+
                        '</div>'+
                        '<div class="clearfix"></div>  '+
                       '</a>'+
                       '</li>').insertBefore('#ddn-rs1');
        }
      },
      error: function(){}           
    });
 }

function timeSince(date) {

  var seconds = Math.floor((new Date() - date) / 1000);

  var interval = Math.floor(seconds / 31536000);

  if (interval > 1) {
    return interval + " years";
  }
  interval = Math.floor(seconds / 2592000);
  if (interval > 1) {
    return interval + " months";
  }
  interval = Math.floor(seconds / 86400);
  if (interval > 1) {
    return interval + " days";
  }
  interval = Math.floor(seconds / 3600);
  if (interval > 1) {
    return interval + " hours";
  }
  interval = Math.floor(seconds / 60);
  if (interval > 1) {
    return interval + " minutes";
  }
  return Math.floor(seconds) + " seconds";
}