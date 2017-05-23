<!--copy rights start here-->
<div class="copyrights">

</div>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="<?php echo site_url('admin/Dashboard')?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		        <li id="menu-comunicacao" ><a href="#"><i class="fa fa fa-shopping-cart"></i><span>Atur toko</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >
		            <li id="menu-mensagens" style="width: 120px" ><a href="<?php echo base_url();?>admin/Product/add">Tambah barang</a>		              
		            </li>
		            <li id="menu-arquivos" ><a href="<?php echo base_url();?>admin/Product">Daftar barang</a></li>
		            <li id="menu-mensagens" style="width: 120px" ><a href="<?php echo base_url();?>admin/Product/category">Kategori barang</a>	

		          </ul>
		        </li>

		          <li><a href="#"><i class="fa fa-list"></i><span>Pemesanan</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url();?>admin/Pemesanan/Ready">Ready Stock</a></li>
			            <li id="menu-academico-boletim" ><a href="<?php echo base_url();?>admin/Pemesanan/Jasa">Pre Order</a></li>
		             </ul>
		          </li>

                <li><a href="<?php echo base_url()?>admin/User"><i class="fa fa-user"></i><span>User</span></a></li>
		        
		         <li><a href="#"><i class="fa fa-cog"></i><span>Systems</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	 <ul id="menu-academico-sub" >
                        <li><a href="<?php echo base_url()?>admin/Galleri">Galeries</a></li>
			            <li id="menu-academico-avaliacoes" ><a href="<?php echo site_url('admin/Dashboard/profile')?>">Profile</a></li>
			            <li id="menu-academico-boletim" ><a href="<?php echo site_url('admin/Dashboard/setting')?>">Settings</a></li>
		             </ul>
		         </li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<!--js-->
<script type="text/javascript">
var BASE_URL = "<?php echo base_url(); ?>";	
</script>

<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url()?>assets/js/dataTables.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.twbsPagination.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<script src="<?php echo base_url()?>assets/js/script.js"></script> 
<script src="<?php echo base_url()?>assets/js/uploadImage.js"></script> 

<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->

<!-- mother grid end here-->
<!--static chart-->
<script src="<?php echo base_url()?>assets/js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="<?php echo base_url()?>assets/js/chartinator.js" ></script>


<!--geo chart-->

<!--skycons-icons-->
<script src="<?php echo base_url()?>assets/js/skycons.js"></script>
<!--//skycons-icons-->
</body>
</html>   