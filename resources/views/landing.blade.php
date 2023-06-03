<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pendaftaran Anggota Saka Milenial</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('agency/assets/favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('agency/css/styles.css') }}" rel="stylesheet" />

        <!-- Custom styles for this page -->
        <link href="{{ asset('sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

        <style>
            .mr-5 {
                margin-right: 5px;
            }

            .ml-5 {
                margin-left: 5px;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('agency/assets/img/navbar-logo.svg') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#registration">Daftar</a></li>
                        <li class="nav-item"><a class="nav-link" href="#statistic">Statistik</a></li>
                        <li class="nav-item"><a class="nav-link" href="#registration_information">Info Pendaftaran</a></li>
                        @if (auth()->check())
                            <li class="nav-item"><a class="nav-link" style="color: #ffc800" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                        {{-- <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> --}}
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Selamat Datang di Pendaftaran Anggota</div>
                <div class="masthead-heading text-uppercase">Saka Milenial</div>
                <a class="btn btn-primary btn-xl text-uppercase mb-3" href="#registration">Daftar Sekarang</a>
                <p class="">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Masuk</a></p>
            </div>
        </header>
        <!-- Registration Form -->
        <section class="page-section" id="registration">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Formulir Pendaftaran</h2>
                    <h3 class="section-subheading text-muted">Pendaftaran Peserta Gelar Saka Milenial Tahun 2023</h3>
                </div>
                <div class="row">
                    <form id="registration_form" method="post">
                        @csrf
                        <div class="row align-items-stretch mb-5">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="mb-2">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Masukkan nama lengkap" required
                                    oninvalid="this.setCustomValidity('Nama Lengkap tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Masukkan alamat email" required
                                    oninvalid="this.setCustomValidity('Email tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <br>
                                    <input name="gender" type="radio" value="1" required />
                                    &nbsp;
                                    <label>Laki-laki</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="gender" type="radio" value="0" required />
                                    &nbsp;
                                    <label>Perempuan</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input class="form-control" id="birth_place" name="birth_place" type="text" placeholder="Masukkan tempat lahir" required
                                    oninvalid="this.setCustomValidity('Tempat Lahir tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input class="form-control" id="birth_date" name="birth_date" type="date" placeholder="Masukkan tanggal lahir" required
                                    oninvalid="this.setCustomValidity('Tanggal Lahir tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Pangkalan/Gudep <span class="text-danger">*</span></label>
                                    <input class="form-control" id="pangkalan_gudep" name="pangkalan_gudep" type="text" placeholder="Masukkan pangkalan/gudep" required
                                    oninvalid="this.setCustomValidity('Pangkalan/Gudep tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Kwarran <span class="text-danger">*</span></label>
                                    <select class="form-control" name="kwarran" required>
                                        <option value="">- Pilih Kwarran -</option>
                                        @foreach ($kwarran as $item)
                                            <option value="{{ $item->id }}">{{ $item->kwarran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">NIK</label>
                                    <input class="form-control" id="nik" name="nik" type="number" placeholder="Masukkan nomor NIK" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">NTA Pramuka/NIS/NIM <span class="text-danger">*</span></label>
                                    <input class="form-control" id="nta_pramuka_nis_nim" name="nta_pramuka_nis_nim" type="text" placeholder="Masukkan NTA Pramuka/NIS/NIM" required
                                    oninvalid="this.setCustomValidity('NTA Pramuka/NIS/NIM tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Tingkatan Pramuka <span class="text-danger">*</span></label>
                                    <select class="form-control" name="scout_level" required>
                                        <option value="">- Pilih Tingkatan Pramuka -</option>
                                        @foreach ($scout_level as $item)
                                            <option value="{{ $item->id }}">{{ $item->scout_level }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Krida Saka Milenial <span class="text-danger">*</span></label>
                                    <br>
                                    @foreach ($krida_saka_milenial as $item)
                                        <input name="krida_saka_milenial" type="radio" value="{{ $item->id }}" />
                                        &nbsp;
                                        <label class="mb-1">{{ $item->krida_saka_milenial }}</label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="mb-2">Alamat Tempat Tinggal <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" rows="2" placeholder="Masukkan alamat tempat tinggal" required
                                    oninvalid="this.setCustomValidity('Alamat Tempat Tinggal tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input class="form-control" id="phone_number" name="phone_number" type="number" placeholder="Masukkan nomor telepon" required
                                    oninvalid="this.setCustomValidity('Nomor Telepon tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Twitter</label>
                                    <input class="form-control" id="twitter" name="twitter" type="text" placeholder="Masukkan twitter" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Instagram</label>
                                    <input class="form-control" id="instagram" name="instagram" type="text" placeholder="Masukkan instagram" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Facebook</label>
                                    <input class="form-control" id="facebook" name="facebook" type="text" placeholder="Masukkan facebook" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Tiktok</label>
                                    <input class="form-control" id="tiktok" name="tiktok" type="text" placeholder="Masukkan tiktok" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">KK (Kartu Keluarga) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="kk_file" name="kk_file" type="file" accept="image/png,image/jpeg,image/jpg" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">KTP <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ktp_file" name="ktp_file" type="file" accept="image/png,image/jpeg,image/jpg" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Password <i>(Mohon Diingat!)</i> <span class="text-danger">*</span></label>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password" required
                                    oninvalid="this.setCustomValidity('Password tidak boleh kosong')"
                                    oninput="this.setCustomValidity('')" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Captcha <span class="text-danger">*</span></label>
                                    <div class="captcha row">
                                        <div class="col-auto">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload_captcha" id="reload_captcha">↻</button>
                                        </div>
                                        <div class="col">
                                            <input class="form-control" id="captcha" name="captcha" type="text" placeholder="Masukkan captcha" required
                                            oninvalid="this.setCustomValidity('Captcha tidak boleh kosong')"
                                            oninput="this.setCustomValidity('')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button-->
                        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" type="submit">Simpan Data</button></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Statistic -->
        <section class="page-section bg-light" id="statistic">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Statistik</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Statistik</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Krida Saka Milenial</th>
                                        <th>Kwarran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($statistic as $item)
                                        <tr>
                                            <td>{{ $item['no'] }}</td>
                                            <td>{{ $item['full_name'] }}</td>
                                            <td>{{ $item['krida_saka_milenial'] }}</td>
                                            <td>{{ $item['kwarran'] }}</td>
                                            <td>{!! $item['status'] !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>

        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>

        <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

        <script type="text/javascript">
            $('#reload_captcha').click(function () {
                $.ajax({
                    type: "GET",
                    url: "{{ route('reload_captcha') }}",
                    success: function (data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });

            $("#registration_form").on("submit", function(event) {
                Swal.fire({
                    title: 'Simpan Data',
                    text: "Apakah anda yakin?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'mr-5',
                        cancelButton: 'ml-5'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Sedang Menyimpan Data!',
                            html: 'Mohon menunggu',
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        })

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('captcha_validation') }}",
                            type: "POST",
                            data: {
                                captcha: $('input[name=captcha]').val()
                            },
                            success: function (status) {
                                if (status) {
                                    // Valid Captcha

                                    $.ajax({
                                        url: "{{ route('registration.register') }}",
                                        type: "POST",
                                        data: new FormData($('#registration_form')[0]),
                                        processData: false,
                                        contentType: false,
                                        success: function (res) {
                                            console.log(res);

                                            Swal.close()

                                            if (res.status) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Sukses',
                                                    text: res.message,
                                                    allowOutsideClick: false,
                                                    allowEscapeKey: false
                                                }).then((result) => {
                                                    window.open("{{ route('login') }}", '_self');
                                                })
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Maaf',
                                                    text: res.message,
                                                    allowOutsideClick: false,
                                                    allowEscapeKey: false
                                                })
                                            }
                                        }
                                    });
                                } else {
                                    // Invalid Captcha

                                    Swal.close()

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Maaf',
                                        text: 'Captcha tidak valid',
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                    })

                                    $.ajax({
                                        type: "GET",
                                        url: "{{ route('reload_captcha') }}",
                                        success: function (data) {
                                            $(".captcha span").html(data.captcha);
                                        }
                                    });
                                }
                            }
                        });
                    }
                })
                event.preventDefault();
            });
        </script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('agency/js/scripts.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('sb-admin-2/js/demo/datatables-demo.js') }}"></script>

        {{-- <script src="{{ asset('agency/js/sb-forms-0.4.1.js') }}"></script> --}}
    </body>
</html>
