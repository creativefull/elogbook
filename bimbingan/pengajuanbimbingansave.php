<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;
$id=0;
$idtugas=$_POST["idtugas"];
$keteranganpengajuan=$_POST["keteranganpengajuan"];
$direncanakanjan=$_POST["direncanakanjan"];
$tanggal=$_POST["direncanakantgl"];

$tahun=$obj->mid($tanggal,6,4);
$bulan=$obj->mid($tanggal,3,2);
$tgl=$obj->mid($tanggal,0,2);
$tglfilter=$tahun."/".$bulan."/".$tgl;

if ($id==0)
{
	$connect = new mysqli($hostname,$username, $password,  $database);
	$nilaiid=0;
	$connect->close();
	$connect = new mysqli($hostname,$username, $password,  $database);
	$query='INSERT INTO `eventschedulebimbingan`(`tugasid`,`statusid`,direncanakantgl,tanggaldiajukan,`direncanakanjan`,`keteranganpengajuan`) select '.$idtugas.',1,"'.$tglfilter.'",SYSDATE(),"'.$direncanakanjan.'","'.$keteranganpengajuan.'"';
		if ($connect->query($query) === TRUE) {
			//echo $query;			
		    echo "<script>RefreshProd()</script>";
		} else {
		    echo "Error: " . $query . "<br>" . $connect->error;
		    echo "<script>MessageAction("."Error: " . $query . "<br>" . $connect->error.")</script>";
		}	
}
else {
		$connect = new mysqli($hostname,$username, $password,  $database);
		$query='UPDATE tugas set pembimbingsatuid='.$pembimbingsatuid.
		',pembimbingduaid='.$pembimbingduaid.' Where id='.$id;
/*
		if ($connect->query($query) === TRUE) {
		    echo "<script>MessageAction('Update record successfully')</script>";
		} else {
		    echo "Error: " . $query . "<br>" . $connect->error;
		    echo "<script>MessageAction("."Error: " . $query . "<br>" . $connect->error.")</script>";
		} */
	}
?>

