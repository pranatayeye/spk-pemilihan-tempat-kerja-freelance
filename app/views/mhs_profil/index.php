<section class="p-4 pt-5 my-container bg-light">
<div class="fontMhs">

	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Mhs_home'?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

    <h4 class="mb-3">Edit Profil</h4>

    <div class="row">
    	<div class="col-md-6"> 

    		<!-- flash -->
			<div class="my-3">
		        <?php Flasher::flash();?>
		    </div>  

    		<?php foreach ($data['tampilMhs'] as $mhs) :?>  
				<form action="<?= BASEURL; ?>/Mhs_profil/editMhs/<?= $mhs['nim']; ?>" method="POST">
			        <div class="row"> 
			            <div class="col pb-3">
			              	<div class="form-floating">
			                	<input type="number" class="form-control" name="nim2" id="nim2" placeholder="NIM" value="<?= $mhs['nim']; ?>" readonly>
				                <label>NIM</label>
			              	</div>
			            </div>
			        </div>

			        <div class="row"> 
			            <div class="col pb-3">
			              	<div class="form-floating">
			                	<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama mahasiswa" value="<?= $mhs['nama_mhs']; ?>" required>
	    						<label>Nama mahasiswa</label>
			              	</div>
			            </div>
			        </div>

			        <div class="row"> 
			            <div class="col pb-3">
			              <div class="form-floating">
			                <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" aria-describedby="passwordHelpBlock" value="">
			                <label>Password</label>
			              </div>
			            </div>
			        </div>

			        <div class="row">
			          	<div class="col pb-3">
							<div class="form-floating">
						      	<input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="rePassword" aria-describedby="rePasswordHelpBlock" value="">
				                <label>Ulangi password</label>
						    </div>
			            </div>
			        </div>
			        
				<?php endforeach; ?>
	
			        <div class="row">
			        	<div class="col-md-12 my-3 text-end">
			        		<a class="btn btn-danger tombolEdit" role="button" data-bs-toggle="modal" data-bs-target="#confirmdel">Hapus akun</a>
					   		<a class="btn btn-warning tombolEdit" role="button" data-bs-toggle="modal" data-bs-target="#confirm">Edit sekarang</a>
					   	</div>
					</div>

		<!-- Modal confirm edit-->
		<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered fontMhs">
		    <div class="modal-content">
		      
		      	<div class="text-end p-2">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <div class="container text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-exclamation-circle-fill mb-4" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </div>
		        <h5 class="modal-title text-center" id="exampleModalLabel">Anda yakin ingin melakukan perubahan ?</h5>
		        
		      <div class="modal-body my-2 text-center">
		        <a href="<?= BASEURL . '/Mhs_profil/'.$_SESSION['nim']; ?>" class="btn btn-secondary me-1" data-bs-dismiss="modal">Batal</a>
				<button type="submit" class="btn btn-warning justify-content-end my-2">Ya, Ubah</button>
		      </div>
		    </div>
		  </div>
		</div>

			</form>
		</div>
	</div>

	<!-- Modal confirm del -->
		<div class="modal fade" id="confirmdel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered fontMhs">
		    <div class="modal-content">
		      
		      	<div class="text-end p-2">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <div class="container text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-exclamation-circle-fill mb-4" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </div>
		        <h5 class="modal-title text-center" id="exampleModalLabel">Anda yakin ingin menghapus akun ini ?</h5>
		        
		      <div class="modal-body my-2 text-center">
		        <a href="<?= BASEURL . '/Mhs_profil/'.$_SESSION['nim']; ?>" class="btn btn-secondary me-1" data-bs-dismiss="modal">Batal</a>
				<a class="btn btn-danger" href="<?= BASEURL; ?>/Mhs_profil/hapusMhs/<?= $_SESSION['nim']; ?>" role="button">Ya, Hapus</a>
		      </div>
		    </div>
		  </div>
		</div>


</div>
</section>