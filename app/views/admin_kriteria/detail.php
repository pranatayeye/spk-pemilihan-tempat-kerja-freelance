<section class="p-4 pt-5 my-container bg-light">

	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_home'?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_kriteria'?>">Kriteria</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

	<!-- tabel kriteria -->
	<div class="table-responsive">
		<table class="table  table-bordered table-hover caption-top text-center">
		<caption>Detail Kriteria</caption>
		  <thead class="table-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Kode Kriteria</th>
		      <th scope="col">Kriteria</th>
		      <th scope="col">Bobot</th>
		      <th scope="col">Keterangan</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $no = 1; ?>
		  	<?php foreach ($data['detailKriteria'] as $kriteria) :?>
		  		<tr>
			  		<th scope="row"><?= $no; ?></th>
			  		<td><?= $kriteria['kode_kriteria'] ;?></td>
			  		<td><?= $kriteria['nama_kriteria'] ;?></td>
			  		<td><?= $kriteria['bobot_kriteria'] ;?></td>
			  		<td><?= $kriteria['keterangan'] ;?></td>
					<?php $no++; ?>
			   	</tr>
		  	<?php endforeach; ?>
		    
		  </tbody>
		</table>
	</div>

	<!-- tabel pernyataan -->
	<div class="row">
		<div class="col-md-6">
			<div class="table-responsive">
				<table class="table  table-bordered table-hover caption-top text-center">
				<caption>Pernyataan Nilai Bobot</caption>
				  <thead class="table-dark">
				    <tr>
				      <th scope="col">Pernyataan Nilai Bobot</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($data['detailKriteria'] as $kriteria) :?>
				  		<tr>
					  		<td><?= $kriteria['pernyataan'] ;?></td>
					   	</tr>
				  	<?php endforeach; ?>
				    
				  </tbody>
				</table>
			</div>
		</div>
	</div>


</section>