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


    <script type='text/javascript'>
      google.charts.load('current', {'packages':['geochart']});
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Region',   'Jumlah User'],
            ['Jakarta', <?php echo $this->db->where('prop','DKI JAKARTA')->count_all_results('profile') ?> ],
            ['East Java', <?php echo $this->db->where('prop','JAWA TIMUR')->count_all_results('profile') ?> ],
            ['West Java', <?php echo $this->db->where('prop','JAWA BARAT')->count_all_results('profile') ?>],
            ['Yogyakarta', <?php echo $this->db->where('prop','DI YOGYAKARTA')->count_all_results('profile') ?>],
            ['Central Java', <?php echo $this->db->where('prop','JAWA TENGAH')->count_all_results('profile') ?>],
            ['North Sumatra', <?php echo $this->db->where('prop','SUMATERA UTARA')->count_all_results('profile') ?>],
            ['Banten', <?php echo $this->db->where('prop','BANTEN')->count_all_results('profile') ?>],
            ['South Sumatra', <?php echo $this->db->where('prop','SUMATERA SELATAN')->count_all_results('profile') ?>],
            ['Riau', <?php echo $this->db->where('prop','RIAU')->count_all_results('profile') ?>],
            ['Bali', <?php echo $this->db->where('prop','BALI')->count_all_results('profile') ?>],
            ['South Sulawesi', <?php echo $this->db->where('prop','SULAWESI SELATAN')->count_all_results('profile') ?>],
            ['Lampung', <?php echo $this->db->where('prop','LAMPUNG')->count_all_results('profile') ?>],
            ['West Sumatra', <?php echo $this->db->where('prop','SUMATERA BARAT')->count_all_results('profile') ?>],
            ['East Kalimantan', <?php echo $this->db->where('prop','KALIMANTAN TIMUR')->count_all_results('profile') ?>],
            ['Central Sulawesi', <?php echo $this->db->where('prop','SULAWESI TENGAH')->count_all_results('profile') ?>],
            ['West Kalimantan', <?php echo $this->db->where('prop','KALIMANTAN BARAT')->count_all_results('profile') ?>],
            ['Riau Islands', <?php echo $this->db->where('prop','KEPULAUAN RIAU')->count_all_results('profile') ?>],
            ['South Kalimantan', <?php echo $this->db->where('prop','KALIMANTAN SELATAN')->count_all_results('profile') ?>],
            ['North Sulawesi', <?php echo $this->db->where('prop','SULAWESI UTARA')->count_all_results('profile') ?>],
            ['West Nusa Tenggara', <?php echo $this->db->where('prop','NUSA TENGGARA BARAT')->count_all_results('profile') ?>],
            ['East Nusa Tenggara', <?php echo $this->db->where('prop','NUSA TENGGARA TIMUR')->count_all_results('profile') ?>],
            ['Papua', <?php echo $this->db->where('prop','PAPUA')->count_all_results('profile') ?>],
            ['Central Kalimantan', <?php echo $this->db->where('prop','KALIMANTAN TENGAH')->count_all_results('profile') ?>],
            ['Aceh', <?php echo $this->db->where('prop','ACEH')->count_all_results('profile') ?>],
            ['Bengkulu', <?php echo $this->db->where('prop','BENGKULU')->count_all_results('profile') ?>],
            ['Jambi', <?php echo $this->db->where('prop','JAMBI')->count_all_results('profile') ?>],
            ['Maluku', <?php echo $this->db->where('prop','MALUKU')->count_all_results('profile') ?>],
            ['Gorontalo', <?php echo $this->db->where('prop','GORONTALO')->count_all_results('profile') ?>],
            ['South East Sulawesi', <?php echo $this->db->where('prop','SULAWESI TENGGARA')->count_all_results('profile') ?>],
            ['North Maluku', <?php echo $this->db->where('prop','MALUKU UTARA')->count_all_results('profile') ?>],
            ['Bangka Belitung Islands', <?php echo $this->db->where('prop','KEPULAUAN BANGKA BELITUNG')->count_all_results('profile') ?>],
            ['West Papua', <?php echo $this->db->where('prop','PAPUA BARAT')->count_all_results('profile') ?>]
      ]);

        var options = {
        region: 'ID',
        displayMode: 'markers',
        colorAxis: {colors: ['green', 'blue']}
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="<?php echo base_url()?>assets/js/skycons.js"></script>
<!--//skycons-icons-->
</body>
</html>   