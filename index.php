<?php  
    if (!isset($_SESSION)) {
        session_start();
    } 
    include "class/MenuClass.php";
    
    $objmenu = new MenuClass;
    $Db='ToMysql.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <title>E-logbook  | STT WASTUKANCANA PURWAKARTA </title>
  
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin.css" rel="stylesheet">
    <link href="assets/DatePicker/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/Font-Awesome-4.3.0/css/font-awesome.min.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js" type="text/javascript"></script>
    <script src="assets/DatePicker/bootstrap-datepicker.min.js" type="text/javascript"></script>   
 </head>
<body>
<?php
if ( !isset($_SESSION['idUs'])) {
     header('location:user/login.php');
   }
   ?> 
 <div class="container full-width">
  <nav class="navbar navbar-inverse top-bar navbar-fixed-top">
    <div class="container-fluid">   
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> <span class="menu-icon" id="menu-icon"><i class="fa fa-times"
        aria-hidden="true" id="chang-menu-icon"></i></span>
        <a class="navbar-brand" href="#" >STT WASTUKANCANA PURWAKARTA</a>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="myNavbar">     
        <ul class="nav navbar-nav">
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sumit          
           <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
              <li> <a href="#"><i class="fa fa-cog"></i> Setting</a> </li>
              <li> <a href="#" onclick="logooff()"><i class="fa fa-power-off"></i> Logout</a> </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--    top nav end===========-->
  <div class="wrapper" id="wrapper">
    <div class="left-container" id="left-container">
      <!-- begin SIDE NAV USER PANEL -->           
      <div class="left-sidebar" id="show-nav">
        <ul id="side" class="side-nav">

        <?php
    $IdMenu=0;
    echo $objmenu->MainRunDrag($_SESSION['usertypeid'],$IdMenu,$Db) ;
    ?>
    </ul>
      </div>
      <!-- END SIDE NAV USER PANEL -->


    </div>
    <div class="right-container" id="right-container">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            <ul class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="#"> Home</a></li>
						<li class="active"><span id="aplicationmdl"></span></li>
					</ul>
        </div>
          </div>
            <div class="col-md-8">            
            <div class="row">
            <div class="col-md-12">
              <div class="main-header">
  					     <h2><span id="labelAplication"></span></h2>
  					     <em><span id="informationApp"></span></em>
  			   	   </div>
              </div>
            </div>
        </div>


            <div class="col-md-12">
                <div class="row padding-top">
                <div class="panel panelputih">
                  <div class="panel-heading">
                  <div id="headformid"></div>
                  </div>
                    <div class="panel-body">                 
                      <div id="MainPage"></div>                 
                    </div>
                  </div>
                </div>              
             <div class="row padding-top">
             <div id="Message"></div>
           </div>
        </div>
  </div>
</div>
</div>
</div>

  <div id="normalModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>          
        </div>
        <div class="modal-body">
          <div id="bodynormal"></div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="modal fade pull-right" id="lookmodal" data-backdrop="static"  
  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                 <button type="button" class="btn btn-white btn-xs btn-info btn-bold" data-dismiss="modal">&times;Close</button>
                       
                </div>
                  <div class="page-content">
                  <div id='loadmodal'></div> 
                  <input type='hidden' id='idlookup' value=0 namke='idlookup' >
                  </div>
            </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

   <div class="modal fade pull-right" id="NewWindows" data-backdrop="static"  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog ">
              <div class="modal-content bodyBacgroundPOPUP">
                  <div class="page-content bodyBacgroundPOPUP">
                  <div id='loadmodalNew'></div> 
                  <input type='hidden' id='idlookup1' value=0 namke='idlookup' >
                  </div>
            </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   
  <script type="text/javascript">
    $(document).ready(function() {
      $("#panel1").click(function() {
        $("#arow1").toggleClass("fa-chevron-left");
        $("#arow1").toggleClass("fa-chevron-down");
      });
        
      $("#panel2").click(function() {
        $("#arow2").toggleClass("fa-chevron-left");
        $("#arow2").toggleClass("fa-chevron-down");
      });
        
      $("#panel3").click(function() {
        $("#arow3").toggleClass("fa-chevron-left");
        $("#arow3").toggleClass("fa-chevron-down");
      });
        
      $("#panel4").click(function() {
        $("#arow4").toggleClass("fa-chevron-left");
          $("#arow4").toggleClass("fa-chevron-down");
      });
        
      $("#panel5").click(function() {
        $("#arow5").toggleClass("fa-chevron-left");
        $("#arow5").toggleClass("fa-chevron-down");
      });
        
      $("#panel6").click(function() {
        $("#arow6").toggleClass("fa-chevron-left");
        $("#arow6").toggleClass("fa-chevron-down");
      });
        
      $("#panel7").click(function() {
        $("#arow7").toggleClass("fa-chevron-left");
        $("#arow7").toggleClass("fa-chevron-down");
      });
        
      $("#panel8").click(function() {
        $("#arow8").toggleClass("fa-chevron-left");
        $("#arow8").toggleClass("fa-chevron-down");
      });
        
      $("#panel9").click(function() {
        $("#arow9").toggleClass("fa-chevron-left");
        $("#arow9").toggleClass("fa-chevron-down");
      });
        
      $("#panel10").click(function() {
        $("#arow10").toggleClass("fa-chevron-left");
        $("#arow10").toggleClass("fa-chevron-down");
      });
        
      $("#panel11").click(function() {
        $("#arow11").toggleClass("fa-chevron-left");
        $("#arow11").toggleClass("fa-chevron-down");
      });
        
      $("#menu-icon").click(function() {
        $("#chang-menu-icon").toggleClass("fa-bars");
        $("#chang-menu-icon").toggleClass("fa-times");
        $("#show-nav").toggleClass("hide-sidebar");
        $("#show-nav").toggleClass("left-sidebar");         
        $("#left-container").toggleClass("less-width");
        $("#right-container").toggleClass("full-width");
      });                   
    });
    
    function ExeMain(nmfile,JdlMdl,id,storeprocedure) {
         var dataString='id='+id+'&nmfile='+nmfile+'&storeprocedure='+storeprocedure+'&Jdl='+JdlMdl;       
         $("#MainPage").html
         ('Loading <img src="img/loading6.gif" />');
         $("#MainPage").show();
         $.ajax({
         type: "POST",
         url: nmfile,
         data: dataString,
         cache: false,
         success: function(result){      
            $("#labelAplication").html(JdlMdl);         
            $("#MainPage").html(result); 
            $("#aplicationmdl").html(JdlMdl);                                          
         }
      });
   }
       
  function tpInformation(lblcaption)
   {
    $("#informationApp").html(lblcaption);
   }
    
  function MessageAction(message)
  {
    $("#Message").html(message+"<a href='#' class='btn btn-warning menu' onClick='hidemessege();'>Clear</a>");
  }

  function hidemessege()
  {
    $("#Message").html("");
  }
       
  function logooff()
  {
   var dataString = "";  
   var postUrl="User/logoff.php";  
    $.ajax({
        type: "POST",
        url: postUrl,
        data: dataString,
        cache: false,
          success: function(result){
          window.location="index.php";
        }
      });
  }
  </script>

</body>

</html>