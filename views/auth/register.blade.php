@extends('layouts.base')

@section('content')
<section class="h-100-vh mb-8">
  <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
      style="background-image: url('../assets/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-5 text-center mx-auto">
                  <h1 class="text-white mb-2 mt-5">{{ __('Selamat datang') }}</h1>
                  <p class="text-lead text-white">
                      {{ __('Silahkan isi formulir dibawah ini untuk mendaftar') }}
                  </p>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
              <div class="card z-index-0">
                  <div class="card-header text-center pt-4">
                      <h5>{{ __('Register with') }}</h5>
                  </div>
                  <div class="card-body">
                      <form method="POST" action="{{ route('register') }}" role="form text-left">
                        @csrf

                          <div class="mb-3">
                              <div class="@error('name') border border-danger rounded-3  @enderror">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name"
                                      aria-label="Name">
                              </div>
                              @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="mb-3">
                              <div class="@error('email') border border-danger rounded-3 @enderror">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                                      aria-label="Email">
                              </div>
                              @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                           <div class="mb-3">
                              <div class="@error('jabatan') border border-danger rounded-3 @enderror">
                                  <input id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required placeholder="Jabatan"
                                      aria-label="Jabatan">
                              </div>
                              @error('jabatan') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                           <div class="mb-3">
                              <div class="@error('location') border border-danger rounded-3 @enderror">
                                  <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required placeholder="Alamat"
                                      aria-label="Alamat">
                              </div>
                              @error('lokasi') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                           <div class="mb-3">
                              <div class="@error('phone') border border-danger rounded-3 @enderror">
                                  <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="No Telepon"
                                      aria-label="No Telepon">
                              </div>
                              @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="mb-3">
                              <div class="@error('password') border border-danger rounded-3 @enderror">
                                  <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Password">
                              </div>
                              @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                          </div>
                          <div class="mb-3">
                              <div class="@error('password') border border-danger rounded-3 @enderror">
                                  <input id="password-confirm" name="password_confirmation" type="password" class="form-control" required placeholder="Confirm Password">
                              </div>
                          </div>
                          <div class="form-check form-check-info text-left">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                  checked>
                              <label class="form-check-label" for="flexCheckDefault">
                                  {{ __('I agree the') }} <a href="javascript:;"
                                      class="text-dark font-weight-bolder">{{ __('Terms
                                      and
                                      Conditions') }}</a>
                              </label>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                          </div>
                          <p class="text-sm mt-3 mb-0">{{ __('Already have an account? ') }}<a
                                  href="{{ route('login') }}"
                                  class="text-dark font-weight-bolder">{{ __('Sign in') }}</a>
                          </p>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
