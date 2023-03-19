@extends('layout.app')

@section('content')

<div class="hero_area">
    <!-- header section strats -->
    @include('layout.header')
    <!-- end header section -->
</div>
<!-- item section -->
<section class="contact_section layout_padding">
    <div class="design-box">
        <img src="{{asset('images/design-2.png')}}">
    </div>
    <div class="container">
        <div>
            <h2>
                DAFTAR AKUN
            </h2>
        </div>
    </div>
    <div class="container">
        @error('email')
        <div class="row justify-content-center">
            <div class="col-6">
                Email Anda Sudah Terdaftar
            </div>
        </div>
        <br>
        @enderror
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{url('p_daftar')}}" method="POST">
                    @csrf
                    <div>
                        <input type="text" name="name" placeholder="Name" />
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="d-flex ">
                        <button type="submit">
                            DAFTAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end item section -->
@endsection

@push('jss')
<script>

</script>
@endpush