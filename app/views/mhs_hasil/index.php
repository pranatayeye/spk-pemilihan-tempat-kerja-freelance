<section class="p-4 pt-5 my-container bg-light">
<div class="fontMhs">
    
      <!-- breadcrumb -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="<?= BASEURL . '/Mhs_home'?>">Home</a></li>
           <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
        </ol>
    </nav>

    <div class="row mb-2">
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilihAlternatif">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Pilih Alternatif
            </button>

            <?php if (empty($data['tampilHasil'])) :?>
	            <a href="<?= BASEURL . '/Mhs_cetak'?>" target="_BLANK" type="button" class="btn btn-primary disabled">
	                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
					  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
					  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
					</svg>
	                Cetak
	            </a>
	        <?php else: ?>
	        	<a href="<?= BASEURL . '/Mhs_cetak'?>" target="_BLANK" type="button" class="btn btn-primary">
	                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
					  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
					  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
					</svg>
	                Cetak
	            </a>
	        <?php endif; ?>
        </div>
    </div>

    <!-- flash -->
    <div class="my-3">
        <?php Flasher::flash();?>
    </div>

    <div class="row">
    	<?php if (empty($data['tampilHasil'])) :?>
    		<div class="col-md-12 mt-3">
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Tidak ada data</strong> silahkan Pilih Alternatif terlebih dahulu.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>

		<?php else: ?>

    	<div class="col-md-1" id="win">
    		<div class="container text-center">
	    		<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#E8BA05" class="bi bi-trophy-fill my-4" viewBox="0 0 16 16">
				  <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
				</svg>
			</div>
    	</div>

    	<div class="col-md-11">
	    	<p class="my-4">
				<?= $data['tampilHasil'][0]['kode_alternatif']; ?> memiliki nilai
				terbesar dibandingkan dengan yang lainnya sebesar <?=$data['hasilRangking'][0]['nilai'] ?>. 
				<br>
				Dengan demikian <?= $data['tampilHasil'][0]['kode_alternatif']; ?> <b>"<?= $data['tampilHasil'][0]['nama_alternatif']; ?>"</b>
				adalah alternatif yang terpilih sebagai alternatif terbaik.
			</p>
		</div>

		<!-- grafik -->
		<label class="text-secondary mt-3 mb-1">*Berikut adalah visualisasi data dari tiga alternatif teratas :</label>
		<canvas id="myChart" style="width: 400; height: 400"></canvas>

		<?php endif; ?>
    </div>
    

	<div class="accordion mt-3 mb-3" id="accordionFlushExample">
	  	<div class="accordion-item">
	  		<h2 class="accordion-header" id="flush-headingOne">
	      		<button class="accordion-button collapsed text-start fontMhs" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
			        Lihat Detail Perhitungan SAW
			    </button>
		    </h2>

		    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
		      	<div class="accordion-body">

		      		<!-- tabel alternatif -->
				    <div class="row">
						<div class="col-md-6">
							<div class="table-responsive">
								<table class="table  table-bordered table-hover caption-top text-center">
								<caption>Tabel Alternatif</caption>
								  <thead class="bgMhs">
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Kode Alternatif</th>
								      <th scope="col">Alternatif</th>
								    </tr>
								  </thead>
								  <tbody class="fontMhs">
								  	<?php $no = 1; ?>
									  	<?php foreach ($data['tampilAlternatifPil'] as $alternatif) :?>
									  		<tr>
										  		<th scope="row"><?= $no++; ?></th>
										  		<td><?= $alternatif['kode_alternatif'] ;?></td>
										  		<td><?= $alternatif['nama_alternatif'] ;?></td>
									  		</tr>
									  	<?php endforeach; ?>
								  </tbody>
								</table>

								<?php if (empty($data['tampilAlternatifPil'])) : ?>
							  		<div class="alert alert-warning alert-dismissible fade show" role="alert">
									  <strong>Tidak ada data</strong> silahkan Pilih Alternatif terlebih dahulu.
									  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
							  	<?php endif; ?>

							</div>
						</div>

						<!-- tabel kriteria -->
						<div class="col-md-6">
							<div class="table-responsive">
								<table class="table  table-bordered table-hover caption-top text-center">
								<caption>Tabel Kriteria</caption>
								  <thead class="bgMhs">
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Kode Kriteria</th>
								      <th scope="col">Kriteria</th>
								      <th scope="col">Bobot</th>
								    </tr>
								  </thead>
								  <tbody class="fontMhs">
								  	<?php $no = 1; ?>
									  	<?php foreach ($data['pilKriteria'] as $kriteria) :?>
									  		<tr>
										  		<th scope="row"><?= $no++; ?></th>
										  		<td><?= $kriteria['kode_kriteria'] ;?></td>
										  		<td><?= $kriteria['nama_kriteria'] ;?></td>
										  		<td><?= $kriteria['bobot_kriteria'] ;?></td>
									  		</tr>
									  	<?php endforeach; ?>
								  </tbody>
								</table>

								<?php if (empty($data['pilKriteria'])) : ?>
							  		<div class="alert alert-warning alert-dismissible fade show" role="alert">
									  <strong>Tidak ada data</strong>
									  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
							  	<?php endif; ?>

							</div>
						</div>
					</div>

					<!-- tabel rating -->
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table  table-bordered table-hover caption-top text-center">
								<caption>Tabel Rating Kecocokan</caption>
									<thead class="bgMhs">
									    <tr>
									    	<?php $i = count($data['pilKriteria']); ?>
									    	<th scope="col" rowspan="2">Kode Alternatif</th>
									    	<th scope="col" colspan="<?= $i ?>">Kode Kriteria</th>
									    </tr>
									    <tr>
									    	<?php if (!empty($data['kriteriaBaru'][0])) : ?>
										    	<?php foreach ($data['kriteriaBaru'][0] as $kriteria) :?>
											    	<th scope="col"><?= $kriteria['kode_kriteria'] ;?></th>
										    	<?php endforeach; ?>
									    	<?php endif; ?>

									    	<!-- cek ada kriteria baru -->
								        	<?php if (!empty($data['kriteriaBaru'][1])) : ?>
								        		<?php foreach ($data['kriteriaBaru'][1] as $kriteria) :?>
								        			<th scope="col"><?= $kriteria ;?></th>
								        		<?php endforeach; ?>
								        	<?php endif; ?>

									    </tr>
									</thead>
									<tbody class="fontMhs">
										
								  		<?php for ($i=0; $i < count($data['tampilAlternatifPil']) ; $i++) :?>
								  			<tr>
									  			<?php for ($j=0; $j < count($data['pilKriteria']) + 1 ; $j++) :?>

									  				<?php if (empty($data['rating'][$i][$j])) : ?>
									  					<td scope="row">
									  						<div class="alert alert-warning alert-dismissible fade show" role="alert">
														  <strong>Tidak ada data.</strong> Kriteria ini baru ditambahkan, untuk memaksimalkan hasil perhitungan silahkan Edit Alternatif terlebih dahulu di menu Alternatif.
														  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
														</div>
									  					</td>
									  				<?php else: ?>
									  					<td scope="row"><?= $data['rating'][$i][$j] ;?></td>
									  				<?php endif; ?>
											  		
												<?php endfor; ?>
											</tr>
										<?php endfor; ?>
										
								    </tbody>
								</table>

								<?php if (empty($data['tampilAlternatifPil'])) : ?>
							  		<div class="alert alert-warning alert-dismissible fade show" role="alert">
									  <strong>Tidak ada data</strong> silahkan Pilih Alternatif terlebih dahulu.
									  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
							  	<?php endif; ?>

							</div>
						</div>
					</div>

					<!-- tabel normalisasi -->
				    <div class="row">
						<div class="col-md-6">
							<div class="table-responsive">
								<table class="table  table-bordered table-hover caption-top text-center">
								<caption>Tabel Normalisasi</caption>
									<thead class="bgMhs">
									    <tr>
									    	<?php $i = count($data['pilKriteria']);?>
										    	<th scope="col" colspan="<?= $i ?>">Normalisasi</th>
									    </tr>
									</thead>

								  	<tbody class="fontMhs">

									  	<?php for ($i=0; $i < count($data['tampilAlternatifPil']) ; $i++) :?>
								  			<tr>
									  			<?php for ($j=1; $j < count($data['pilKriteria']) + 1 ; $j++) :?>

									  				<?php if (empty($data['normalisasi'][$i][$j])) : ?>
									  					<td scope="row">
									  						<div class="alert alert-warning alert-dismissible fade show" role="alert">
														  <strong>Tidak ada data.</strong> Kriteria ini baru ditambahkan, untuk memaksimalkan hasil perhitungan silahkan Edit Alternatif terlebih dahulu di menu Alternatif.
														  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
														</div>
									  					</td>
									  				<?php else: ?>
									  					<td scope="row"><?= $data['normalisasi'][$i][$j] ;?></td>
									  				<?php endif; ?>
											  		
												<?php endfor; ?>
											</tr>
										<?php endfor; ?>

								  	</tbody>
								</table>

								<?php if (empty($data['tampilAlternatifPil'])) : ?>
							  		<div class="alert alert-warning alert-dismissible fade show" role="alert">
									  <strong>Tidak ada data</strong> silahkan Pilih Alternatif terlebih dahulu.
									  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
							  	<?php endif; ?>

							</div>
						</div>

						<!-- tabel kriteria -->
						<div class="col-md-6">
							<div class="table-responsive">
								<table class="table  table-bordered table-hover caption-top text-center">
									<caption>Tabel Hasil Perangkingan</caption>
									  <thead class="bgMhs">
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">Kode Alternatif</th>
									      <th scope="col">Hasil V</th>
									      <th scope="col">Rangking</th>
									    </tr>
									  </thead>
									  <tbody class="fontMhs">
									  	<?php $no = 1; $i = 1; ?>
										  	<?php foreach ($data['hasilRangking'] as $rangking) :?>
										  		<tr>
											  		<th scope="row"><?= $no++; ?></th>
											  		<td><?= $rangking['kode_alternatif'] ;?></td>
											  		<td><?= $rangking['nilai'] ;?></td>

										  			<?php if ($i == 1) : ?>
										  				<td scope="row">
										  					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#E8BA05" class="bi bi-trophy-fill" viewBox="0 0 16 16">
															  <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
															</svg>
										  				</td>
									  				<?php else: ?>
									  					<td scope="row"><?= $i; ?></td>
									  				<?php endif; ?>
											  		
										  		</tr>

										  		<?php $i++; ?>
										  	<?php endforeach; ?>
									  </tbody>
									</table>

									<?php if (empty($data['tampilAlternatifPil'])) : ?>
								  		<div class="alert alert-warning alert-dismissible fade show" role="alert">
										  <strong>Tidak ada data</strong> silahkan Pilih Alternatif terlebih dahulu.
										  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
								  	<?php endif; ?>

								</div>
							</div>
						</div>


					<!-- bodyaccordion -->
					</div> 

		      	</div>
	    	</div>
	  	</div>
	</div>

	<?php if (!empty($data['hasilRangking'])) : ?>	
		<input id="alt1" type="hidden" value="<?= $data['hasilRangking'][0]['kode_alternatif'] ;?>">
		<input id="alt2" type="hidden" value="<?= $data['hasilRangking'][1]['kode_alternatif'] ;?>">
		<input id="alt3" type="hidden" value="<?= $data['hasilRangking'][2]['kode_alternatif'] ;?>">
		<input id="hasil1" type="hidden" value="<?= $data['hasilRangking'][0]['nilai'] ;?>">
		<input id="hasil2" type="hidden" value="<?= $data['hasilRangking'][1]['nilai'] ;?>">
		<input id="hasil3" type="hidden" value="<?= $data['hasilRangking'][2]['nilai'] ;?>">
	<?php else: ?>
		<input id="alt1" type="hidden" value="">
		<input id="alt2" type="hidden" value="">
		<input id="alt3" type="hidden" value="">
		<input id="hasil1" type="hidden" value="">
		<input id="hasil2" type="hidden" value="">
		<input id="hasil3" type="hidden" value="">
	<?php endif; ?>    
	

     <!-- modal pilih alternatif -->
    <div class="modal fade" id="pilihAlternatif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered fontMhs">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Alternatif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/Mhs_hasil/pilihAlternatif" method="POST">
                        <div class="modal-body">
                        	<?php if (count($data['tampilAlternatif']) < 3) : ?>
						  		<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Jumlah alternatif tidak cukup </strong> silahkan Tambah Alternatif terlebih dahulu.
								  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
						  	<?php else: ?>
						  		<p class="text-secondary">*Silahkan pilih alternatif yang ingin Anda rangking.<i> <b>(min.3)</b></i></p>

	                        	<?php $i = 0;  ?>
	                        	<?php foreach ($data['tampilAlternatif'] as $alternatif) :?>

	                 
	                        		<div class="row"> 
			                            <div class="col ps-4 pb-3">
				                        	<div class="form-check">
				                        		
												<input class="form-check-input" type="checkbox" value="<?= $alternatif['kode_alternatif']; ?>" id="flexCheckDefault<?= $i; ?>" name="pilih[]">
												<label class="form-check-label" for="flexCheckDefault<?= $i; ?>">
													<?= $alternatif['nama_alternatif']; ?>
												</label>
											</div>
										</div>
									</div>

									<?php $i++;  ?>

	                        	<?php endforeach; ?>

	                        	</div>

	                    <div class="modal-footer">
	                      <button type="submit" class="btn btn-primary" >Pilih Sekarang</button>
	                    </div>

						  	<?php endif; ?>

                        
	                </form>
	            </div>
	         </div>
	    </div>
	</div>

</div>
</section>