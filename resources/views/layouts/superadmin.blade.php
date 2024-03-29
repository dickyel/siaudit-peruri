<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    
    @stack('before-styles')
    @include('components.styles')
    @stack('after-styles')
  </head>

  <!-- Modal Button Detail-->
  <!-- <div class="modal fade" id="myDetail" tabindex="-1" aria-labelledby="myDetail" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lihat Detail </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <h5>Tanggal Upload Temuan</h5>
              <p>18 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Jatuh Tempo</h5>
              <p>18 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tingkat Resiko</h5>
              <p>Sedang</p>
            </div>
            <div class="col-md-4">
              <h5>Deskripsi Nama Temuan</h5>
              <p>Deskripsi Nama Temuan</p>
            </div>
            <div class="col-md-4">
              <h5>Nomor Temuan</h5>
              <p>TEM/QWERTY/09/090</p>
            </div>

          </div>
          <div class="dropdown-divider"></div>

          <div class="row mt-4">

            <div class="col-md-4">
              <h5>Deskripsi Nama Rekomendasi</h5>
              <p>18 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggapan Auditee</h5>
              <p>18 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Divisi/Departement</h5>
              <p>Sedang</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Tindak Lanjut</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Tindak Lanjut</h5>
              <p>...........</p>
            </div>

            <div class="col-md-4">
              <h5>Tanggal File Evidence</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>File Evidence</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update Tindak Lanjut</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Update Tindak Lanjut</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update File Evidence</h5>
              <p>...........</p>
            </div>


            <div class="col-md-4">
              <h5>Update File Evidence</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Status Rekomendasi</h5>
              <p>Belum ditindaklanjuti</p>
            </div>
            <div class="col-md-8">
              <h5>Keterangan Feedback</h5>
              <p>isi poin - poins kenapa masih belum ditindaklanjuti</p>
            </div>
            <div class="col-md-4">
              <h5>Status Semua Tinjauan</h5>
              <p>Not Approved</p>
            </div>
        
          </div>
          <div class="dropdown-divider mt-4 mb-4"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Modal Button Approval -->
  <!-- <div class="modal fade" id="myApproval" tabindex="-1" aria-labelledby="myApproval" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Approval Temuan & Rekomendasi </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-4">
              <h5>Tanggal Upload Temuan</h5>
              <p>18 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Jatuh Tempo</h5>
              <p>18 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tingkat Resiko</h5>
              <p>Sedang</p>
            </div>
            <div class="col-md-4">
              <h5>Deskripsi Nama Temuan</h5>
              <p>Deskripsi Nama Temuan</p>
            </div>
            <div class="col-md-4">
              <h5>Nomor Temuan</h5>
              <p>TEM/QWERTY/09/090</p>
            </div>

          </div>

          <div class="dropdown-divider"></div>

          <div class="row mt-4">

            <div class="col-md-4">
              <h5>Deskripsi Nama Rekomendasi</h5>
              <p>Nama Rekomendasi 1</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggapan Auditee</h5>
              <p>Tanggpan 1</p>
            </div>
            <div class="col-md-4">
              <h5>Divisi/Departement</h5>
              <p>IT</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Tindak Lanjut</h5>
              <p>19 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tindak Lanjut</h5>
              <p>Baru lagi</p>
            </div>

            <div class="col-md-4">
              <h5>Tanggal File Evidence</h5>
              <p>.19 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>File Evidence</h5>
              <p>evidence.pdf</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update Tindak Lanjut</h5>
              <p>.............</p>
            </div>
            <div class="col-md-4">
              <h5>Update Tindak Lanjut</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update File Evidence</h5>
              <p>...........</p>
            </div>


            <div class="col-md-4">
              <h5>Update File Evidence</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Status Rekomendasi</h5>
              <select name="" id="" class="form-control">
                <option value="">Belum sesuai</option>
                <option value="">Belum ditindaklanjuti</option>
                <option value="">Sudah sesuai</option>
                <option value="">Tidak dapat ditindaklanjuti</option>
              </select>
            </div>
            <div class="col-md-8">
              <h5>Keterangan Feedback</h5>
              <textarea name="" id=""  rows="5" class="form-control">
                
              </textarea>
            </div>
            <div class="col-md-4">
              <h5>Status Semua Tinjauan</h5>
              <select name="" id="" class="form-control">
                <option value="">Approved</option>
                <option value="">Not Approved</option>
              
              </select>
            </div>

            <div class="col-md-12 mt-2">
              <h5>Tanda Tangan Approval Admin SPI</h5>
            
              <canvas id="signatureCanvas" width="770"  height="150" style="border-color: gray;"></canvas>
              <button onclick="clearSignature()" class="btn btn-outline-secondary">Clear Signature</button>
            </div>
        
          </div>

          <div class="dropdown-divider mt-4 mb-4"></div>
          
          <button type="button" class="btn btn-primary">Simpan</button>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Modal Button Kirim ke Admin SPI -->
  <!-- <div class="modal fade" id="myAdmin" tabindex="-1" aria-labelledby="myAdmin" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kirim Temuan & Rekomendasi ke KA SPI</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <label class="label">
                <input type="checkbox" name="checkbox" value="text" class="mr-2">Nama Temuan 1
              </label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <h5>Tanggal Upload Temuan</h5>
              <p>18 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Jatuh Tempo</h5>
              <p>18 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tingkat Resiko</h5>
              <p>Sedang</p>
            </div>
            <div class="col-md-4">
              <h5>Deskripsi Nama Temuan</h5>
              <p>Deskripsi Nama Temuan</p>
            </div>
            <div class="col-md-4">
              <h5>Nomor Temuan</h5>
              <p>TEM/QWERTY/09/090</p>
            </div>

          </div>

          <div class="dropdown-divider"></div>

          <div class="row mt-4">

            <div class="col-md-4">
              <h5>Deskripsi Nama Rekomendasi</h5>
              <p>Nama Rekomendasi 1</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggapan Auditee</h5>
              <p>Tanggpan 1</p>
            </div>
            <div class="col-md-4">
              <h5>Divisi/Departement</h5>
              <p>IT</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Tindak Lanjut</h5>
              <p>19 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tindak Lanjut</h5>
              <p>Baru lagi</p>
            </div>

            <div class="col-md-4">
              <h5>Tanggal File Evidence</h5>
              <p>.19 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>File Evidence</h5>
              <p>evidence.pdf</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update Tindak Lanjut</h5>
              <p>.............</p>
            </div>
            <div class="col-md-4">
              <h5>Update Tindak Lanjut</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update File Evidence</h5>
              <p>...........</p>
            </div>


            <div class="col-md-4">
              <h5>Update File Evidence</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Status Rekomendasi</h5>
              <p>Sesuai</p>
            </div>
            <div class="col-md-4">
              <h5>Keterangan Feedback</h5>
              <p>Keterangan status rekomendasi sudah sesuai</p>
            </div>
            <div class="col-md-4">
              <h5>Status Semua Tinjauan</h5>
              <p>Approved</p>
            </div>
            <div class="col-md-12">
              <h5>Kirim ke Kepala SPI</h5>
              <select name="" id="" class="form-control">
                <option value="">DEP 1</option>
                <option value="">DEP 1</option>
                <option value="">DEP 1</option>
                <option value="">DEP 1</option>
              </select>
            </div>

        
          </div>

          <div class="dropdown-divider mt-4 mb-4"></div>

          <div class="row ">

            <div class="col-md-4">
              <h5>Deskripsi Nama Rekomendasi</h5>
              <p>Nama Rekomendasi 1</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggapan Auditee</h5>
              <p>Tanggpan 1</p>
            </div>
            <div class="col-md-4">
              <h5>Divisi/Departement</h5>
              <p>IT</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Tindak Lanjut</h5>
              <p>19 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tindak Lanjut</h5>
              <p>Baru lagi</p>
            </div>

            <div class="col-md-4">
              <h5>Tanggal File Evidence</h5>
              <p>.19 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>File Evidence</h5>
              <p>evidence.pdf</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update Tindak Lanjut</h5>
              <p>.............</p>
            </div>
            <div class="col-md-4">
              <h5>Update Tindak Lanjut</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update File Evidence</h5>
              <p>...........</p>
            </div>


            <div class="col-md-4">
              <h5>Update File Evidence</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Status Rekomendasi</h5>
              <p>Sesuai</p>
            </div>
            <div class="col-md-4">
              <h5>Keterangan Feedback</h5>
              <p>Keterangan status rekomendasi sudah sesuai</p>
            </div>
            <div class="col-md-4">
              <h5>Status Semua Tinjauan</h5>
              <p>Approved</p>
            </div>
            <div class="col-md-12 mb-4">
              <h5>Kirim ke Kepala SPI</h5>
              <select name="" id="" class="form-control">
                <option value="">DEP 1</option>
                <option value="">DEP 1</option>
                <option value="">DEP 1</option>
                <option value="">DEP 1</option>
              </select>
            </div>

            
            <div class="dropdown-divider mt-4 mb-4"></div>

            
          
          </div>

          <div class="row mt-4">

            <div class="col-md-4">
              <h5>Deskripsi Nama Rekomendasi</h5>
              <p>Nama Rekomendasi 1</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggapan Auditee</h5>
              <p>Tanggpan 1</p>
            </div>
            <div class="col-md-4">
              <h5>Divisi/Departement</h5>
              <p>IT</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Tindak Lanjut</h5>
              <p>19 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>Tindak Lanjut</h5>
              <p>Baru lagi</p>
            </div>

            <div class="col-md-4">
              <h5>Tanggal File Evidence</h5>
              <p>.19 Juni 2023</p>
            </div>
            <div class="col-md-4">
              <h5>File Evidence</h5>
              <p>evidence.pdf</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update Tindak Lanjut</h5>
              <p>.............</p>
            </div>
            <div class="col-md-4">
              <h5>Update Tindak Lanjut</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Tanggal Update File Evidence</h5>
              <p>...........</p>
            </div>


            <div class="col-md-4">
              <h5>Update File Evidence</h5>
              <p>...........</p>
            </div>
            <div class="col-md-4">
              <h5>Status Rekomendasi</h5>
              <select name="" id="" class="form-control">
                <option value="">Belum sesuai</option>
                <option value="">Belum ditindaklanjuti</option>
                <option value="">Sudah sesuai</option>
                <option value="">Tidak dapat ditindaklanjuti</option>
              </select>
            </div>
            <div class="col-md-8">
              <h5>Keterangan Feedback</h5>
              <textarea name="" id=""  rows="5" class="form-control">
                
              </textarea>
            </div>
            <div class="col-md-4">
              <h5>Status Semua Tinjauan</h5>
              <select name="" id="" class="form-control">
                <option value="">Approved</option>
                <option value="">Not Approved</option>
              
              </select>
            </div>

            <div class="col-md-12 mt-2">
              <h5>Tanda Tangan Approval Admin SPI</h5>
            
              <canvas id="signatureCanvas" width="770"  height="150" style="border-color: gray;"></canvas>
              <button onclick="clearSignature()" class="btn btn-outline-secondary">Clear Signature</button>
            </div>
        
          </div>

           <div class="dropdown-divider mt-4 mb-4"></div>



          
          <button type="button" class="btn btn-primary">Simpan</button>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> -->

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="{{ asset('./sitinjut/images/logo (2).svg') }}" alt="" class="my-4" width="200px" />
          </div>
          <div class="list-group list-group-flush text-center">
            <ul class="list-unstyled">
              <li>
                <a
                  href=""
                  class="list-group-item list-group-item-action active"
                  >Dashboard</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="list-group-item list-group-item-action "
                  >File LHA</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="list-group-item list-group-item-action "
                  >Monitoring Hasil Tindak Lanjut</a
                >
              </li>
              <li>
                <a
                  href=""
                  class="list-group-item list-group-item-action "
                  >file Report</a
                >
              </li>
              <li>
                <a
                  href="#master"
                  class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse" aria-expanded="false"
                  >Master Menu</a>
                  <ul class="collapse list-unstyled" id="master">
                    <li>
                      <a href="{{ route('role.index') }}" class="list-group-item list-group-item-action ">Master Roles</a>
                    </li>
                    <li>
                      <a href="{{ route('unit.index') }}" class="list-group-item list-group-item-action" >Master Unit</a>
                    </li>
                    <li>
                      <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action ">Master User</a>
                    </li>
                  </ul>
              </li>
              
             
             
              <li>
                <a
                    href="#"
                    onclick="logout()"
                    class="list-group-item list-group-item-action"
                >
                    Logout
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>    

          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
            data-aos="fade-down"
          >
            <button
              class="btn btn-secondary d-md-none mr-auto mr-2"
              id="menu-toggle"
            >
              &laquo; Menu
            </button>

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link d-inline-block mt-2" href="#">
                      <img src="/images/notif.svg" alt=""  width="32px"/>
                    </a>
                  </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                  Hi, 
                    <img
                      src="/images/icon-user.png"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                    />
                    
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  
                    
                    <a class="dropdown-item" href=""
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                  </div>
                </li>
                
              </ul>
              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    Hi,
                    <img
                      src="/images/icon-user.png"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                    />
                  </a>  
                  <div class="dropdown-menu">
                        <a href="" class="dropdown-item">Dashboard</a>
                       
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=""
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=""
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
              </ul>
              
            </div>
          </nav>
      
          <!-- content -->
          @yield('content')
     
        <!-- /#page-content-wrapper -->
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->

    @stack('before-scripts')
    @include('components.scripts')
    @stack('after-scripts')
  </body>
</html>
