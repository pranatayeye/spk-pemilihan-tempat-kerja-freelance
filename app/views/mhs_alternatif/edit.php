<section class="p-4 pt-5 my-container bg-light">
<div class="fontMhs">

	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Mhs_home'?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Mhs_alternatif'?>">Alternatif</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

    <h4 class="mb-3">Edit Alternatif</h4>

    <div class="row">
    	<div class="col-md-6">   
    		
				<form action="<?= BASEURL; ?>/Mhs_alternatif/editAlternatif/<?= $data['tampilAlternatif'][0]['kode_alternatif']; ?>" method="POST">
			        <div class="row"> 
	                    <div class="col pb-3">
	                        <div class="form-floating">
	                            <input type="text" class="form-control" name="kdAlternatif" id="kdAlternatif" placeholder="Kode Alternatif" value="<?= $data['tampilAlternatif'][0]['kode_alternatif']; ?>" readonly>
	                            <label>Kode Alternatif</label>
	                        </div>
	                    </div>
	                </div>

			        <div class="row"> 
                        <div class="col pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="alternatif" id="alternatif" placeholder="alternatif" value="<?= $data['tampilAlternatif'][0]['nama_alternatif'];?>" required>
                                <label>Alternatif</label>
                                <div id="emailHelp" class="form-text">*Contoh: Rumah, ITB STIKOM Bali, Wifi Corner, McDonald's, dll.</div>
                            </div>
                        </div>
                    </div>
		</div>

		<div class="col-md-6"> 
			<?php foreach ($data['tampilAlternatif'] as $kriteria) :?>		
				<!-- butuh value -->
				<?php if (empty( $kriteria['id_rating'])) :?>
					<input type="hidden" class="form-control" name="idRating[]" id="idRating" value="null">
				<?php else: ?>
					<input type="hidden" class="form-control" name="idRating[]" id="idRating" value="<?= $kriteria['id_rating'];?>">
				<?php endif; ?>
				
				<!-- ambil kode kriteria -->
				<input type="hidden" class="form-control" name="kdKriteria[]" id="idRating" value="<?= $kriteria['kode_kriteria'];?>">

                <div class="row">
                    <div class="col pb-3">
                        <div id="emailHelp" class="form-text mb-1"><strong class="key">___</strong> <?= $kriteria['pernyataan']; ?></div>
                        <div class="form">
                          <select class="form-select" id="<?= $kriteria['kode_kriteria']; ?>"  name="kriteria[]" required>
         						
         						<?php if (empty($kriteria['keterangan'])) : ?>
         							<option value="" class="text-secondary" selected readonly>-- Pilih --</option>
     							<?php else: ?>
     								<option value="<?= $kriteria['keterangan']; ?>" class="text-secondary" selected readonly><?= $kriteria['keterangan']; ?></option>
     							<?php endif; ?>
                                
                                
                                <?php foreach ($data['pilBobot'] as $bobot) :?>
                                    <option value="<?= $bobot['id_bobot'] ?>">
                                        <?= $bobot['keterangan']; ?>  
                                    </option>
                                <?php endforeach; ?>

                            </select>
                         
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
			        
				
            <!-- cek ada kriteria baru -->
        	<?php if (!empty($data['kriteriaBaru'])) : ?>
        		<?php foreach ($data['kriteriaBaru'] as $kriteria) :?>	
	        		<input type="hidden" class="form-control" name="idRating[]" id="idRating" value="null">

	        		<input type="hidden" class="form-control" name="kdKriteria[]" id="idRating" value="<?= $kriteria[0]['kode_kriteria'];?>">

	                <div class="row">
	                    <div class="col pb-3">
	                        <div id="emailHelp" class="form-text mb-1"><strong class="key">___</strong>  <?= $kriteria[0]['pernyataan']; ?></div>
	                        <div class="form">
	                          <select class="form-select" id="<?= $kriteria[0]['kode_kriteria']; ?>"  name="kriteria[]" required>
	         						
	         						
	         							<option value="" class="text-secondary" selected readonly>-- Pilih --</option>
	     							
	                                
	                                
	                                <?php foreach ($data['pilBobot'] as $bobot) :?>
	                                    <option value="<?= $bobot['id_bobot'] ?>">
	                                        <?= $bobot['keterangan']; ?>  
	                                    </option>
	                                <?php endforeach; ?>

	                            </select>
	                         
	                        </div>
	                    </div>
	                </div>

	            <?php endforeach; ?>

        	<?php endif; ?>

		
		
		<div class="row">
        	<div class="col-md-12 text-end my-3">
        		<a href="<?= BASEURL . '/Mhs_alternatif'?>" type="button" class="btn btn-secondary me-1 tombolEdit" data-bs-dismiss="modal">Kembali</a>
		   		<a class="btn btn-warning tombolEdit" role="button" data-bs-toggle="modal" data-bs-target="#confirm">Edit sekarang</a>
		   	</div>
		</div>

	</div>

		<!-- Modal confirm -->
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
			        
			      	<div class="modal-body mt-1 mb-3 text-center">
			        	<a href="<?= BASEURL . '/Mhs_alternatif/edit'?>" class="btn btn-secondary me-1" data-bs-dismiss="modal">Batal</a>
						<button type="submit" class="btn btn-warning justify-content-end my-2" >Ya, Ubah</button>
			     	</div>
		    	</div>
		  	</div>
		</div>


		</form>
	</div>

</div>
</section>