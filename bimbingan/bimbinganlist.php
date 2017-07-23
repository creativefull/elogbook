<?php if (!isset($_SESSION)) {
        session_start();
    } 
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      

$Db="../class/myclass.php";
$st=0;
$count =0;
$connect = new mysqli($hostname,$username, $password, $database);
if ($_SESSION["admin"]==1)
{
$sql="SELECT count(*) Jumlah FROM tugas";
$result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT); 
while($row = mysqli_fetch_assoc($result)) 
  { 
  $count =$row["Jumlah"];
}

} else
{
 if ($_SESSION['usertypeid']==2)
 {
 $sql="SELECT count(*) Jumlah FROM tugas where tugas.ygdibimbingid=".$_SESSION['idUs']; 
 $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT); 
while($row = mysqli_fetch_assoc($result)) 
  { 
  $count =$row["Jumlah"];
}
}

 if ($_SESSION['usertypeid']==1)
 {
   $connect->close();
   $st=1;
   $connect = new mysqli($hostname,$username, $password, $database);
   $sql="SELECT count(*) Jumlah FROM tugas where tugas.pembimbingsatuid=".$_SESSION['idUs'];
 //  echo $sql;
   $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT); 
    while($row = mysqli_fetch_assoc($result)) 
    { 
    $count =$row["Jumlah"];
    }
    if ($count==0)
    {
       $st=2;
   $connect->close();
   $connect = new mysqli($hostname,$username, $password, $database);
    $sql="SELECT count(*) Jumlah FROM tugas where tugas.pembimbingduaid=".$_SESSION['idUs'];
   $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT); 
    while($row = mysqli_fetch_assoc($result)) 
    { 
    $count =$row["Jumlah"];
    }
   }
 }

}

if ($_POST['pageId']==0)
{
 $hal=1;
}

$connect->close();

if ($_POST['pageId']!=0)
{
 $hal=$_POST['pageId'];
}

$recordsPerPage=$_POST['recordsPerPage'];

if ($_POST['recordsPerPage']=="undefined")
{
 $recordsPerPage=10;
}

$start = ($hal-1) * $recordsPerPage;
$Pagein=$obj->ProductPage($_POST['pageId'],$recordsPerPage,$count);
$connect = new mysqli($hostname,$username, $password,  $database);
$var1="1"; 
if ($_SESSION["admin"]==1)
{
$sql="SELECT tugas.`judultugas`,dosen2.username namadosen2,tugas.`keterangan`,semester.`namasemester`,tugas.`tanggalmulai` ,mahasiswa.`username` nmmahasiswa,dosen.`username` namadosen
,tugas.`jumlahpertemuan` , tugas.`id` FROM `tugas`
INNER JOIN `usertbl` dosen ON `tugas`.pembimbingsatuid=dosen.`id`
inner join `usertbl` dosen2 ON `tugas`.pembimbingduaid=dosen2.id
INNER JOIN `usertbl` mahasiswa ON `tugas`.`ygdibimbingid`=mahasiswa.`id`
INNER JOIN `semester` ON tugas.`semesterid`=semester.id limit ".$start.",".$recordsPerPage;

  echo '<script>$("#headformid").html('."'".'<a style = "margin-right : 10px;" href="#" onClick="tambahBimbingan();" class="btn btn-info menu btn-xs">Tambah</a><a href="#" onClick="RefreshProd();" class="btn btn-info menu btn-xs">Refresh</a>'."'".')</script>';
} 

if ($_SESSION["admin"]!=1)
{
  if ($_SESSION['usertypeid']==1)
   {
    if ($st==1)
    {
    $connect = new mysqli($hostname,$username, $password, $database);
   $sql="SELECT tugas.`judultugas`,tugas.`keterangan`,dosen2.username namadosen2,semester.`namasemester`,tugas.`tanggalmulai` ,mahasiswa.`username` nmmahasiswa,dosen.`username` namadosen
  ,tugas.`jumlahpertemuan` , tugas.`id` FROM `tugas`
  INNER JOIN `usertbl` dosen ON `tugas`.pembimbingsatuid=dosen.`id`
  inner join `usertbl` dosen2 ON `tugas`.pembimbingduaid=dosen2.id
  INNER JOIN `usertbl` mahasiswa ON `tugas`.`ygdibimbingid`=mahasiswa.`id`
  INNER JOIN `semester` ON tugas.`semesterid`=semester.id 
  WHERE tugas.pembimbingsatuid=".$_SESSION['idUs']." limit ".$start.",".$recordsPerPage ; 
  }
if ($st==2)
  {
  $connect = new mysqli($hostname,$username, $password, $database);
   $sql="SELECT tugas.`judultugas`,tugas.`keterangan`,dosen2.username namadosen2,semester.`namasemester`,tugas.`tanggalmulai` ,mahasiswa.`username` nmmahasiswa,dosen.`username` namadosen
  ,tugas.`jumlahpertemuan` , tugas.`id` FROM `tugas`
  INNER JOIN `usertbl` dosen ON `tugas`.pembimbingsatuid=dosen.`id`
  inner join `usertbl` dosen2 ON `tugas`.pembimbingduaid=dosen2.id
  INNER JOIN `usertbl` mahasiswa ON `tugas`.`ygdibimbingid`=mahasiswa.`id`
  INNER JOIN `semester` ON tugas.`semesterid`=semester.id 
  WHERE tugas.pembimbingduaid=".$_SESSION['idUs']." limit ".$start.",".$recordsPerPage ; 

  
  }
}

  echo '<script>$("#headformid").html('."'".'<a href="#" onClick="RefreshProd();" class="btn btn-info menu btn-xs">Refresh</a>'."'".')</script>';
}

  if ($_SESSION['usertypeid']==2)
  {

  $connect = new mysqli($hostname,$username, $password, $database);
   $sql="SELECT tugas.`judultugas`,tugas.`keterangan`,dosen2.username namadosen2,semester.`namasemester`,tugas.`tanggalmulai` ,mahasiswa.`username` nmmahasiswa,dosen.`username` namadosen
  ,tugas.`jumlahpertemuan` , tugas.`id` FROM `tugas`
  INNER JOIN `usertbl` dosen ON `tugas`.pembimbingsatuid=dosen.`id`
  inner join `usertbl` dosen2 ON `tugas`.pembimbingduaid=dosen2.id
  INNER JOIN `usertbl` mahasiswa ON `tugas`.`ygdibimbingid`=mahasiswa.`id`
  INNER JOIN `semester` ON tugas.`semesterid`=semester.id 
  WHERE tugas.ygdibimbingid=".$_SESSION['idUs']." limit ".$start.",".$recordsPerPage ; 

  }
 

$query = mysqli_query($connect,$sql,MYSQLI_USE_RESULT) or die("Gagal mengambil data");
?>
<table class='<?php echo $obj->TableHeadHead();?>'>
			<thead>
        <tr class="yellow">
				<th >Judul Tugas</th>
				<th >Keterangan</th>
        <th >Semester</th>
        <th >Dimulai tanggal</th>
        <th >Nama Mahasiswa</th>
        <th >Dosen Pembimbing 1</th>
        <th >Dosen Pembimbing 2</th>
        <th >Jumlah Pertemuan (Hari) </th>
				<th></th>
        </tr>
        </thead>
         <tbody>
         <?php
         $brs=0;
         while($row = mysqli_fetch_assoc($query)) {
         	$brs=$brs+1;
          $ImageCatute="ImageCatute".$brs;
          echo '<tr>';
         	echo '<td>'.$row["judultugas"].'</td>';
          echo '<td>'.$row["keterangan"].'</td>';
          echo '<td>'.$row["namasemester"].'</td>';
          echo '<td>'.$row["tanggalmulai"].'</td>';
          echo '<td>'.$row["nmmahasiswa"].'</td>';
          echo '<td>'.$row["namadosen"].'</td>';
          echo '<td>'.$row["namadosen2"].'</td>';
          echo '<td>'.$row["jumlahpertemuan"].'</td>';  
          $str="";
          if ($_SESSION["admin"]==1)
          {
          $str='<td style="width: 140px;">
          <a href="#" onClick="detailtugas('.$row["id"].',2);" class="btn btn-warning menu btn-xs">Edit</a> <a href="#"  class="btn btn-warning menu btn-xs">Delete</a>';        
          echo '</tr>';
            }

          if ($_SESSION["admin"]!=1)  
          {
          $str='<td style="width: 140px;"><a href="#" onClick="detailtugas('.$row["id"].',2);" class="btn btn-warning menu btn-xs">View Skripsi</a>';
          /* Mahasiswa */
          if ($_SESSION['usertypeid']==2)
          {
            $str=$str.'<br/><br/><a href="#" onClick="diajukan('.$row["id"].',0);" class="btn btn-warning menu btn-xs">Ajukan jadwal bimbingan</a><br/><br/>';
             $str=$str.'<a href="#" onClick="tpkegiatanbimbingan('.$row["id"].');" class="btn btn-warning menu btn-xs">View Jadwal bimbingan</a>';
          }

          }
          $str=$str.'</td>';

          echo $str; 	
         	echo '</tr>';        
         }
         ?>
        </tbody>
 </table>
 <?php
 echo '<ul class="pagination">';
 echo  $Pagein;
 echo '</ul>';
 ?>
 