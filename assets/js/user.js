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
     $.ajax({
      url:BASE_URL+"Home_dashboard/get_specific_order/"+id,
      type:"GET",
      dataType:"JSON",
      success: function(data){

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          // alert('Error get data from ajax');
      }
     });
}