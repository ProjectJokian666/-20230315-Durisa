@extends('layout.app')

@push('csss')
<style>

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
    @if(session('sukses'))
    <div class="container" id="alert-data">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-success">
                    {{session('sukses')}}
                </div>
            </div>
        </div>
        <br>
    </div>
    @endif
    <div class="container">
        <div class="heading_container">
            <h2>
                DATA AKUN ADMIN
            </h2>
            <div class="ml-auto">
                <a href="{{url('add')}}" class="btn btn-sm btn-dark">
                    TAMBAH
                </a>
            </div>
        </div>
        <div class="item_container mt-5">
            <table class="table-sm text-center" cellpadding="0" id="data" width="100%">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- end item section -->
@endsection

@push('jss')
<script src="{{asset('asset/datatables/jquery.js')}}"></script>
<script src="{{asset('asset/datatables/jquery.dataTables.min.js')}}"></script>
<link  href="{{asset('asset/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">
<script>
    setInterval(
        function () {
            $('#alert-data').hide();
        }, 3000);
    $(document).ready(function(){
      $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : "{{url('data')}}"
        },
        columns: [
        { 
            data: null, "sortable":false,
            render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1
            } 
        },
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { 
            data: null,
            render:function(data,type,row,meta){
                return ''+
                '<a href="{{url("data")}}'+"/ubah/"+data.id_user+'" class="btn btn-sm btn-info">UBAH</a>'+
                '<a href="{{url("data")}}'+"/hapus/"+data.id_user+'" class="btn btn-sm btn-danger">HAPUS</a>';
            } 
        },
        ]
    });  
  })
</script>
@endpush