@extends('layouts.base')

@section('content')
@include('layouts.navbars.sidebar')
<div class="main-content position-relative bg-gray-100">
    @include('layouts.navbars.nav')
    <main>
        <div class="container-fluid">
            @yield('app')
            {{-- <div class="row">
                @include('layouts.footers.footer')
            </div> --}}
        </div>
    </main>
</div>
@endsection