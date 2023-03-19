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
                LOGIN
            </h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{url('p_login')}}" method="POST">
                    @csrf
                    <div>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="d-flex ">
                        <button type="submit">
                            MASUK
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