<?php if (!isset($_SESSION)) {
        session_start();
    } 
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$active="";

$Db='../ToMysql.php';
$connect = new mysqli($hostname,$username, $password,  $database);

$sql="SELECT tugas.judultugas,tugas.semesterid,dosen2.username namadosen2,dosen2.username namadosen,`tugas`.pembimbingsatuid,`tugas`.pembimbingduaid,
tugas.`keterangan`,semester.`namasemester`,tugas.`tanggalmulai` ,mahasiswa.`username` nmmahasiswa,tugas.`jumlahpertemuan` , tugas.`id`,`tugas`.`ygdibimbingid` FROM `tugas`
INNER JOIN `usertbl` mahasiswa ON `tugas`.`ygdibimbingid`=mahasiswa.`id`
INNER JOIN `usertbl` dosen ON `tugas`.pembimbingsatuid=dosen.`id`
inner join `usertbl` dosen2 ON `tugas`.pembimbingduaid=dosen2.id
INNER JOIN `semester` ON tugas.id=".$_POST["id"];

$query = mysqli_query($connect,$sql,MYSQLI_USE_RESULT) or die("Gagal mengambil data");
	$judultugas="";
	$keterangan="";
	$namasemester="";
	$tanggalmulai="";
	$nmmahasiswa="";
	$jumlahpertemuan=0;
	$ygdibimbingid=0;
	$semesterid=0;
	$pembimbingduaid=0;
	$pembimbingsatuid=0;
	$namadosen2="";
	$namadosen="";
while($row = mysqli_fetch_assoc($query)) {
	$judultugas=$row["judultugas"];
	$keterangan=$row["keterangan"];
	$namasemester=$row["namasemester"];
	$tanggalmulai=$row["tanggalmulai"];
	$nmmahasiswa=$row["nmmahasiswa"];
	$jumlahpertemuan=$row["jumlahpertemuan"];
	$ygdibimbingid=$row["ygdibimbingid"];
	$semesterid=$row["semesterid"];
	$ygdibimbingid=$row["ygdibimbingid"];
	$pembimbingduaid=$row["pembimbingduaid"];
	$pembimbingsatuid=$row["pembimbingsatuid"];
	$namadosen2=$row["namadosen2"];
	$namadosen=$row["namadosen"];
}
if ($_SESSION["admin"]!=1)
{
 $active=" disabled ";
 echo '<script>$("#headformid").html('."'".'<a href="#"  class="btn btn-info menu pull-right" onClick="LoadTablebimbingan();">Cancel</a>'."'".')</script>';
}
if ($_SESSION["admin"]==1)
{
echo '<script>$("#headformid").html('."'".'<a href="#" onClick="savebimbingan();" class="btn btn-info menu">Save</a><a href="#"  class="btn btn-info menu pull-right" onClick="LoadTablebimbingan();">Cancel</a>'."'".')</script>';
echo '<input type="hidden" id="idtugas" value='.$_POST["id"].' >';
}
$cmb = $obj->comboMahasiswa("ygdibimbingid",$Db,$ygdibimbingid,$nmmahasiswa);
echo $obj->ComboSelectGeneralValue("Mahasiswa/wi ",$cmb,$ygdibimbingid);

$Class=" Style='Width:280px;'";
echo $obj->inputtext("Judul Tugas ","judultugas","Judul Tugas ",$judultugas,$active,$Class,"class='form-control'") ;

$Class=" Style='Width:280px;'";
echo $obj->inputtextareaNew("Keterangan ","keterangan","Keterangan",$keterangan,$active,$Class," class='form-control' ");

$cmb = $obj->comboSemester("semesterid",$Db,$semesterid,$namasemester,$active);
echo $obj->ComboSelectGeneralValue("Semester ",$cmb,$semesterid);

$Class=" Style='Width:220px'";
echo $obj->inputtext("Tanggal dimulai   ","tanggalmulai","Tanggal dimulai ",$tanggalmulai,$active,$Class," data-date-format='dd-mm-yyyy' class='form-control date-picker'") ;

$pembimbingduaid=$row["pembimbingduaid"];
$pembimbingsatuid=$row["pembimbingsatuid"];
$namadosen2=$row["namadosen2"];
$namadosen=$row["namadosen"];

$cmb = $obj->combopembimbing("pembimbingsatuid",$Db,$pembimbingsatuid,$namadosen,$active);
echo $obj->ComboSelectGeneralValue("Dosen Pembimbing 1",$cmb,$pembimbingsatuid);

$cmb = $obj->combopembimbing("pembimbingduaid",$Db,$pembimbingduaid,$namadosen2,$active);
echo $obj->ComboSelectGeneralValue("Dosen Pembimbing 2",$cmb,$pembimbingduaid);

?>

<script type="text/javascript">
	 $('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				
				
</script>