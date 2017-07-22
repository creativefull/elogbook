<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;    
echo '<div id="pagediv"></div>';
echo '<div id="bimbingantblDiv"></div>';
echo '<div id="bimbingantblHistorisDiv"></div>';

?>

 <script type="text/javascript">
    $(document).ready(function() {
        $("#informationApp").html("List");
        LoadPage();
        loadRefreshTablebimbinganTable(0,0);
   });

function LoadPage() {
        var dataString='id='+0;       
         $("#pagediv").html
         ('Loading <img src="img/loading6.gif" />');
         $("#pagediv").show();
         $.ajax({
         type: "POST",
         url: "page.php",
         data: dataString,
         cache: false,
         success: function(result){  
            hidemessege();                         
            $("#pagediv").html(result);                                          
         }
         });
       }

function RefreshProd()
{
   loadRefreshTablebimbinganTable(0,0);
}

function loadRefreshTablebimbinganTable(pageId,Vid)
{
    if (Vid==undefined)
    {
      Vid=0;
    }
     LoadTablebimbingan(pageId,$("#Page option:selected").val(),Vid);
  }

 function LoadTablebimbingan(pageId,recordsPerPage,Vid) {
        var dataString='id='+0+"&recordsPerPage="+recordsPerPage+"&pageId="+pageId;       
         $("#bimbingantblDiv").html
         ('Loading <img src="img/loading6.gif" />');
         $("#bimbingantblDiv").show();
         $.ajax({
         type: "POST",
         url: "bimbingan/bimbinganlist.php",
         data: dataString,
         cache: false,
         success: function(result){  
            hidemessege();   
            $("#pagediv").show();                      
            $("#bimbingantblDiv").html(result);                                          
         }
         });
       }

  function diajukan(vid,idpengajuan) {
        var dataString='id='+vid+"&idpengajuan="+idpengajuan;       
         $("#bimbingantblDiv").html
         ('Loading <img src="img/loading6.gif" />');
         $("#bimbingantblDiv").show();
         $.ajax({
         type: "POST",
         url: "bimbingan/pengajuanbimbinganform.php",
         data: dataString,
         cache: false,
         success: function(result){  
            hidemessege();   
            $("#pagediv").show();                      
            $("#bimbingantblDiv").html(result);                                          
         }
         });
       }

  function savebimbingan()
  {
    var dataString='id='+$("#idtugas").val()+"&judultugas="+$("#judultugas").val()+"&keterangan="+$("#keterangan").val()
      +"&jumlahpertemuan="+0
      +"&ygdibimbingid="+$("#ygdibimbingid option:selected").val()
      +"&semesterid="+$("#semesterid option:selected").val()
      +"&tanggalmulai="+$("#tanggalmulai").val()
      +"&pembimbingsatuid="+$("#pembimbingsatuid option:selected").val()
      +"&pembimbingduaid="+$("#pembimbingduaid option:selected").val();
   
      if ($("#bimbingancode").val()=="")
      {
      $("#Message").html("Code bimbingan tidak boleh kosong !!!"+"<a href='#' class='btn btn-warning menu' onClick='hidemessege();'>Clear</a>");
      }       
      if ($("#bimbingancode").val()!="")
      {
         $.ajax({
         type: "POST",
         url: "bimbingan/bimbingansave.php",
         data: dataString,
         cache: false,
         success: function(result){                           
            $("#Message").html(result);                                          
         }
      }); 
  }
  }

  function savebimbinganpengajuan(id,idtugas)
  {
    var dataString='id='+id+"&idtugas="+idtugas+"&keteranganpengajuan="+$("#keteranganpengajuan").val()
      +"&direncanakantgl="+$("#direncanakantgl").val()
      +"&direncanakanjan="+$("#direncanakanjan").val();
      $.ajax({
         type: "POST",
         url: "bimbingan/pengajuanbimbingansave.php",
         data: dataString,
         cache: false,
         success: function(result){                           
            $("#Message").html(result);                                          
         }
      }); 
  }

  function tpkegiatanbimbingan(tugasid)
  {
   var dataString="&tugasid="+tugasid;       
         $("#bimbingantblHistorisDiv").html
         ('Loading <img src="img/loading6.gif" />');
         $("#bimbingantblHistorisDiv").show();
         $.ajax({
         type: "POST",
         url: "bimbingan/kegiatanjadwalbimbingan.php",
         data: dataString,
         cache: false,
         success: function(result){  
            $("#bimbingantblHistorisDiv").show();
            $("#bimbingantblHistorisDiv").html(result);                                          
         }
         });
  }

  function detailtugas(id,var1)
  {
    var dataString='id='+id; 
       if (var1==1)
       {
        lbl="Tambah";
       }
       if (var1==2)
       {
        lbl="Delete";
       }

       if (var1==3)
       {
        lbl="View";
       }
             
         $("#bimbingantblDiv").html('Loading <img src="img/loading6.gif" />');
         $("#bimbingantblDiv").show();
         $.ajax({
         type: "POST",
         url: "bimbingan/bimbinganform.php",
         data: dataString,
         cache: false,
         success: function(result){ 
          $("#pagediv").hide();
          $("#informationApp").html(lbl);                          
          $("#bimbingantblDiv").html(result);                                           
         }
         });
  }

  function UploadPicturebimbingan(brs,id)
  {
   $('#lookmodal').modal('toggle');
   $('#lookmodal').modal('show');
   $(".modal-dialog").width(300 );     
   var dataString="id="+id+"&brs="+brs;  
   var postUrl="UploadResizeOthersbimbingan.php";     
        $.ajax({
          type: "POST",
          url: postUrl,
          data: dataString,
          cache: false,
          success: function(result){
            $("#loadmodal").html(result);
          }
    });
  }
 </script>