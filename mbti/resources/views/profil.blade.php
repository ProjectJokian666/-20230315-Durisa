@extends('layout.app')

@section('content')

<div class="hero_area">
    <!-- header section strats -->
    @include('layout.header')
    <!-- end header section -->
</div>
<!-- item section -->
<div class="contact_section layout_padding2">
    <div class="container">
        <div class="heading_container">
            <h2>
                PROFIL
            </h2>
        </div>
        @if(session('sukses'))
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('sukses')}}
                </div>
            </div>
        </div>
        @endif
        @if(session('gagal'))
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('gagal')}}
                </div>
            </div>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('pprofil')}}" method="POST">
                    @csrf
                    <div>
                        <input type="text" name="name" placeholder="Nama" value="{{Auth()->user()->name}}">
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email" value="{{Auth()->user()->email}}">
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="d-flex ">
                        <button type="submit">
                            UBAH
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end item section -->
@endsection

@push('jss')
<script>

</script>
@endpush