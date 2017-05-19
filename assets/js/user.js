$('#cp').click(function(){
		$('#ch').css('display','block');
		$('#gen').css('display','none');
		$('#gan').css('display','none');
		$('#or').css('display','none');
	});

$('#gp').click(function(){
		$('#ch').css('display','none');
		$('#gen').css('display','block');
		$('#gan').css('display','none');
		$('#or').css('display','none');
	});
$('#gp1').click(function(){
		$('#ch').css('display','none');
		$('#gen').css('display','block');
		$('#gan').css('display','none');
		$('#or').css('display','none');
	});


$('#do').click(function(){
		$('#ch').css('display','none');
		$('#gen').css('display','none');
		$('#gan').css('display','none');
		$('#or').css('display','block');
	});

$('#cpro').click(function(){
		$('#ch').css('display','none');
		$('#gen').css('display','none');
		$('#gan').css('display','block');
		$('#or').css('display','none');
	});

function detil_order(id){  
 $('.bsm1').remove();

     $.ajax({
      url:BASE_URL+"Home_dashboard/get_specific_order/"+id,
      type:"GET",
      dataType:"JSON",
      success: function(data){
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
      		console.log(barang);
      		$('#ket_barang').append('<tr class="bsm1">'+
                            '<td>'+barang['kuantitas']+'</td>'+
                            '<td>'+barang['judul']+'</td>'+
                            '<td>'+barang['deskripsi']+'</td>'+
                            '<td class="num1">'+toNum(barang['harga'])+'</td>'+
                            '<td class="num2">'+toNum((barang['kuantitas']*barang['harga']))+'</td></tr>');
      	}
      	
      	$('#foot_order').html(toNum(data.total));
      	$('#foot_order2').html(toNum(data.ongkir));
      	$('#foot_order1').html(toNum(data.subtotal));
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          // alert('Error get data from ajax');
      }
     });
}

function jasa_more(id) {
  $.ajax({
      url:BASE_URL+"Home_dashboard/getSpecJasa/"+id,
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

function toNum(number){
	return number.toString().replace(/(\d)(?=(\d{3})+$)/g, "$1,");
}