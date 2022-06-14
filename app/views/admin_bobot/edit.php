<section class="p-4 pt-5 my-container bg-light">
<div class="fontAdmin">

	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_home'?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_bobot'?>">Nilai Bobot</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

	
		
    <h4 class="mb-3">Edit Nilai Bobot</h4>

    <div class="row">
		<div class="col-md-6">   
    		<?php foreach ($data['tampilBobot'] as $bobot) :?>
    			<form action="<?= BASEURL; ?>/Admin_bobot/editBobot/<?= $bobot['id_bobot']; ?>" method="POST">  

			        <div class="row"> 
			            <div class="col pb-3">
			              	<div class="form-floating">
			                	<input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="keterangan" value="<?= $bobot['keterangan']; ?>" required>
			                	<label>Keterangan</label>
			                	<div id="emailHelp" class="form-text">*Contoh: Sangat Baik, Baik, Cukup, Kurang, Sangat Kurang.</div>
			              	</div>
			            </div>
			        </div>

			        <div class="row"> 
			            <div class="col pb-3">
			              <div class="form-floating">
			                <input type="number" class="form-control" name="bobot" id="bobot" placeholder="Bobot" value="<?= $bobot['bobot']; ?>" required>
			                <label>Nilai Bobot</label>
			              </div>
			            </div>
			        </div>
		        
			<?php endforeach; ?>

	        <div class="row">
	        	<div class="col-md-12 text-end my-3">
	        		<a href="<?= BASEURL . '/Admin_bobot'?>" type="button" class="btn btn-secondary me-1 tombolEdit" data-bs-dismiss="modal">Kembali</a>
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
			        <a href="<?= BASEURL . '/Admin_bobot/edit'?>" class="btn btn-secondary me-1" data-bs-dismiss="modal">Batal</a>
					<button type="submit" class="btn btn-warning justify-content-end my-2" >Ya, Ubah</button>
			      </div>
			    </div>
			  </div>
			</div>

		</div>
	</div>
			</form>

</div>
</section>