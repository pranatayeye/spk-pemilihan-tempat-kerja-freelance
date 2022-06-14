<section class="p-4 pt-5 my-container bg-light">
<div class="fontMhs">

	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Mhs_home'?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Mhs_alternatif'?>">Alternatif</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

	<!-- tabel -->
	<div class="table-responsive">
		<table class="table  table-bordered table-hover caption-top text-center">
		<caption>Detail Alternatif</caption>
		  <thead class="bgMhs">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Kode Alternatif</th>
		      <th scope="col">Alternatif</th>

		      <?php foreach ($data['detailAlternatif'] as $kriteria) :?>
		      	<th scope="col"><?= $kriteria['nama_kriteria']; ?></th>
		      <?php endforeach; ?>
		      
		    </tr>
		  </thead>
		  <tbody class="fontMhs">
		  	<tr>
		  		<th scope="row">1</th>
		  		<td><?= $data['detailAlternatif'][0]['kode_alternatif'] ;?></td>
			  	<td><?= $data['detailAlternatif'][0]['nama_alternatif'] ;?></td>

			  	<?php foreach ($data['detailAlternatif'] as $alternatif) :?>
					  		
					<td><?= $alternatif['bobot'] ;?></td>
						  
			    <?php endforeach; ?>

		    </tr>
		  </tbody>
		</table>
	</div>

	<!-- keterangan penilaian pembobotan -->
	<div class="col-md-6">
		<div class="table-responsive">
			<table class="table  table-bordered table-hover caption-top text-center">
			<caption id="cap">Keterangan Nilai Bobot :</caption>
			  <thead class="bgMhs">
			    <tr>
			      <th scope="col">Keterangan</th>
			      <th scope="col">Bobot</th>
			    </tr>
			  </thead>
			  <tbody class="fontMhs">
				  	<?php foreach ($data['pilBobot'] as $bobot) :?>
				  		<tr>
					  		<td><?= $bobot['keterangan'] ;?></td>
					  		<td><?= $bobot['bobot'] ;?></td>
				  		</tr>
				  	<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</div>

</div>
</section>