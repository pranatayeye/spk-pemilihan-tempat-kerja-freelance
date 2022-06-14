<section id="cetak" class="bg-light">
<div class="container py-5">
           
	<h2 class="text-center">Hasil Pemilihan <br> Tempat Kerja <i>Freelance</i>  Menggunakan Metode SAW</h2>

	<table class="mt-5">
	<tr>
		<td>NIM </td>
		<td>&nbsp; : <?= $data['nim'];  ?></td>
	</tr>
	<tr>
		<td>Nama </td>
		<td>&nbsp; : <?=$data['namaMhs'][0]['nama_mhs'];?></td>
	</tr>
	</table>
	

	<!-- grafik -->
	<label class="text-secondary mt-3 mb-3">*Berikut adalah visualisasi data dari tiga alternatif teratas :</label>
	<canvas id="mChart" style="width: 400; height: 400"></canvas>

	<?php if (!empty($data['hasilRangking'])) : ?>	
		<input id="al1" type="hidden" value="<?= $data['hasilRangking'][0]['kode_alternatif'] ;?>">
		<input id="al2" type="hidden" value="<?= $data['hasilRangking'][1]['kode_alternatif'] ;?>">
		<input id="al3" type="hidden" value="<?= $data['hasilRangking'][2]['kode_alternatif'] ;?>">
		<input id="hasl1" type="hidden" value="<?= $data['hasilRangking'][0]['nilai'] ;?>">
		<input id="hasl2" type="hidden" value="<?= $data['hasilRangking'][1]['nilai'] ;?>">
		<input id="hasl3" type="hidden" value="<?= $data['hasilRangking'][2]['nilai'] ;?>">
	<?php else: ?>
		<input id="al1" type="hidden" value="">
		<input id="al2" type="hidden" value="">
		<input id="al3" type="hidden" value="">
		<input id="hasl1" type="hidden" value="">
		<input id="hasl2" type="hidden" value="">
		<input id="hasl3" type="hidden" value="">
	<?php endif; ?>    

	<!-- tabel alternatif -->
    <div class="row mt-4">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered border-dark caption-top text-center">
				<caption>Tabel Alternatif</caption>
				  <thead class="table-dark">
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
	</div>

	<!-- tabel hasil -->
    <div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-sm table-bordered border-dark caption-top text-center">
					<caption>Tabel Hasil Perangkingan</caption>
					  <thead class="table-dark">
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
					  				<td scope="row"><?= $i; ?></td>
					  				
							  		
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

	

	<div class="row">
    	<div class="col-md-11">
	    	<p class="my-3">
				<?= $data['tampilHasil'][0]['kode_alternatif']; ?> memiliki nilai
				terbesar dibandingkan dengan yang lainnya sebesar <?=$data['hasilRangking'][0]['nilai'] ?>
				<br>
				Dengan demikian <?= $data['tampilHasil'][0]['kode_alternatif']; ?> <b>"<?= $data['tampilHasil'][0]['nama_alternatif']; ?>"</b>
				adalah alternatif yang terpilih sebagai alternatif terbaik.
			</p>
		</div>
    </div>

    
    	<table class="mt-5">
		<tr>
			<td><h5>From &nbsp; :</h5></td>
			<td>&nbsp; &nbsp;<img src="<?= BASEURL; ?>/app/assets/img/logo1.png"  id="logocetak" style="width: 80px; height: 30px;"></td>
		</tr>
		</table>
	

</div>
</section>

<script>
	window.setTimeout(function() {
        window.print();
    }, 1000);
</script>