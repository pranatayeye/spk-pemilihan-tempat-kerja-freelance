<section class="p-4 pt-5 my-container bg-light" >
<div class="fontMhs">

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Mhs_home'?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

	<div class="card text-center my-4  text-light" id="homeMhs">
	  <div class="card-body">
	    <h1 class="card-title">Selamat Datang</h1>
	    <p class="card-text">di SPK Freelance, <b><?= $data['namaMhs'][0]['nama_mhs']; ?> !</b></p>
	  </div>
	</div>

	<?php if (!empty($data['pengumuman'])) :?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong><marquee direction="left" scrollamount="5" align="center">
		    	<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-megaphone me-1" viewBox="0 0 16 16">
				  <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
				</svg>
		    	( <?= $data['pengumuman'][0]['cap_waktu'] ?> ). Admin <?= $data['pengumuman'][0]['keterangan'] ?>. Jika ada kendala terkait perubahan ini silakan hubungi +6287861189600. Terimakasih.
			</marquee></strong>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>
		


	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-sm-12">
				<div class="card shadow">
					<div class="content">
						<div class="row">
							<div class="col-sm-5 p-4 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-ui-checks-grid" viewBox="0 0 16 16">
				                    <path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z"/>
				                  </svg>   
							</div>
							<div class="col-sm-7">
								<div class="container my-4">
								<div class="numbers text-center">
									<p class="mb-0">Alternatif</p>
									<h2><?= $data['alternatif']; ?></h2>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-sm-12">
				<div class="card shadow">
					<div class="content">
						<div class="row">
							<div class="col-sm-5 p-4 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
								  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
								</svg>
							</div>
							<div class="col-sm-7">
								<div class="container my-4">
								<div class="numbers text-center">
									<p class="mb-0">Hasil Pemilihan</p>
									<h2>
										<?php if (empty($data['tampilHasil'])) :?>
											Tidak ada
										<?php else: ?>
											<?= $data['tampilHasil'][0]['nama_alternatif']; ?>
										<?php endif; ?>
										
										
									</h2>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			

		</div>
	</div>
    
</div>
</section>


