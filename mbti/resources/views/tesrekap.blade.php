@extends('layout.app')

@section('content')

<div class="hero_area">
    <!-- header section strats -->
    @include('layout.header')
    <!-- end header section -->
</div>

<!-- item section -->
<div class="price_section layout_padding2">
    <div class="container">
        <div class="heading_container">
            <h2>
                REKAP DATA TES
            </h2>
        </div>
    </div>
</div>
<!-- end item section -->
@endsection

@push('jss')
<script>

</script>
@endpush