<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$Db="../ToMysql.php";
$count =0;
$connect = new mysqli($hostname,$username, $password,  $database);
$query = mysqli_query($connect,'SELECT usertbl.id,`userid`,`username`,`userpassword`,`usertypeid`,usertbl.nim FROM usertbl where `usertbl`.`usertypeid`=1',MYSQLI_USE_RESULT) or die("Gagal mengambil data");
$var1="1"; 
echo '<script>$("#headformid").html('."'".'<a href="#"  onClick="detailproduct(0,'.$var1.');" class="btn btn-info menu btn-xs">Tambah</a> <a href="#" onClick="RefreshProd();" class="btn btn-info menu btn-xs">Refresh</a>'."'".')</script>';
?>
<table class='<?php echo $obj->TableHeadHead();?>'>
			<thead>
        <tr class="yellow">
				<th>Nama Dosen Pembimbing</th>
				<th>Nomor induk Dosen</th>
				<th></th>
        </tr>
        </thead>
         <tbody>
         <?php
         $brs=0;
         while($row = mysqli_fetch_assoc($query)) {
         	$brs=$brs+1;
          echo '<tr>';
         	echo '<td>'.$row["username"].'</td>';
          echo '<td>'.$row["nim"].'</td>';         
          echo '<td style="width: 140px;"><a href="#" onClick="detailproduct('.$row["id"].',2);" class="btn btn-warning menu btn-xs">Edit</a> <a href="#" class="btn btn-warning menu btn-xs">Delete</a></td>';       	
         	echo '</tr>';
         }
         ?>
        </tbody>
 </table>
 <?php
 echo '<ul class="pagination">';
 
 echo '</ul>';
 ?>
 