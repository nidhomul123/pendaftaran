@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Master Krida Saka Milenial</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <a href="{{ route('master.krida_saka_milenial') }}" class="btn btn-secondary btn-icon-split btn-sm mb-4">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Master Krida Saka Milenial</h6>
        </div>
        <div class="card-body">
            <form id="krida_saka_milenial_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="mb-2">Krida Saka Milenial <span class="text-danger">*</span></label>
                            <input class="form-control" id="krida_saka_milenial" name="krida_saka_milenial" type="text" required
                            oninvalid="this.setCustomValidity('Krida Saka Milenial tidak boleh kosong')"
                            oninput="this.setCustomValidity('')" />
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-icon-split btn-sm float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script type="text/javascript">
        $("#krida_saka_milenial_form").on("submit", function(event) {
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
                    confirmButton: 'mr-2',
                    cancelButton: 'ml-2'
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
                        url: "{{ route('master.krida_saka_milenial.store') }}",
                        type: "POST",
                        data: new FormData($('#krida_saka_milenial_form')[0]),
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
                                    window.open("{{ route('master.krida_saka_milenial') }}", '_self');
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
                }
            })
            event.preventDefault();
        });
    </script>

</div>
@endsection
