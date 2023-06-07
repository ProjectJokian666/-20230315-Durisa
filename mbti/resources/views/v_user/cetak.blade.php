<!DOCTYPE html>
<html>

<head>
	<!-- Basic -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- Site Metas -->
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title>
		MBTI-FYS
		@if(Auth::check())
		{{Auth::user()->name}}
		@endif
	</title>

	<!-- slider stylesheet -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

	<!-- bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

	<!-- fonts style -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet"> -->
	<!-- Custom styles for this template -->
	<link href="{{asset('css/style.css')}}" rel="stylesheet" />
	<!-- responsive style -->
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
</head>

<body <?= request()->is('index')? '':'class="sub_page"'; ?>>

	<div class="hero_area">
		<!-- header section strats -->
		@include('layout.header')
		<!-- end header section -->
	</div>

	<div class="price_section layout_padding2" id="hasil-ada">
		<div class="container">
			<div id="l_d5">
				<div class="item_container row justify-content-center">
					<div class="col-6">
						<img src="" alt="" id="hasilimg">
					</div>
					<div class="col-6">
						<div class="price">
							<h5 id="hasiltype"></h5>
						</div>
						<div class="price">
							<h5 id="hasilkep"></h5>
						</div>
						<div class="price">
							<p id="hasildes"></p>
						</div>
					</div>
				</div>
			</div>        	
		</div>
	</div>

	<div class="price_section layout_padding2" id="hasil-belum">
		<div class="container">
			<div id="l_d5">

				<div class="item-container">
					<div class="row row-cols-6 row-cols-md-6 g-6 justify-content-center">
						<div class="col-6">
							<div class="text-center">
								<p class="card-title">HASIL TES ANDA</p>
								<p class="card-text"> BELUM BISA DITAMPILKAN </p>
								<a href="{{url('teskepribadian')}}" class="btn btn-info">TES KEPRIBADIAN</a>
							</div>
						</div>
					</div>
				</div>

			</div>        	
		</div>
	</div>

	<div>
		
	</div>

	<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
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
						$('#hasil-belum').hide();
						hasil()
                    // console.log('ya')
					}
					else{
						$('#l_d5').hide();
						$('#hasil-belum').hide();
						$('#hasil-belum').show();
						// console.log('tidak')
					}
				}
			});
		},1);

		function hasil() {
			$.ajax({
				type:"GET",
				url:"{{route('hasil')}}",
				success:function(data){
					if (data!="kosong") {
						if ($('#hasilimg').attr('src')!="{{asset('images')}}"+"/"+data.gambar) {
							$('#hasilimg').attr('src','');
							$('#hasilimg').attr('src',"{{asset('images')}}"+"/"+data.gambar);
						}
						if ($('#hasiltype').html()!="<b>"+data.type+"</b>") {
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
					}
					if ($('#hasilimg').attr('src')) {
						setInterval(function () {
							window.print()
						},1000)
						// console.log($('#hasilimg').attr('src'));
					}
					// console.log("{{asset('images')}}"+"/"+data.gambar);
					// const data_file = "{{asset('images')}}"+"/"+data.gambar;
					// fetch(data_file)
					// .then(response=>{
					// 	if (response.ok) {
					// 		windows.print()
					// 	}
					// 	else{
					// 		console.log('aaa')
					// 		hasil();
					// 	}
					// })
					// .catch(error=>{
					// 	console.log()
					// 	hasil();
					// });
				}
			})
		}

	</script>
</body>

</html>