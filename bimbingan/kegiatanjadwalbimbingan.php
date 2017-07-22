<?php if (!isset($_SESSION)) {
        session_start();
    } 
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$tugasid=$_POST["tugasid"];
$Db="../class/myclass.php";
$st=0;
$count =0;

$connect = new mysqli($hostname,$username, $password,  $database);
$var1="1"; 

$sql="SELECT eventb.id, eventb.`tanggaldiajukan`,eventb.`tanggaldiajukan`, eventb.`direncanakantgl`,eventb.`direncanakanjan`,
eventb.`tugasid`,eventb.`disetujuitgl`,eventb.`disetujuijam`,eventb.`statusid`,eventb.`realisasitgl`,
eventb.`realisasijam`,eventb.`keteranganpengajuan`,eventb.`keteranganpembimbing`,
statusbimbingan.`keterangan` keteranganstatus
FROM `eventschedulebimbingan` eventb 
INNER JOIN `statusbimbingan` ON eventb.`statusid`=`statusbimbingan`.id
WHERE eventb.`tugasid`=".$tugasid;

 
$query = mysqli_query($connect,$sql,MYSQLI_USE_RESULT) or die("Gagal mengambil data");
?>
<table class='<?php echo $obj->TableHeadHead();?>'>
	<thead>
        <tr class="yellow">
		<th >Keterangan</th>
        <th >Tanggal</th>
        <th >Jam</th>
        <th >Status</th>
        </tr>
        </thead>
         <tbody>
         <?php
         $brs=0;
         while($row = mysqli_fetch_assoc($query)) {
         	$brs=$brs+1;
          $ImageCatute="ImageCatute".$brs;
          echo '<tr>';
          echo '<td>'.$row["keteranganpengajuan"].'</td>';
          echo '<td>'.$row["direncanakantgl"].'</td>';
          echo '<td>'.$row["direncanakanjan"].'</td>';
          echo '<td>'.$row["keteranganstatus"].'</td>';
		  echo '</tr>';        
         }
         ?>
        </tbody>
 </table>
 <?php
 echo '<ul class="pagination">';
 echo '</ul>';
 ?>
 