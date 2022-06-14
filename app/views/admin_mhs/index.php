<section class="p-4 pt-5 my-container bg-light">
<div class="fontAdmin">
	
	<!-- breadcrumb -->
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mb-4">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?= BASEURL . '/Admin_home'?>">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'];?></li>
	  </ol>
	</nav>

	<!-- cari mahasiswa -->
	<div class="row">
		<div class="col-md-6">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tbhMhs">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
				  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
				</svg>
				Tambah
			</button>
		</div>
		<div class="col-md-6">
			<form action="<?= BASEURL; ?>/Admin_mhs" method="POST" class="d-flex justify-content-end" id="search">
				<div class="input-group">
			        <input class="form-control" type="search" name="cari" placeholder="Cari mahasiswa" value="<?= $data['cari']; ?>" aria-label="Search" autocomplete="off">
			        <button name="button" class="btn  btn-primary" type="submit">
			        	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>
					</button>
			    </div>
		    </form>
		</div>
	</div>
	
	<!-- flash -->
	<div class="my-3">
        <?php Flasher::flash();?>
    </div>

    <!-- tabel mahasiswa -->
	<div class="table-responsive">
		<table class="table  table-bordered table-hover caption-top text-center">
		<caption>Daftar mahasiswa</caption>
		  <thead class="bgAdmin">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">NIM</th>
		      <th scope="col">Nama Mahasiswa</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody class="fontAdmin">
		  	<?php $no = $data['awalData']; ?>
		  	<?php foreach ($data['tampilMhs'] as $mhs) :?>
		
		  		<tr>
			  		<th scope="row"><?= ++$no; ?></th>
			  		<td><?= $mhs['nim'] ;?></td>
			  		<td><?= $mhs['nama_mhs'] ;?></td>
			  		<td id="aksi">
				  		<a class="btn btn-sm btn-warning mx-1" href="<?= BASEURL; ?>/Admin_mhs/edit/<?= $mhs['nim']; ?>" role="button" title="Edit">
				  			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
							  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
							</svg>
					  		
					  	</a>
				        <a class="btn btn-sm btn-danger" role="button" data-bs-toggle="modal" data-bs-target="#confirm<?= $mhs['nim']; ?>" title="Hapus">
					    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
							  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
							  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
							</svg>
					        
					    </a>
						<!-- Modal confirm -->
						<div class="modal fade" id="confirm<?= $mhs['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						        <h5 class="modal-title text-center" id="exampleModalLabel">Anda yakin ingin menghapus <?= $data['judul'];?> ?</h5>
						        
						      <div class="modal-body my-2 text-center">
						        <a href="<?= BASEURL . '/Admin_mhs'?>" type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Batal</a>
								<a class="btn btn-danger" href="<?= BASEURL; ?>/Admin_mhs/hapusMhs/<?= $mhs['nim']; ?>" role="button">Ya, Hapus</a>
						      </div>
						    </div>
						  </div>
						</div>
						
				    </td>
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
			      		<a class="page-link" href="<?= BASEURL . '/Admin_mhs/1'?>" tabindex="-1" aria-disabled="true">First</a>
			    	</li>
			    <?php else : ?>
			    	<li class="page-item">
			      		<a class="page-link" href="<?= BASEURL . '/Admin_mhs/1'?>" tabindex="-1" aria-disabled="true">First</a>
			    	</li>
			  	<?php endif; ?>

			  	<!--  -->
			  	<?php if( $no1 <= 1) : ?>
			  		<li class="page-item disabled">
			      		<a class="page-link" href="<?= BASEURL . '/Admin_mhs/'?><?= $no1 - 1 ?>" tabindex="-1" aria-disabled="true">&laquo;</a>
			    	</li>
			    <?php else : ?>
			    	<li class="page-item">
			      		<a class="page-link" href="<?= BASEURL . '/Admin_mhs/'?><?= $no1 - 1 ?>" tabindex="-1" aria-disabled="true">&laquo;</a>
			    	</li>
			  	<?php endif; ?>
			    
			    <!--  -->
			    <?php for ($i=$mulai; $i <= $akhir ; $i++) : ?>
			    	<?php if( $i == $no1) : ?>
					    <li class="page-item active" aria-current="page"><a class="page-link" href="<?= BASEURL . '/Admin_mhs/'?><?= $i ?>"><?= $i; ?></a></li>
					<?php else : ?>
						<li class="page-item"><a class="page-link" href="<?= BASEURL . '/Admin_mhs/'?><?= $i ?>"><?= $i; ?></a></li>
					<?php endif; ?>
			    <?php endfor; ?>

			    <!--  -->
			    <?php if( $no1 < $akhir ) : ?>
			    	<li class="page-item">
				    	<a class="page-link" href="<?= BASEURL . '/Admin_mhs/'?><?= $no1 + 1 ?>">&raquo;</a>
				    </li>
			    <?php else : ?>
			    	<li class="page-item disabled">
				    	<a class="page-link" href="<?= BASEURL . '/Admin_mhs/'?><?= $no1 + 1 ?>">&raquo;</a>
				    </li>
			    <?php endif; ?>

			    <!--  -->
			    <?php if( $no1 < $akhir ) : ?>
			    	<li class="page-item">
				    	<a class="page-link" href="<?= BASEURL . '/Admin_mhs/'?><?= $jmlHal ?>">Last</a>
				    </li>
			    <?php else : ?>
			    	<li class="page-item disabled">
				    	<a class="page-link" href="<?= BASEURL . '/Admin_mhs/'?><?= $jmlHal ?>">Last</a>
				    </li>
			    <?php endif; ?>
			    
			  </ul>
			</nav> 
		</div>
	</div>

	<!-- modal tambah mahasiswa -->
	<div class="modal fade" id="tbhMhs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-scrollable">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title">Tambah Mahasiswa</h5>
	        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      		</div>

		     	<div class="modal-body">
			        <form action="<?= BASEURL; ?>/Admin_mhs/tbhMhs" method="POST">
				        <div class="modal-body">

					        <div class="row"> 
					            <div class="col pb-3">
					              	<div class="form-floating">
					                	<input type="number" class="form-control" name="nim2" id="nim2" placeholder="NIM" required>
						                <label>NIM</label>
						                <div id="emailHelp" class="form-text">*Pastikan NIM benar karena tidak dapat diganti.</div>
					              	</div>
					            </div>
					        </div>

					        <div class="row"> 
					            <div class="col pb-3">
					              	<div class="form-floating">
					                	<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama mahasiswa" required>
                						<label>Nama mahasiswa</label>
					              	</div>
					            </div>
					        </div>

					        <div class="row"> 
					            <div class="col pb-3">
					              <div class="form-floating">
					                <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" aria-describedby="passwordHelpBlock" value="<?= $data['defaultPass']?>" required>
					                <label>Password</label>
					                <div id="emailHelp" class="form-text">*Default password: 12345</div>
					              </div>
					            </div>
					        </div>

					        <div class="row">
					          	<div class="col pb-3">
									<div class="form-floating">
								      	<input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="rePassword" aria-describedby="rePasswordHelpBlock" value="<?= $data['defaultPass']?>" required>
						                <label>Ulangi password</label>
						                <div id="emailHelp" class="form-text">*Default password: 12345</div>
								    </div>
					            </div>
					        </div>
				        </div>

				        <div class="modal-footer">
				          <button type="submit" class="btn btn-primary" >Tambah Sekarang</button>
				        </div>
					</form>
		    	</div>
	 	 	</div>
		</div>
	</div>

</div>
</section>