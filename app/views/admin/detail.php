<section class="p-4 pt-5 my-container bg-light">

	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_home'?>">Home</a></li>
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin'?>">Admin</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

	<div class="table-responsive">
		<table class="table  table-bordered table-hover caption-top text-center">
		<caption>Detail Admin</caption>
		  <thead class="table-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">ID Admin</th>
		      <th scope="col">Nama Admin</th>
		      <th scope="col">No Telp</th>
		      <th scope="col">Email</th>
		      <th scope="col">Alamat</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $no = 1; ?>
		  	<?php foreach ($data['detailAdmin'] as $admin) :?>
		  		<tr>
			  		<th scope="row"><?= $no++; ?></th>
			  		<td><?= $admin['id_admin'] ;?></td>
			  		<td><?= $admin['nama_admin'] ;?></td>
			  		<td><?= $admin['no_telp'] ;?></td>
			  		<td><?= $admin['email'] ;?></td>
			  		<td><?= $admin['alamat'] ;?></td>
			   	</tr>
		  	<?php endforeach; ?>
		    
		  </tbody>
		</table>
	</div>

</section>