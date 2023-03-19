<?php 
//asumsi data masih kosong
$a = 1;
$id = 0;

//perulangan untuk cek di db
$posisi = true
while($posisi){
	//cek di db
	$data = select id from table trx where id=$a;
	//jika data ada maka akan langsung diulang lagi
	if($data){
		$a=+1;
		$posisi=true;
	}
	//jika data tidak ada maka akan dilakukan insert dan id  
	else{
		insert into table idnya;
		$id=$a;
		$posisi=false;
	}
}
//data id sudah siap digunakan
$id;
?>