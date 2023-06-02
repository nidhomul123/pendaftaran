@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Formulir</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Formulir</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th width="70">Jenis Kelamin</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Pangkalan/Gudep</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Pangkalan/Gudep</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($participants as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->gender == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $item->birth_place }}, {{ date('d F Y', strtotime($item->birth_date)) }}</td>
                                <td>{{ $item->pangkalan_gudep }}</td>
                                <td class="text-center" width="100">
                                    @if ($item->trParticipantsRegistrationStatus)
                                        @if ($item->trParticipantsRegistrationStatus->status == 1)
                                            <span class="text-success"><b>Diterima</b></span>
                                        @else
                                            <span class="text-danger"><b>Ditolak</b></span>
                                        @endif
                                    @else
                                        <button class="btn btn-success btn-icon-split btn-sm mb-1 btn-accept" data-id="{{ $item->id }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Terima</span>
                                        </button>
                                        <button class="btn btn-danger btn-icon-split btn-sm btn-reject" data-id="{{ $item->id }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-times"></i>
                                            </span>
                                            <span class="text">Tolak</span>
                                        </button>
                                    @endif
                                    <a href="{{ route('form.detail', $item->id) }}" class="btn btn-info btn-icon-split btn-sm mt-1 btn-detail">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".btn-accept").on('click', function(event) {
            Swal.fire({
                title: 'Terima Peserta Pendaftaran',
                text: "Apakah anda yakin?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Terima',
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
                        url: "{{ route('form.accept') }}",
                        type: "POST",
                        data: {
                            id: $(this).data("id")
                        },
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
                                    location.reload();
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
        });

        $(".btn-reject").on('click', function(event) {
            Swal.fire({
                title: 'Tolak Peserta Pendaftaran',
                text: "Apakah anda yakin?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tolak',
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
                        url: "{{ route('form.reject') }}",
                        type: "POST",
                        data: {
                            id: $(this).data("id")
                        },
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
                                    location.reload();
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
        });
    </script>

</div>
@endsection
