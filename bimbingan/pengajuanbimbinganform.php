<?php if (!isset($_SESSION)) {
        session_start();
    } 
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$active="";
$idtugas=$_POST["id"];
$Db='../ToMysql.php';
$connect = new mysqli($hostname,$username, $password,  $database);
$sql="SELECT eventb.id,eventb.`pertemuanygke`,eventb.`direncanakantgl`,eventb.direncanakanjan,
eventb.`disetujuijam`,eventb.`disetujuitgl`,eventb.`disetujuijam`
,eventb.`statusid`,eventb.`realisasitgl`,eventb.`realisasijam`,
eventb.keteranganpengajuan,eventb.keteranganpembimbing 
FROM `eventschedulebimbingan` eventb
INNER JOIN `tugas` ON eventb.`tugasid`=tugas.id Where eventb.id=".$_POST["idpengajuan"];
//Where eventb.ygdibimbingid=
$query = mysqli_query($connect,$sql,MYSQLI_USE_RESULT) or die("Gagal mengambil data");
	$id=0;
	$direncanakanjan="";
	$pertemuanygke=0;
	$direncanakantgl="";
	$disetujuijam="";
	$disetujuitgl="";
	$disetujuijam="";
	$statusid=0;
	$realisasitgl="";
	$realisasijam="";
	$keteranganpengajuan="";
	$keteranganpembimbing="";
while($row = mysqli_fetch_assoc($query)) {
	$id=$row["id"];
	$pertemuanygke=$row["pertemuanygke"];
	$direncanakantgl=$row["direncanakantgl"];
	$direncanakanjan=$row["direncanakanjan"];
	$disetujuijam=$row["disetujuijam"];
	$disetujuitgl=$row["disetujuitgl"];
	$disetujuijam=$row["disetujuijam"];
	$statusid=$row["statusid"];
	$realisasitgl=$row["realisasitgl"];
	$realisasijam=$row["realisasijam"];
	$keteranganpengajuan=$row["keteranganpengajuan"];
	$keteranganpembimbing=row["keteranganpembimbing"];
}

     echo '<script>$("#headformid").html('."'".'<a href="#" onClick="savebimbinganpengajuan(0,'.$idtugas.');" class="btn btn-info menu">Save</a><a href="#"  class="btn btn-info menu pull-right" onClick="LoadTablebimbingan();">Cancel</a>'."'".')</script>';
echo '<input type="hidden" id="idtugas" value='.$_POST["id"].' >';


$Class=" Style='Width:280px;'";
echo $obj->inputtextareaNew("Keterangan Pengajuan ","keteranganpengajuan","Keterangan Pengajuan ",$keteranganpengajuan,$active,$Class,"class='form-control'") ;


$Class=" Style='Width:220px'";
echo $obj->inputtext("Tanggal rencana bimbingan   ","direncanakantgl","Tanggal rencana bimbingan ",$direncanakantgl,$active,$Class," data-date-format='dd-mm-yyyy' class='form-control date-picker'") ;


$Class=" Style='Width:220px'";
echo $obj->inputtext("Jam rencana bimbingan   ","direncanakanjan","jam rencana bimbingan ",$direncanakantgl,$active,$Class," style='width:80px;'  class='form-control'") ;
?>

<script type="text/javascript">
	 $('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				
				
</script>