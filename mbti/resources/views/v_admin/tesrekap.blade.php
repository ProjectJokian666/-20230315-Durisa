@extends('layout.app')

@push('csss')
<link  href="{{asset('asset/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">
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
    <div class="container">
        <div class="heading_container">
            <h2>
                REKAP DATA TES
            </h2>
        </div>
        <div class="item_container mt-5">
            <table class="table-sm text-center" cellpadding="0" id="hasilrekap" width="100%">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tgl Tes</th>
                    <th>Hasil</th>
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
<script>
    $(document).ready(function(){
      $('#hasilrekap').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : "{{url('tesrekap')}}"
        },
        columns: [
        { 
            data: null, "sortable":false,
            render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart+1
            } 
        },
        { data: 'id_users', name: 'id_users' },
        { data: 'tgl', name: 'tgl' },
        { data: 'jawaban', name: 'jawaban' },
        ]
    });  
  })
</script>
@endpush