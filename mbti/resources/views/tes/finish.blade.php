<div class="item_container">
    <div class="row row-cols-6 row-cols-md-6 g-6 justify-content-center">
        <div class="col-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-title">HASIL TES ANDA ADALAH</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <input type="radio" id="d411" name="d41" value="1">
                            <label for="d411">Sangat Tidak Setuju</label>
                        </div>
                        <div class="col-12">
                            <input type="radio" id="d412" name="d41" value="2">
                            <label for="d412">Tidak Setuju</label>
                        </div>
                        <div class="col-12">
                            <input type="radio" id="d413" name="d41" value="3">
                            <label for="d413">Setuju</label>
                        </div>
                        <div class="col-12">
                            <input type="radio" id="d414" name="d41" value="4">
                            <label for="d414">Sangat Setuju</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('jss')
<script>
    $(document).on('click','#b_d4',function() {
        // d_d4=d_d4+1;
        // console.log(d_d1);
        document.body.scrollTop=0;
        document.documentElement.scrollTop = 0;
        $('#l_d1').hide();
        $('#l_d2').hide();
        $('#l_d3').hide();
        $('#l_d4').hide();
        console.log(d_d1,d_d2,d_d3,d_d4);
    })
</script>
@endpush