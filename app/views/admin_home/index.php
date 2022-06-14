<section class="p-4 pt-5 my-container bg-light">
<div class="fontAdmin">
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_home'?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

	<div class="card text-center my-4  text-light" id="homeAdmin">
	  <div class="card-body">
	    <h1 class="card-title">Selamat Datang</h1>
	    <p class="card-text">di SPK Freelance, Admin <b><?= $data['namaAdmin'][0]['nama_admin']; ?> !</b></p>
	  </div>
	</div>
	    
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="card shadow mb-3">
					<div class="content">
						<div class="row">
							<div class="col-sm-5 p-4 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bullseye me-1" viewBox="0 0 16 16">
				                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                    <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
				                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
				                    <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
			                    </svg>
							</div>
							<div class="col-sm-7">
								<div class="container my-4">
								<div class="numbers text-center">
									<p class="mb-0">Kriteria</p>
									<h2><?= $data['kriteria'];?></h2>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6">
				<div class="card shadow">
					<div class="content">
						<div class="row">
							<div class="col-sm-5 p-4 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-speedometer2 me-1" viewBox="0 0 16 16">
				                    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
				                    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
				                </svg>
							</div>
							<div class="col-sm-7">
								<div class="container my-4">
								<div class="numbers text-center">
									<p class="mb-0">Nilai Bobot</p>
									<h2><?= $data['bobot'];?></h2>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6">
				<div class="card shadow">
					<div class="content">
						<div class="row">
							<div class="col-sm-5 p-4 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill me-1" viewBox="0 0 16 16">
				                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
				                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
				                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
				                </svg>
							</div>
							<div class="col-sm-7">
								<div class="container my-4">
								<div class="numbers text-center">
									<p class="mb-0">Mahasiswa</p>
									<h2><?= $data['mhs'];?></h2>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6">
				<div class="card shadow mb-4">
					<div class="content">
						<div class="row">
							<div class="col-sm-5 p-4 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-badge me-1" viewBox="0 0 16 16">
			                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
			                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
		                    </svg>
							</div>
							<div class="col-sm-7">
								<div class="container my-4">
								<div class="numbers text-center">
									<p class="mb-0">Admin</p>
									<h2><?= $data['admin'];?></h2>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6">
				<div class="card shadow">
					<div class="content">
						<div class="row">
							<div class="col-sm-5 p-4 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-journal me-1" viewBox="0 0 16 16">
				                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
				                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
				                  </svg>
							</div>
							
							<div class="col-sm-7">
								<div class="container my-4">
								<div class="numbers text-center">
									<p class="mb-0">Log Aktivitas</p>
									<h2><?= $data['log'];?></h2>
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


