<div class="item_container">
    <div class="row row-cols-6 row-cols-md-6 g-6 justify-content-center">
        <div class="col-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-title">HASIL TES ANDA ADALAH</p>
                </div>
                <div class="card-footer">
                    <div id="hasil-ada">
                        <img src="" class="card-img-top" alt="" id="hasilimg">
                        <div class="card-body">
                            <h5 class="card-title" id="hasiltype"></h5>
                            <p class="card-text" id="hasilkep"></p>
                            <p class="card-text" id="hasildes"></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{url('cetak')}}" target="_blank" class="btn btn-sm btn-info text-white">DOWNLOAD HASIL</a>
                        </div>
                    </div>
                    <div id="hasil-belum">
                        <p class="card-text"> HASIL BELUM BISA DITAMPILKAN </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('jss')
<script>
    $('#hasil-ada').hide();
    $('#hasil-belum').hide();

    setInterval(function(){
        $.ajax({
            type:"GET",
            url:"{{route('cek')}}",
            success:function(data){
                if (data=="true") {
                    if ($('#l_d5').hide()) {
                        $('#l_d5').show();
                    }
                    $('#hasil-ada').show();
                    hasil()
                    // console.log('ya')
                }
                else{
                    $('#l_d5').hide();
                    // console.log('tidak')
                }
            }
        });
    },1000);

    function hasil() {
        $.ajax({
            type:"GET",
            url:"{{route('hasil')}}",
            success:function(data){
                if (data!="kosong") {
                    // const data_image = $('#hasilimg').attr('src');
                    // const data_type = $('#hasiltype').html();
                    // const data_kep = $('#hasilkep').html();
                    // const data_des = $('#hasildes').html();
                    // console.log('if');
                    // console.log($('#hasilimg').attr('src'));
                    // console.log($('#hasilimg').attr('src',"{{asset('images')}}"+"/"+data.gambar));
                    if ($('#hasilimg').attr('src')!="{{asset('images')}}"+"/"+data.gambar) {
                        // console.log($('#hasiltype').html());
                        $('#hasilimg').attr('src','');
                        $('#hasilimg').attr('src',"{{asset('images')}}"+"/"+data.gambar);
                    }
                    if ($('#hasiltype').html()!="<b>"+data.type+"</b>") {
                        // console.log($('#hasiltype').html());
                        $('#hasiltype').empty();
                        $('#hasiltype').append("<b>"+data.type+"</b>");
                    }
                    if ($('#hasilkep').html()!="<b>"+data.kepribadian+"</b>") {
                        $('#hasilkep').empty();
                        $('#hasilkep').append("<b>"+data.kepribadian+"</b>");
                    }
                    if ($('#hasildes').html()!="<b>"+data.deskripsi+"</b>") {
                        $('#hasildes').empty();
                        $('#hasildes').append(data.deskripsi);
                    }
                    // console.log('endif');
                    // console.log(data_type);
                    // console.log($('#hasiltype').html())
                    // console.log(data.type);
                    // console.log(data);
                }
            }
        })
    }
</script>
@endpush