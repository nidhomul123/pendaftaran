@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card mb-4 border-left-info">
                <div class="card-body">
                    <table>
                        <tbody>
                            <tr>
                                <td><b>Status Pendaftaran</b></td>
                                <td>&nbsp;&nbsp;:&nbsp;</td>
                                <td>{!! $registration_status !!}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Pendaftaran</b></td>
                                <td>&nbsp;&nbsp;:&nbsp;</td>
                                <td>{{ $registration_datetime }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
