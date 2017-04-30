<div class="inner-block">
    <div class="cols-grids panel-widget">
    <div class="chute chute-center text-center">
    	<h2>Admin's Profile</h2>
    </div>
    	<div class="row mb40">
    		<div class="chute chute-center text-center">
    		<div class="col-md-4 mb5">
				<div class="demo-grid">
					<code></code>
					<img height=250px width=250px src="http://blog.ramboll.com/fehmarnbelt/wp-content/themes/ramboll2/images/profile-img.jpg"/><br />
					<a href="#generalprofile">General Profile</a><br />
					<a href="#changepassword">Change Password</a><br />
				</div>
			</div>
			</div>
			<div class="col-md-8 mb5">
				<div class="demo-grid">
					<code></code>
                    <a class="hiddenanchor" id="generalprofile"></a>
                    <a class="hiddenanchor" id="changepassword"></a>
                    <a class="hiddenanchor" id="changegeneral"></a>
                    <div id="wrapper">
                        <div id="general" class="animate form">
                        	<form action="#" method="POST">
                            <table>
                            	<tr>
                            		<td>Username</td>
                            		<td><input value="" readonly="readonly"></td>
                            	</tr>
                            	<tr>
                            		<td>Nama</td>
                            		<td>Isian nama Admin</td>
                            	</tr>
                            	<tr>
                            		<td>Ini isi apa</td>
                            		<td>???</td>
                            	</tr>
                            	<tr>
                            		<td>Ini isi apa</td>
                            		<td>???</td>
                            	</tr>
                            	<tr>
                            		<td>Ini isi apa</td>
                            		<td>???</td>
                            	</tr>
                            	<tr>
                            		<td></td>
                            		<td><button><a href="#changegeneral" />Edit Profile</button></td>
                            	</tr>
                            </table>
                            <form>
                        </div>

                        <div id="change" class="animate form">
                            <form action="#" method="POST">
                            <table>
                            	<tr>
                            		<td>Username</td>
                            		<td><input type="text" value="" name="usern" readonly /></td>
                            	</tr>
                            	<tr>
                            		<td>Old Password</td>
                            		<td><input type="password" name="oldpassword"/></td>
                            	</tr>
                            	<tr>
                            		<td>New Password</td>
                            		<td><input type="password" name="newpassword"  /></td>
                            	</tr>
                            	<tr>
                            		<td>Confirm New Password</td>
                            		<td><input type="password" name="confirmpassword"  /></td>
                            	</tr>
                            	<tr>
                            		<td></td>
                            		<td><input type="submit" name="submitchange" value="Submit" /></td>
                            		<td><button><a href="?php echo site_url('admin/Dashboard/profile')?>"></a>Cancel</button></td>
                            	</tr>
                            </table>
                            <form>
                        </div>

                        <div id="ganti" class="animate form">
                        	<form action="#" method="POST">
                            <table>
                            	<tr>
                            		<td>Username</td>
                            		<td><input type="text" value="" name="uname" readonly /></td>
                            	</tr>
                            	<tr>
                            		<td>Nama</td>
                            		<td><input type="text" name="nama" /></td>
                            	</tr>
                            	<tr>
                            		<td>Ini isi apa</td>
                            		<td><input type="text" name="nama" /></td>
                            	</tr>
                            	<tr>
                            		<td>Ini isi apa</td>
                            		<td><input type="text" name="nama" /></td>
                            	</tr>
                            	<tr>
                            		<td>Foto Profil</td>
                            		<td><input type="file" name="image" /></td>
                            	</tr>
                            	<tr>
                            		<td></td>
                            		<td><input type="submit" name="submitedit" value="Submit Edit" /></td>
                            		<td><button><a href="?php echo site_url('admin/Dashboard/profile')?>"></a>Cancel</button></td>
                            	</tr>
                            </table>
                            <form>
                        </div>

                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<!--COPY rights end here-->
</div>