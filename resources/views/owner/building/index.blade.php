@extends('layouts.admin.app')

@section('title')
	Daftar Ruangan
@endsection

@section('pageName')
	Ruangan
@endsection

@section('subPageName')
	List
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid py-4">
		<div class="row">
            <div class="col-md">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Daftar Ruangan Terdaftar</h6>
                    </div>
                    <div class="card-body pb-3 pt-2">
                        <div class="table-responsive p-0">
                            <table class="align-items-center mb-0 table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Ruangan</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama Pemilik</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Alamat</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Range Harga</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <p class="font-weight-bold mb-0 text-sm">Suparmen</p>
                                        </td>
                                        <td class="text-center align-middle text-sm">
                                            <p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
                                        </td>
                                        <td class="text-center align-middle text-sm">
                                            <span class="font-weight-bold text-sm">Rp. 3.000.000</span>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <p class="font-weight-bold mb-0 text-sm">Suwito</p>
                                        </td>
                                        <td class="text-center align-middle text-sm">
                                            <p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
                                        </td>
                                        <td class="text-center align-middle text-sm">
                                            <span class="font-weight-bold text-sm">Rp. 3.000.000</span>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <p class="font-weight-bold mb-0 text-sm">Fabiano</p>
                                        </td>
                                        <td class="text-center align-middle text-sm">
                                            <p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="font-weight-bold text-sm">Rp. 3.000.000</span>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <p class="font-weight-bold mb-0 text-sm">Eseteban</p>
                                        </td>
                                        <td class="text-center align-middle text-sm">
                                            <p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="font-weight-bold text-sm">Rp. 3.000.000</span>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <p class="font-weight-bold mb-0 text-sm">Charles</p>
                                        </td>
                                        <td class="text-center align-middle text-sm">
                                            <p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="font-weight-bold text-sm">Rp. 3.000.000</span>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <p class="font-weight-bold mb-0 text-sm">Verstapen</p>
                                        </td>
                                        <td class="text-center align-middle text-sm">
                                            <p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="font-weight-bold text-sm">Rp. 3.000.000</span>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		@include('layouts.admin.footer')
	</div>
@endsection

@section('script')
@endsection
