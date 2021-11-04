<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                <img src="<?= base_url() ?>template/assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="<?= base_url() ?>"><i class="fa fa-globe"></i> Home</a>
                    </li>
                    <li>
                        <a  href="<?= base_url('sekolah') ?>"><i class="fa fa-building"></i> Data Sekolah</a>
                    </li>
                    <li>
                        <a  href="<?= base_url('home/geojson') ?>"><i class="fa fa-map-marker"></i>Peta Zonasi</a>
                    </li>

                    <?php if($this->session->userdata('username')<>''){?>

                    <li>
                        <a  href="<?= base_url('sekolah/input') ?>"><i class="fa fa-plus"></i>Input Data Sekolah</a>
                    </li>
                    <li>
                        <a  href="<?= base_url('admin') ?>"><i class="fa fa-users"></i> Admin</a>
                    </li>
                    <li>
                        <a  href="<?= base_url('admin/input') ?>"><i class="fa fa-plus"></i>Input Data Admin</a>
                    </li>
                    
                                        
						<?php } ?>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2><?= $title ?></h2>    
                        
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />