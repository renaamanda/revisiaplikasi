<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SISTEM INFORMASI EKSPEDISI PENGIRIMAN BARANG BERBASIS WEB PADA PT DAKOTA CARGO BANJARMASIN</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url();?>/assets/logo4.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url();?>/assets/Atlantis/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/Atlantis/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/Atlantis/assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/Atlantis/assets/css/demo.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
  <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}
?>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="#" class="logo">
					<img src="<?php echo base_url();?>/assets/logo4.png" width="60px" alt="navbar brand" class="navbar-brand">
				</a>
				<span style="color: white; font-size: 12x; font-weight: bold; margin-left: 5px"></span>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
				
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
				
						
					
					
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<?php if(empty($this->session->userdata('foto'))):?>
										<img src="<?php echo base_url();?>/assets/image/profil3.png" alt="..." class="avatar-img rounded-circle">
									<?php else:?>
										<img src="<?php echo base_url();?>/assets/image/<?php echo $this->session->userdata('foto');?>" alt="..." class="avatar-img rounded-circle">
									<?php endif;?>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
												<?php if(empty($this->session->userdata('foto'))):?>
													<img src="<?php echo base_url();?>/assets/image/profil3.png" alt="image profile" class="avatar-img rounded">
												<?php else:?>
													<img src="<?php echo base_url();?>/assets/image/<?php echo $this->session->userdata('foto');?>" alt="image profile" class="avatar-img rounded">
												<?php endif;?>
											</div>
											<div class="u-text">
												<h4><?php echo $this->session->userdata('nama_lengkap');?></h4>
												<p class="text-muted"><?php echo $this->session->userdata('email');?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url();?>login/logout">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>