<section class="p-4 pt-5 my-container bg-light">
<div class="fontAdmin">
	
	<!-- breadcrumb -->
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_home'?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

	<div class="row">
		<div class="col-md-12">
			<form action="<?= BASEURL; ?>/Admin_log" method="POST" class="d-flex justify-content-end" id="searchLog">
				<div class="input-group">
			        <input class="form-control" type="search" name="cari" placeholder="Cari log" aria-label="Search" value="<?= $data['cari']; ?>" autocomplete="off"><label></label>
			        <button id="button" name="button" class="btn btn-primary" type="submit">
			        	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>
					</button>
			    </div>
		    </form>
		</div>
	</div>

    <!-- tabel mahasiswa -->
	<div class="table-responsive">
		<table class="table table-bordered table-hover caption-top text-center">
		<caption>Daftar log aktivitas</caption>
		  <thead class="bgAdmin">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Cap Waktu</th>
		      <th scope="col">Keterangan</th>
		    </tr>
		  </thead>
		  <tbody class="fontAdmin">
		  	<?php $no = $data['awalData']; ?>
		  	<?php foreach ($data['tampilLog'] as $log) :?>
		
		  		<tr>
			  		<th scope="row"><?= ++$no; ?></th>
			  		<td><?= $log['cap_waktu'] ;?></td>
			  		<td><?= $log['keterangan'] ;?></td>
			   	</tr>
	
		  	<?php endforeach; ?>
		    
		  </tbody>
		</table>
	</div>

	<?php 
		$no1 = (($data['awalData'])+5)/5;
		$mulai = $data['jmlHal'][0]; 
		$akhir = $data['jmlHal'][1];
		$jmlData = $data['jmlHal'][2];
		$jmlHal = $data['jmlHal'][3];
	?>
	
	<div class="row" id="under">
		<div class="col-md-6">
			<p>Jumlah data : <?= $jmlData; ?></p>
		</div>

		<div class="col-md-6">
			<nav aria-label="Page navigation example">
			  <ul class="pagination pagination-sm justify-content-end">
			  	<!--  -->
			  	<?php if( $no1 <= 1) : ?>
			  		<li class="page-item disabled">
			      		<a class="page-link" href="<?= BASEURL . '/Admin_log/1'?>" tabindex="-1" aria-disabled="true">First</a>
			    	</li>
			    <?php else : ?>
			    	<li class="page-item">
			      		<a class="page-link" href="<?= BASEURL . '/Admin_log/1'?>" tabindex="-1" aria-disabled="true">First</a>
			    	</li>
			  	<?php endif; ?>

			  	<!--  -->
			  	<?php if( $no1 <= 1) : ?>
			  		<li class="page-item disabled">
			      		<a class="page-link" href="<?= BASEURL . '/Admin_log/'?><?= $no1 - 1 ?>" tabindex="-1" aria-disabled="true">&laquo;</a>
			    	</li>
			    <?php else : ?>
			    	<li class="page-item">
			      		<a class="page-link" href="<?= BASEURL . '/Admin_log/'?><?= $no1 - 1 ?>" tabindex="-1" aria-disabled="true">&laquo;</a>
			    	</li>
			  	<?php endif; ?>
			    
			    <!--  -->
			    <?php for ($i=$mulai; $i <= $akhir ; $i++) : ?>
			    	<?php if( $i == $no1) : ?>
					    <li class="page-item active" aria-current="page"><a class="page-link" href="<?= BASEURL . '/Admin_log/'?><?= $i ?>"><?= $i; ?></a></li>
					<?php else : ?>
						<li class="page-item"><a class="page-link" href="<?= BASEURL . '/Admin_log/'?><?= $i ?>"><?= $i; ?></a></li>
					<?php endif; ?>
			    <?php endfor; ?>

			    <!--  -->
			    <?php if( $no1 < $akhir ) : ?>
			    	<li class="page-item">
				    	<a class="page-link" href="<?= BASEURL . '/Admin_log/'?><?= $no1 + 1 ?>">&raquo;</a>
				    </li>
			    <?php else : ?>
			    	<li class="page-item disabled">
				    	<a class="page-link" href="<?= BASEURL . '/Admin_log/'?><?= $no1 + 1 ?>">&raquo;</a>
				    </li>
			    <?php endif; ?>
			    
			    <!--  -->
			    <?php if( $no1 < $akhir ) : ?>
			    	<li class="page-item">
				    	<a class="page-link" href="<?= BASEURL . '/Admin_log/'?><?= $jmlHal ?>">Last</a>
				    </li>
			    <?php else : ?>
			    	<li class="page-item disabled">
				    	<a class="page-link" href="<?= BASEURL . '/Admin_log/'?><?= $jmlHal ?>">Last</a>
				    </li>
			    <?php endif; ?>

			  </ul>
			</nav> 
		</div>
	</div>

</div>	
</section>