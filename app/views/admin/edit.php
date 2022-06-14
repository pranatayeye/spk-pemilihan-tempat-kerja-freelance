<section class="p-4 pt-5 my-container bg-light">
<div class="fontAdmin">

	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_home'?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin'?>">Admin</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

    <h4 class="mb-3">Edit Admin</h4>

    <div class="row">
    	<div class="col-md-6">   
    		<?php foreach ($data['tampilAdmin'] as $admin) :?>  
				<form action="<?= BASEURL; ?>/Admin/editAdmin" method="POST">
			        <div class="row"> 
			            <div class="col pb-3">
			              	<div class="form-floating">
			                	<input type="text" class="form-control" name="idAdmin" id="idAdmin" placeholder="ID Admin" value="<?= $admin['id_admin'] ?>" readonly>
        						<label>ID Admin</label>
			              	</div>
			            </div>
			        </div>

			        <div class="row"> 
			            <div class="col pb-3">
			              	<div class="form-floating">
			                	<input type="text" class="form-control" name="namaAdmin" id="namaAdmin" placeholder="Nama Admin" value="<?= $admin['nama_admin'] ?>" required>
				                <label>Nama Admin</label>
			              	</div>
			            </div>
			        </div>

			        <div class="row"> 
			            <div class="col pb-3">
			              <div class="form-floating">
			                <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-describedby="passwordHelpBlock" value="" >
			                <label>Password</label>
			                <div id="emailHelp" class="form-text">Default password: 12345</div>
			              </div>
			            </div>
			        </div>

			        <div class="row">
			          	<div class="col pb-3">
							<div class="form-floating">
						      	<input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="rePassword" aria-describedby="rePasswordHelpBlock" value="" >
				                <label>Ulangi password</label>
				                <div id="emailHelp" class="form-text">Default password: 12345</div>
						    </div>
			            </div>
			        </div>
	
		</div>
		<div class="col-md-6"> 
					<div class="row"> 
			            <div class="col pb-3">
			              	<div class="form-floating">
			                	<input type="number" class="form-control" name="telp" id="telp" placeholder="Telp." value="<?= $admin['no_telp'] ?>" required>
				                <label>Telp.</label>
			              	</div>
			            </div>
			        </div>

			        <div class="row"> 
			            <div class="col pb-3">
			              	<div class="form-floating">
			                	<input type="email" class="form-control" name="email" id="email" value="<?= $admin['email'] ?>" placeholder="Email" required>
				                <label>Email</label>
			              	</div>
			            </div>
			        </div>

			        <div class="row"> 
			            <div class="col pb-3">
			              	<div class="form-floating">
			                	<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= $admin['alamat'] ?>" required>
				                <label>Alamat</label>
			              	</div>
			            </div>
			        </div>
			        
				<?php endforeach; ?>

		
		
			<div class="row">
	        	<div class="col-md-12 text-end my-3">
	        		<a href="<?= BASEURL . '/Admin'?>" type="button" class="btn btn-secondary me-1 tombolEdit" data-bs-dismiss="modal">Kembali</a>
			   		<a class="btn btn-warning tombolEdit" role="button" data-bs-toggle="modal" data-bs-target="#confirm">Edit sekarang</a>
			   	</div>
			</div>
		</div>

		<!-- Modal confirm -->
		<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered fontAdmin">
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
		        <a href="<?= BASEURL . '/Admin/edit'?>" class="btn btn-secondary me-1" data-bs-dismiss="modal">Batal</a>
				<button type="submit" class="btn btn-warning justify-content-end my-2" >Ya, Ubah</button>
		      </div>
		    </div>
		  </div>
		</div>

		</form>
	</div>

</div>
</section>