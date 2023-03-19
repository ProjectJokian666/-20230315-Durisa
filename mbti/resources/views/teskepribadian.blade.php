@extends('layout.app')

@section('content')

<div class="hero_area">
    <!-- header section strats -->
    @include('layout.header')
    <!-- end header section -->
</div>

<!-- item section -->
<div class="price_section layout_padding2">
    <div class="container" id="data_tes">
        <div class="heading_container">
            <h2>
                TES KEPRIBADIAN
            </h2>
        </div>
        @auth
        @if($data['hasil']==null)
        <div id="l_d1">
            @include('tes.d1')
        </div>
        <div id="l_d2">
            @include('tes.d2')
        </div>
        <div id="l_d3">
            @include('tes.d3')
        </div>
        <div id="l_d4">
            @include('tes.d4')
        </div>
        <div id="l_d5">
            @include('tes.finish')
        </div>
        @else
        <div id="l_d5">
            @include('tes.finish')
        </div>
        @endif
        @else
        <div id="">
            @include('tes.login')
        </div>
        @endauth
    </div>
</div>
<!-- end item section -->
@endsection
@push('jss')
<script>
    var situasi = "<?php echo $data['isi']; ?>";
    if (situasi) {
        $('#l_d1').hide();
        $('#l_d2').hide();
        $('#l_d3').hide();
        $('#l_d4').hide();
        $('#l_d5').show();
        let d_d1 = 0;
        let d_d2 = 0;
        let d_d3 = 0;
        let d_d4 = 0;
    }
    else{
        $('#l_d1').show();
        $('#l_d2').hide();
        $('#l_d3').hide();
        $('#l_d4').hide();
        $('#l_d5').hide();
        let d_d1 = 0;
        let d_d2 = 0;
        let d_d3 = 0;
        let d_d4 = 0;
    }
</script>
@endpush