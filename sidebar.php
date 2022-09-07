
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
												<?php if(empty($this->session->userdata('foto'))):?>
													<img src="<?php echo base_url();?>/assets/image/profil3.png" alt="image profile" class="avatar-img rounded-circle">
												<?php else:?>
													<img src="<?php echo base_url();?>/assets/image/<?php echo $this->session->userdata('foto');?>" alt="image profile" class="avatar-img rounded-circle">
												<?php endif;?>
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $this->session->userdata('nama_lengkap');?>
									<span class="user-level"><?php echo $this->session->userdata('level');?></span>
									<!--<span class="user-level"><?php echo $this->session->userdata('level');?></span>-->
								</span>
							</a>
							<div class="clearfix"></div>

						
						</div>
					</div>


					<ul class="nav nav-primary">


						<li class="nav-item <?php if($sidebar=="dashboard"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>dashboard">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>


						
				<?php if($this->session->userdata('level')!="customer"):?>
				<?php if($this->session->userdata('level')!="kurir"):?>

						<li class="nav-item 
						<?php if($sidebar=="pengguna"): ?>active<?php endif;?>
						<?php if($sidebar=="pegawai"): ?>active<?php endif;?>
						<?php if($sidebar=="kurir"): ?>active<?php endif;?>
						<?php if($sidebar=="cabang"): ?>active<?php endif;?>
						<?php if($sidebar=="customer"): ?>active<?php endif;?>
						<?php if($sidebar=="truk"): ?>active<?php endif;?>
						<?php if($sidebar=="wilayah"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts">
								<i class="fas fa-server"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="pengguna"): ?>show<?php endif;?>
						<?php if($sidebar=="pegawai"): ?>show<?php endif;?>
						<?php if($sidebar=="kurir"): ?>show<?php endif;?>
						<?php if($sidebar=="cabang"): ?>show<?php endif;?>
						<?php if($sidebar=="customer"): ?>show<?php endif;?>
						<?php if($sidebar=="truk"): ?>show<?php endif;?>
						<?php if($sidebar=="wilayah"): ?>show<?php endif;?>
							" id="charts">
								<ul class="nav nav-collapse">
									<?php if($this->session->userdata('level')!="Pimpinan"):?>
									<li class="<?php if($sidebar=="pengguna"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pengguna">
											<span class="sub-item">Pengguna</span>
										</a>
									</li>
									<?php endif;?>
									<li class="<?php if($sidebar=="pegawai"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pegawai">
											<span class="sub-item">Pegawai</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="kurir"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>kurir">
											<span class="sub-item">Kurir</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="cabang"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>cabang">
											<span class="sub-item">Cabang</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="customer"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>customer">
											<span class="sub-item">Customer</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="truk"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>truk">
											<span class="sub-item">Truk</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="wilayah"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>wilayah">
											<span class="sub-item">Wilayah</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						
						<li class="nav-item 
						<?php if($sidebar=="barang_masuk"): ?>active<?php endif;?>
						<?php if($sidebar=="tanda_terima"): ?>active<?php endif;?>
						<?php if($sidebar=="surat_jalan"): ?>active<?php endif;?>
						<?php if($sidebar=="pengiriman"): ?>active<?php endif;?>
						<?php if($sidebar=="tracking"): ?>active<?php endif;?>
						<?php if($sidebar=="pengeluaran"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts2">
								<i class="fas fa-database"></i>
								<p>Transaksi Data</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="barang_masuk"): ?>show<?php endif;?>
						<?php if($sidebar=="tanda_terima"): ?>show<?php endif;?>
						<?php if($sidebar=="surat_jalan"): ?>show<?php endif;?>
						<?php if($sidebar=="pengiriman"): ?>show<?php endif;?>
						<?php if($sidebar=="tracking"): ?>show<?php endif;?>
						<?php if($sidebar=="pengeluaran"): ?>show<?php endif;?>
							" id="charts2">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="barang_masuk"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>barang_masuk">
											<span class="sub-item">Barang Masuk</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="tanda_terima"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>tanda_terima">
											<span class="sub-item">Tanda Terima</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="surat_jalan"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>surat_jalan">
											<span class="sub-item">Surat Jalan</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="tracking"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>tracking">
											<span class="sub-item">Tracking</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pengiriman"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>pengiriman">
											<span class="sub-item">Pengiriman</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pengeluaran"): ?>active<?php endif;?>">
										<a  href="<?php echo base_url();?>pengeluaran">
											<span class="sub-item">Pengeluaran</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					
						<li class="nav-item 
						<?php if($sidebar=="barang_masuk2"): ?>active<?php endif;?>
						<?php if($sidebar=="tanda_terima2"): ?>active<?php endif;?>
						<?php if($sidebar=="surat_jalan2"): ?>active<?php endif;?>
						<?php if($sidebar=="pengiriman2"): ?>active<?php endif;?>
						<?php if($sidebar=="tracking2"): ?>active<?php endif;?>
						<?php if($sidebar=="pengeluaran2"): ?>active<?php endif;?>
						<?php if($sidebar=="laba_rugi2"): ?>active<?php endif;?>
						<?php if($sidebar=="pemasukan2"): ?>active<?php endif;?>
						<?php if($sidebar=="kurir3"): ?>active<?php endif;?>
						">
							<a data-toggle="collapse" href="#charts3">
								<i class="fas fa-print"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse 
						<?php if($sidebar=="barang_masuk2"): ?>show<?php endif;?>
						<?php if($sidebar=="tanda_terima2"): ?>show<?php endif;?>
						<?php if($sidebar=="surat_jalan2"): ?>show<?php endif;?>
						<?php if($sidebar=="pengiriman2"): ?>show<?php endif;?>
						<?php if($sidebar=="tracking2"): ?>show<?php endif;?>
						<?php if($sidebar=="pengeluaran2"): ?>show<?php endif;?>
						<?php if($sidebar=="laba_rugi2"): ?>show<?php endif;?>
						<?php if($sidebar=="pemasukan2"): ?>show<?php endif;?>
						<?php if($sidebar=="kurir3"): ?>show<?php endif;?>
							" id="charts3">
								<ul class="nav nav-collapse">
									<li class="<?php if($sidebar=="barang_masuk2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>barang_masuk/lihat">
											<span class="sub-item">Barang Masuk</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="tanda_terima2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>tanda_terima/lihat">
											<span class="sub-item">Tanda Terima</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="surat_jalan2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>surat_jalan/lihat">
											<span class="sub-item">Surat Jalan</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="tracking2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>tracking/lihat">
											<span class="sub-item">Tracking</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pengiriman2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pengiriman/lihat">
											<span class="sub-item">Pengiriman</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pengeluaran2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pengeluaran/lihat">
											<span class="sub-item">Pengeluaran</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="laba_rugi2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>laba_rugi/halaman_print">
											<span class="sub-item">Laba Rugi</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="pemasukan2"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>pemasukan/halaman_print">
											<span class="sub-item">Grafik Pemasukan</span>
										</a>
									</li>
									<li class="<?php if($sidebar=="kurir3"): ?>active<?php endif;?>">
										<a href="<?php echo base_url();?>kurir/lihat2">
											<span class="sub-item">Kurir Terbanyak Mengirim Paket</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

					<?php else:?>

						<li class="nav-item <?php if($sidebar=="surat_jalan"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>surat_jalan">
								<i class="fas fa-envelope"></i>
								<p>Surat Jalan</p>
							</a>
						</li>

						<li class="nav-item <?php if($sidebar=="tracking"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>tracking">
								<i class="fas fa-eye"></i>
								<p>Tracking</p>
							</a>
						</li>

						<li class="nav-item <?php if($sidebar=="pengiriman"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>pengiriman">
								<i class="fas fa-share"></i>
								<p>Pengiriman</p>
							</a>
						</li>

				<?php endif;?>



				<?php else:?>




					<li class="nav-item <?php if($sidebar=="tracking"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>tracking">
								<i class="fas fa-eye"></i>
								<p>Tracking</p>
							</a>
						</li>

						<li class="nav-item <?php if($sidebar=="pengiriman"): ?>active<?php endif;?>">
							<a href="<?php echo base_url();?>pengiriman">
								<i class="fas fa-share"></i>
								<p>Pengiriman</p>
							</a>
						</li>


					<?php endif;?>



					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->