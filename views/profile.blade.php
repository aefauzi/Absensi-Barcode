@extends('layouts.app')

@section('app')
<main>
    <form action="{{ url('/profile-update') }}" method="POST"  enctype="multipart/form-data" role="form text-left">
        @csrf

        <div>
            <div class="container-fluid">
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                    <span class="mask bg-gradient-primary opacity-6"></span>
                </div>
                <div class="card card-body blur shadow-blur mx-4 mt-n6">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img id="img-profile" src="{{ Auth::user()->foto ? url(Auth::user()->foto) : url('assets\img\placeholder_avatar.png') }}" class="w-100 border-radius-lg shadow-sm">
                                <label for="foto">
                                    <a class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                        <i class="fas fa-camera" title="Edit Image"></i>
                                        <input type="file" id="foto" name="foto" onchange="onFileSelected(event)">
                                    </a>
                                </label>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ Auth::user()->name }}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                        </div>
                        {{-- <div class="col d-flex justify-content-end align-items-center">
                            <a href="{{ url('/qrcode/' . Auth::user()->id) }}">
                                <i class="fas fa-qrcode fa-2x"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Informasi Profil</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Nama</label>
                                    <div class="@error('name')border border-danger rounded-3 @enderror">
                                        <input id="name" name="name" class="form-control" type="text" placeholder="Name" value="{{ Auth::user()->name }}">
                                    </div>
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input id="email" name="email" class="form-control" type="email"
                                            placeholder="Email" value="{{ Auth::user()->email }}">
                                    </div>
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jabatan" class="form-control-label">Jabatan</label>
                                    <div class="@error('jabatan')border border-danger rounded-3 @enderror">
                                        <input id="jabatan" name="jabatan" class="form-control" type="text" placeholder="Jabatan" value="{{ Auth::user()->jabatan }}">
                                    </div>
                                    @error('jabatan') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location" class="form-control-label">Alamat</label>
                                    <div class="@error('location')border border-danger rounded-3 @enderror">
                                        <input id="location" name="location" class="form-control" type="text"
                                            placeholder="Alamat" value="{{ Auth::user()->location }}">
                                    </div>
                                    @error('location') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-control-label">No Telepon</label>
                                    <div class="@error('phone')border border-danger rounded-3 @enderror">
                                        <input id="phone" name="phone" class="form-control" type="tel" placeholder="No Telepon" value="{{ Auth::user()->phone }}">
                                    </div>
                                    @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>

                        <h6 class="mt-5">Informasi Keamanan</h6>

                        <div class="row pt-4 ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password Baru</label>
                                    <div class="@error('password')border border-danger rounded-3 @enderror">
                                        <input id="password" name="password" class="form-control" type="password"
                                            placeholder="Password">
                                    </div>
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm" class="form-control-label">Konfirmasi Password Baru</label>
                                    <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                        <input id="password-confirm" name="password_confirmation" class="form-control" type="password"
                                            placeholder="Confirm Password" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script type="text/javascript">
    function onFileSelected(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("img-profile");
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
</script>
@endsection