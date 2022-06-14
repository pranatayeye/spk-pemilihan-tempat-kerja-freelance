<div class="fontMhs">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow" id="navLogin">
  <div class="container">
    <a class="navbar-brand">
      <img src="<?= BASEURL; ?>/app/assets/img/logo1.png">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <div class="navbar-nav">
        <a class="nav-link me-4  active" href="#secLogin01">Login</a>
        <a class="nav-link me-4" href="#secLogin02">Manfaat</a>
        <a class="nav-link me-4" href="#secLogin03">Contact Us</a>
        <a class="nav-link btn btn-sm rounded-pill bg-danger text-light" data-bs-toggle="modal" data-bs-target="#staticBackdropAdmin" href="" >Admin</a>
      </div>
    </div>
  </div>
</nav>

<section id="secLogin01">
  <div class="jumbotron" style="background-image: url(<?= BASEURL; ?>/app/assets/img/1.png);"> 

    <div class="container " id="conLogin">
      <div class="row" id="rowLogin"> 
        <div class="col-lg-6 rounded py-3 bg-light"> 
          <div class="container">

            <div class="row">
              <?php Flasher::flash();?>
            </div>
            
            <div class="row pb-4 text-center">
              <h2>Login Mahasiswa</h2>
            </div>

            <form action="<?= BASEURL; ?>/Login/loginMhs" method="POST">
              <div class="row mb-1"> 
                <div class="col pb-2">
                  <div class="form-floating">
                    <input type="text" class="form-control " name="nim" placeholder="NIM" required autofocus>
                    <label>NIM</label>
                  </div>
                </div>
              </div>

              <div class="row"> 
                <div class="col pb-2">
                  <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="passwordHelpBlock" required>
                    <label>Password</label>
                  </div>
                </div>
              </div>

              <div class="row pb-2 text-end">
                <a href="#secLogin04">Lupa password?</a>
              </div>

              <div class="row">
                <div class="d-grid pb-2">
                  <button class="btn rounded-pill btn-primary" type="submit">LOGIN</button>
                </div>
              </div>

              <div class="row">
                <p>Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropUser">Daftar disini?</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="secLogin02">
  <div class="container-fluid bg-light">
    <div class="container pt-4">
      <h2 class="text-center pt-5">Apa saja manfaat sistem ini ?</h2>
      <div class="row text-center px-0">
        <div class="col-md-4">
          <div class="container my-5 py-1">
            <div class="card bg-light">
              <div class="container mt-3">
                <img src="<?= BASEURL; ?>/app/assets/img/2.png" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <p class="card-text">Membantu mahasiswa dalam pemilihan tempat kerja <i>freelance</i> yang sesuai.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="container my-5 py-1">
            <div class="card bg-light">
              <div class="container mt-3">
                <img src="<?= BASEURL; ?>/app/assets/img/3.png" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <p class="card-text">Memberikan rekomendasi alternatif tempat kerja <i>freelance</i> yang sesuai bagi mahasiswa.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="container my-5 py-1">
            <div class="card bg-light">
              <div class="container mt-3">
                <img src="<?= BASEURL; ?>/app/assets/img/4.png" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <p class="card-text">Mengurangi kesalahan pemilihan tempat kerja <i>freelance</i>.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<section id="secLogin03">
  <div class="container-fluid bg-light">
    <div class="row text-center">
      <div class="col-md-12">
        <div class="container my-4 py-3">
          <a href="#secLogin01" class="btn btn-lg rounded-pill bg-primary text-light">Daftar Sekarang &uarr;</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="secLogin04">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="container my-5 py-3 text-light">
          <h3 class="mb-4">Contact Us</h3>
          <ul>
            <li class="mt-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill me-2" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
            +6287861189600 </li>
            <li>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill me-2" viewBox="0 0 16 16">
              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
            </svg>
            Pranatayeye@gmail.com</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal User -->

<div class="modal fade" id="staticBackdropUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Daftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form action="<?= BASEURL; ?>/Login/daftarMhs" method="POST">
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
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                <label>Nama</label>
              </div>
            </div>
          </div>

          <div class="row"> 
            <div class="col pb-3">
              <div class="form-floating">
                <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" aria-describedby="passwordHelpBlock" required>
                <label>Password</label>
              </div>
            </div>
          </div>

          <div class="row"> 
            <div class="col pb-3">
              <div class="form-floating">
                <input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="rePassword" aria-describedby="rePasswordHelpBlock" required>
                <label>Ulangi password</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Daftar Sekarang</button>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>

<!-- Modal Admin -->

<div class="modal fade" id="staticBackdropAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/Login/loginAdmin" method="POST">
          <div class="modal-body">
            <div class="row"> 
              <div class="col pb-3">
                <div class="form-floating">
                  <input type="text" class="form-control rounded" id="idAdmin"
                  name="idAdmin" placeholder="idAdmin" required>
                  <label>ID</label>
                </div>
              </div>
            </div>

            <div class="row"> 
              <div class="col pb-3">
                <div class="form-floating">
                  <input type="password" class="form-control rounded" id="passAdmin" name="passAdmin" placeholder="Password" aria-describedby="passwordHelpBlock" required>
                  <label>Password</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">LOGIN</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
