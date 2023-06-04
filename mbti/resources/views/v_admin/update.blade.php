@extends('layout.app')

@push('csss')
<style type="text/css">
    .fadd form{
        padding-right: 35px;
    }

    .fadd input {
      width: 100%;
      border: none;
      height: 50px;
      margin-bottom: 25px;
      padding-left: 25px;
      background-color: transparent;
      outline: none;
      color: #101010;
      -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.16);
      box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.16);
  }

  .fadd input::-webkit-input-placeholder {
      color: #131313;
  }

  .fadd input:-ms-input-placeholder {
      color: #131313;
  }

  .fadd input::-ms-input-placeholder {
      color: #131313;
  }

  .fadd input::placeholder {
      color: #131313;
  }

  .fadd input.message-box {
      height: 120px;
  }

</style>
@endpush

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
                UBAH AKUN ADMIN
            </h2>
        </div>
    </div>
    <div class="item_container mt-5">
        @error('email')
        <div class="row justify-content-center">
            <div class="col-6">
                {{$message}}
            </div>
        </div>
        <br>
        @enderror
        <div class="row justify-content-center">
            <div class="col-6 fadd">
                <form action="{{url('data/ubah',$data['user']->id_user)}}" method="POST">
                    @csrf
                    <div>
                        <input type="text" name="name" placeholder="Name" value="{{$data['user']->name}}">
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email" value="{{$data['user']->email}}">
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="d-flex mb-5">
                        <button type="submit" class="btn btn-sm btn-success text-white">
                            UBAH
                        </button>
                        <a href="{{url('data')}}" class="btn btn-sm btn-dark ml-auto">KEMBALI</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('jss')
<script>

</script>
@endpush