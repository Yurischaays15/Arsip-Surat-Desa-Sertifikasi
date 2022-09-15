<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ARSIP SURAT - SERTIFIKASI DIPA 2022</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->
        <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
	<!--library alert --> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#!">ARSIP SURAT DESA</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="{{route('arsipsurat')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                Arsip
                            </a>
                            <a class="nav-link" href="{{route('about')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-info"></i></div>
                                About
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Arsip Surat</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb item">
                                Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
                                Klik "Lihat" pada kolom aksi untuk menampilkan surat.
                            </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Entri Surat
                            </div>
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}
                            </div>
                            @endif
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nomor Surat</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Waktu Pengarsipan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($arsipsurat as $data => $arsip_surat)
                                        <tr>
                                            <td>{{ $arsip_surat->no_surat }}</td>
                                            <td>{{ $arsip_surat->kategorisurat->kategori }}</td>
                                            <td>{{ $arsip_surat->judul }}</td>
                                            <td>{{ $arsip_surat->created_at }}</td>
                                            <td>
                                                <!-- <button onclick="handleDelete({{$arsip_surat->id_arsipsurat}})" class="btn btn-danger btn-sm">Hapus</button> -->
                                                <button class="btn btn-primary sweet-1" onclick="swal({
                                                    title: 'Apakah Anda yakin ingin menghapus arsip surat ini?',
                                                    text: 'File yang dihapus tidak dapat dikembalikan',
                                                    icon: 'warning',
                                                    buttons: true,
                                                    dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                            swal('Berhasil dihapus', {
                                                                icon: 'success',
                                                            });
                                                        } else {
                                                            swal('File anda aman', {
                                                                icon: 'info');
                                                             }
                                                        });"> Hapus</button>

                                                <a href="public/files/{{$arsip_surat->file_surat}}" class="btn btn-warning btn-sm">Unduh</a>
                                                <a href="{{route('show', $arsip_surat->id_arsipsurat)}}" class="btn btn-primary btn-sm">Lihat >></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel"> Alert </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus arsip surat ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <a id="deleteLink" class="btn btn-danger">Ya!</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-3">
                                <a href="{{ route('create') }}" class="btn btn-default btn-sm"><i class="fas fa-box-archive"></i> Arsipkan Surat..</a>
                            </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Yurischa Aulya</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    </body>
</html>
