@extends('layout.app')

@section('content')
<div class="hero_area">
    <!-- header section strats -->
    @include('layout.header')
    <!-- end header section -->

    <!-- slider section -->
    <section class=" slider_section position-relative">
        <div class="design-box">
            <img src="{{asset('images/design-1.png')}}" alt="">
        </div>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail_box">
                                    <h2>
                                        <span>Cari tahu</span>
                                        <hr>
                                    </h2>
                                    <h1>
                                        Pribadimu
                                    </h1>
                                    <p>
                                        MBTI dapat membantumu untuk menemukan tipe kepribadianmu, satu dari enam belas jenis kepribadian. Cari tahu kepribadianmu dan gali potensimu!
                                    </p>
                                    <div>
                                        <a href="{{url('teskepribadian')}}">Ambil Tes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{asset('images/16personalities_trait_extraverted.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end slider section -->
</div>

<!-- about section -->
<section class="about_section layout_padding2-top layout_padding-bottom">
    <div class="design-box">
        <img src="{{asset('images/design-2.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            About MBTI
                        </h2>
                    </div>
                    <p>
                        Myers-Briggs Type Indicator atau disingkat MBTI merupakan sebuah instrumen pengukuran berbentuk kuisioner yang digunakan untuk membaca tipe kepribadian seseorang dalam lingkungannya. Myers-Briggs Type Indicator adalah instrumen psikotes yang dirancang
                        untuk mengukur preferensi psikologis seseorang dalam melihat dunia dan membuat sebuah keputusan.
                    </p>
                    <div>
                        <a href="{{url('aboutmbti')}}">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box">
                    <img src="{{asset('images/16personalities_trait_intuitive.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end about section -->
@endsection