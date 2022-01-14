@extends('layouts.app')

@section('app')
<main>
	<div>
	    <div class="row">
	        <div class="col-12">
	            <div class="card mb-4 mx-4">
	                <div class="card-header pb-0">
	                    <div class="d-flex flex-row justify-content-between">
	                        <div>
	                            <h5 class="mb-0">Rekapitulasi Bulanan</h5>
	                        </div>
	                        <div class="btn bg-gradient-primary btn-sm mb-0" type="date">{{ \Carbon\Carbon::now()->isoFormat('MMMM Y')
	                        }}</div>
	                    </div>
	                </div>
	                <div class="card-body px-0 pt-0 pb-2">
	                	@if($users->isEmpty())
	                	<div class="d-flex flex-row px-5 py-5 justify-content-center align-items-center">
	                        <div>
	                        	<img src="../assets/img/no_data.png" height="200" alt="No data">
	                            <p class="mb-0 text-center">Tidak ada data pegawai</p>
	                        </div>
                		</div>
	                	@else
		                    <div class="table-responsive p-0">
		                        <table class="table align-items-center mb-0">
		                            <thead>
		                                <tr>
		                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
		                                        Pegawai
		                                    </th>
		                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
		                                        Email
		                                    </th>
		                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
		                                        Jabatan
		                                    </th>
		                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
		                                        No. Telp
		                                    </th>
		                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
		                                        Jumlah Masuk
		                                    </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                            	@foreach($users as $user)
		                            	<tr>
		                                    <td class="text-center">
		                                    	<div class="d-flex flex-row justify-content-start align-items-center px-2">
		                                            <img src="{{ $user->foto ? url($user->foto) : url('assets\img\placeholder_avatar.png') }}" class="avatar avatar-sm me-3">
		                                        	<p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
		                                    	</div>
		                                    </td>
		                                    <td class="text-center">
		                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
		                                    </td>
		                                    <td class="text-center">
		                                        <p class="text-xs font-weight-bold mb-0">{{ $user->jabatan }}</p>
		                                    </td>
		                                    <td class="text-center">
		                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->phone }}</span>
		                                    </td>
		                                     <td class="text-center">
		                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->jumlah_masuk }}</span>
		                                    </td>
		                                </tr>
		                            	@endforeach
		                            </tbody>
		                        </table>
		                    </div>
	                    @endif
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</main>
@endsection