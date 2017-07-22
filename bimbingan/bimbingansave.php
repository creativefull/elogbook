<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;

$id=$_POST["id"];
$judultugas=$_POST["judultugas"];	
$jumlahpertemuan=$_POST["jumlahpertemuan"];	
$keterangan=$_POST["keterangan"];	
$pembimbingduaid=$_POST["pembimbingduaid"];	
$pembimbingsatuid=$_POST["pembimbingsatuid"];	
$semesterid=$_POST["semesterid"];
$tanggalmulai=$_POST["tanggalmulai"];	
$ygdibimbingid=$_POST["ygdibimbingid"];	

$tanggal=$_POST["tanggalmulai"];
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
	$query='INSERT INTO `tugas`(`ygdibimbingid`,`pembimbingsatuid`,`pembimbingduaid`,`tanggalmulai`,`semesterid`,`judultugas`,`keterangan`,`jumlahpertemuan`) 
	select '.$ygdibimbingid.",".$pembimbingsatuid.",".$pembimbingduaid
	.",'".$tglfilter."',".$semesterid.",'".$judultugas."','".$keterangan."',".$jumlahpertemuan;
		if ($connect->query($query) === TRUE) {
		    echo "<script>MessageAction('New record created successfully')</script>";
		} else {
		    echo "Error: " . $query . "<br>" . $connect->error;
		    echo "<script>MessageAction("."Error: " . $query . "<br>" . $connect->error.")</script>";
		}	
}
else {
		$connect = new mysqli($hostname,$username, $password,  $database);
		$query='UPDATE tugas set pembimbingsatuid='.$pembimbingsatuid.
		',pembimbingduaid='.$pembimbingduaid.' Where id='.$id;

		if ($connect->query($query) === TRUE) {
		    echo "<script>MessageAction('Update record successfully')</script>";
		} else {
		    echo "Error: " . $query . "<br>" . $connect->error;
		    echo "<script>MessageAction("."Error: " . $query . "<br>" . $connect->error.")</script>";
		}
	}
?>

