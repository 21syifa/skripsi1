@extends('layouts.base.app')

@section('title', 'Data Hasil QC')

@section('breadcrumb')
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        {{-- @yield('breadcrumb') --}}
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Data Hasil QC</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Data Hasil QC {{ $data->id ? 'Edit' : 'Create' }}</li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
@endsection

@section('content')
    <form id="form_data" data-redirect-url="{{ route('data_hasil_qc') }}"
        action="{{ $data->id ? route('data_hasil_qc.update', $data->id) : route('data_hasil_qc.store') }}">
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <div class="tab-pane fade active show" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ $data->id ? 'Edit' : 'Create' }} Data Hasil QC</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row mb-5">
                                {{-- <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="hari" class="form-label">Hari</label>
                                    @php
                                        $daftarHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                    @endphp

                                    <select class="form-control" id="hari" name="hari">
                                        @foreach ($daftarHari as $hari)
                                            <option value="{{ $hari }}" {{ $data->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" value="{{ $data->tanggal }}"
                                            id="tanggal" placeholder="Tanggal" name="tanggal">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <select class="form-select" id="nama_produk" name="nama_produk">
                                            @foreach ($produks as $produk)
                                                <option @selected($data->nama_produk == $produk->id) value="{{ $produk->id }}">
                                                    {{ $produk->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="jenis_bahan" class="form-label">Jenis Bahan</label>
                                        <input type="text" class="form-control" value="{{ $data->jenis_bahan }}"
                                            id="jenis_bahan" placeholder="Jenis Bahan" name="jenis_bahan">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tebal_bahan" class="form-label">Tebal Bahan</label>
                                        <input type="number" class="form-control" value="{{ $data->tebal_bahan }}"
                                            id="tebal_bahan" placeholder="Tebal Bahan" name="tebal_bahan">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama_mesin" class="form-label">Nama Mesin</label>
                                        <input type="text" class="form-control" value="{{ $data->nama_mesin }}"
                                            id="nama_mesin" placeholder="Nama Mesin" name="nama_mesin">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="jumlah_cavity" class="form-label">Jumlah Cavity</label>
                                        <input type="number" class="form-control" value="{{ $data->jumlah_cavity }}"
                                            id="jumlah_cavity" placeholder="Jumlah Cavity" name="jumlah_cavity">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="status_pre" class="form-label">Status Pre</label>
                                        <select class="form-select" id="status_pre" name="status_pre">
                                            <option @selected($data->status_pre == 'OK') value="OK">OK</option>
                                            <option @selected($data->status_pre == 'NO') value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="dimensi" class="form-label">Dimensi</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="d-flex align-items-center">
                                                    <label class="form-check-label fs-6" for="dimensi_panjang">Panjang :
                                                    </label>
                                                    <input type="number" name="dimensi_panjang"
                                                        class="form-control form-control-sm w-50" placeholder=""
                                                        value="{{ $data->dimensi_panjang ?? '' }}">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="d-flex align-items-center">
                                                    <label class="form-check-label fs-6" for="dimensi_lebar">Lebar :
                                                    </label>
                                                    <input type="number" name="dimensi_lebar"
                                                        class="form-control form-control-sm w-50" placeholder=""
                                                        value="{{ $data->dimensi_lebar ?? '' }}">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="d-flex align-items-center">
                                                    <label class="form-check-label fs-6" for="dimensi_tinggi">Tinggi :
                                                    </label>
                                                    <input type="number" name="dimensi_tinggi"
                                                        class="form-control form-control-sm w-50" placeholder=""
                                                        value="{{ $data->dimensi_tinggi ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="aql_check" class="form-label">AQL Check</label>
                                        <input type="text" class="form-control" value="{{ $data->aql_check }}"
                                            id="aql_check" placeholder="AQL Check" name="aql_check">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="inline" class="form-label">Inline</label>
                                        <select class="form-select" id="inline" name="inline">
                                            <option @selected($data->inline == 'Thermolid') value="Thermolid">Thermolid</option>
                                            <option @selected($data->inline == 'Vacuum') value="Vacuum">Vacuum</option>
                                            <option @selected($data->inline == 'Sortir Atas') value="Sortir Atas">Sortir Atas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="point_critical" class="form-label">Point Critical</label>
                                        <input type="text" class="form-control" value="{{ $data->point_critical }}"
                                            id="point_critical" placeholder="Point Critical" name="point_critical">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="javascript:history.back()" id="kt_ecommerce_add_product_cancel"
                    class="btn btn-light me-5">Cancel</a>


                <button type="submit"
                    onclick="handleUpload('form_btn', 'form_data', '{{ $data->id ? 'PATCH' : 'POST' }}');"
                    class="btn btn-primary" id="form_btn">
                    <span class="indicator-label">
                        Simpan
                    </span>

                    <span class="indicator-progress" style="display: none;">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        </div>
    </form>

@endsection

@push('script_processing')
    <script>
        var textarea = $('#description');
        var newValue = $('#value_desc').val();
        textarea.val(newValue);
    </script>
@endpush
