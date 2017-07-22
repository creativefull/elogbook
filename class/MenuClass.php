<?php 

class MenuClass
{
 
    private $id =0;
     
    function __construct(){
            
    }

  
  function MainRun($iduseridx,$IdMenu,$Db) 
  {
   include $Db;
   $statuslogin=0;
   $connect = new mysqli($hostname,$username, $password,  $database);
   $sql="SELECT DISTINCT IFNULL(`menu`.`kode`,'kosong') AS st,
   menu.`headerid`,IFNULL(menu.url,'tdkada') url, menu.`kode`,menu.`namamenu` NmMenu,menu.id,IFNULL(menu.icon,'fa fa-envelope-o') icon,'' storeprocedure,0 janak FROM `maintypeuser`  INNER JOIN menu ON  `menu`.`menutypekey`=`maintypeuser`.`menutypekey` WHERE `maintypeuser`.`id`=".$iduseridx." order by menu.kode";

    $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT);
    echo '<div id="MainMenu" class="treeMenu">';  
       echo "<ul>"; 
  	     echo "<li>"; 
  	     echo '<span><a id="MainMenuid" href="#">Main Menu</a></span>';
         echo '</ul>';   
    echo '<ul>';
  	 while($row = mysqli_fetch_assoc($result)) {             
            $men=$row['url'];
            $jdl=$row['NmMenu'];
    	      $storeprocedure=$row['storeprocedure'];
            $submenu="#Group".$row['id'];	
            if ( $row['url']=='tdkada') 
               {
               if ($row['janak']==0)
                 {
                  ?>
               <li><a href='<?php echo $submenu;?>' data-toggle="collapse"  data-parent="#MainMenuid"><i class="<?php echo $row['icon']; ?>"></i><?php echo $row['NmMenu'];?></a>
                <?php
                 }
                 else
                 {
                ?>
               <li><a href='<?php echo $submenu;?>' data-toggle="collapse"  data-parent="#MainMenuid"><span><i class="<?php echo $row['icon']; ?>"></i></span><?php echo $row['NmMenu'];?><div class="badge badge-default pull-right"><? echo $row['janak']; ?></div></a>
                <?php
                 }			         
               }
	          if ( $row['url']!='tdkada') 
               {
	                $submenu="#Group".$row['id'];
                   if ($row['janak']==0)
                   {
                      ?>                                                 
                        <li><a href='<?php echo $submenu;?>' data-toggle="collapse" id='<?php echo $submenu;?>' data-parent="#MainMenuid" onClick="ExeMain('<?php echo $men;?>','<?php echo $jdl;?>','<?php echo $row['id'];?>','<?php echo $storeprocedure;?>')"><i class="<?php echo $row['icon']; ?>"></i><?php echo $jdl; ?></a>             
                      <?php
                   }
                   else
                    {
                    ?>                                                 
                        <li><a href='<?php echo $submenu;?>' data-toggle="collapse" id='<?php echo $submenu;?>' data-parent="#MainMenuid" onClick="ExeMain('<?php echo $men;?>','<?php echo $jdl;?>','<?php echo $row['id'];?>','<?php echo $storeprocedure;?>')"><i class="<?php echo $row['icon']; ?>"></i><?php echo $jdl; ?><div class="label label-default"><span><?php echo $row['janak']; ?></div></span></a>             
                      <?php
                    }
                      	
                 }
                echo $this->LoadChildrenRun($row['id'],$row['janak'],$iduseridx,$Db);
                echo "</li>";
        }        
   echo "</ul>";
   echo "</div>";         
    }
      
      
  function LoadChildrenRun($idmenu,$status,$iduseridx,$Db) 
{  
  include $Db;
	$iduseridx=$_SESSION['idUs']; 
  $sql="SELECT DISTINCT menu.id,IFNULL(`menu`.`kode`,'kosong') AS st,
      menu.`headerid`,IFNULL(menu.url,'tdkada') url, menu.`kode`,menu.`namamenu` NmMenu,menu.id,IFNULL(menu.icon,'fa fa-envelope-o') icon ,'' storeprocedure,0 janak 
      FROM `maintypeuser`  INNER JOIN menu ON  `menu`.`menutypekey`=`maintypeuser`.`menutypekey`
      WHERE menu.`headerid`=".$idmenu." ORDER BY menu.kode" ;   

  $connect = new mysqli($hostname,$username, $password, $database); 
  $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT);
	$dataparent="#Group".$idmenu;
  echo '<div class="collapse" id="'."Group".$idmenu.'">';     
  if ($status>0)
  { 
  echo '<ul>';
  }
  
  while($menu = mysqli_fetch_assoc($result)) {      
      $men=$menu['url'];
      $jdl=$menu['NmMenu'];
	    $storeprocedure=$menu['storeprocedure'];
      $jl=0;       
		  $submenu="#Group".$menu['id'];
      if ( $menu['url']=='tdkada') {
          if ($jl==0)
              {
                  echo '<li><a href="'.$submenu.'"  data-parent="'.$dataparent.'" data-toggle="collapse"><i class="'.$menu['icon'].'"></i>'.$menu['NmMenu'].'</a>';
              }
          if ($jl!=0) 
          {
              echo '<li><a href="'.$submenu.'"  data-parent="'.$dataparent.'" data-toggle="collapse"><i class="'.$row['icon'].'"></i>'.$menu['NmMenu'].'</a>';
          }
		         echo $this->LoadChildrenRun($menu['id'],$menu['janak'],$iduseridx,$Db);
          echo "</li>";
       }
           
       if ( $menu['url']!='tdkada') {			
		            ?>                   
			           <li><a href= '<?php echo $submenu; ?>'  data-parent='<? echo $dataparent; ?>' data-toggle="collapse" onClick="ExeMain('<?php echo $men;?>','<?php echo $jdl;?>','<?php echo $menu['id'];?>','<?php echo $storeprocedure; ?>')"><i class="<?php echo $menu['icon'];?>"></i><?php echo $menu['NmMenu']; ?></a>             
		            <?php
        }          
        echo $this->LoadChildrenRun($menu['id'],$menu['janak'],$iduseridx,$Db);
        echo "</li>";
         }
         if ($status>0)
          { 
          echo '</ul>';
          }
         echo "</div>"; 	
    }                    
  
 function MainRunDrag($iduseridx,$IdMenu,$Db) 
    {
      
   include $Db;
  $connect = new mysqli($hostname,$username, $password,  $database);
   $sql="SELECT DISTINCT IFNULL(`menu`.`kode`,'kosong') AS st,
   menu.`headerid`,IFNULL(menu.url,'tdkada') url, menu.`kode`,menu.`namamenu` NmMenu,menu.id,IFNULL(menu.icon,'fa fa-envelope-o') icon,'' storeprocedure,0 janak FROM `maintypeuser`  INNER JOIN menu ON  `menu`.`menutypekey`=`maintypeuser`.`menutypekey` WHERE 
    menu.`headerid`=0 and maintypeuser.`usertypeid`=".$iduseridx." order by menu.kode";
  $connect = new mysqli($hostname,$username, $password, $database); 
  $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT);  
//echo $sql;
  	 while($row = mysqli_fetch_assoc($result)) {             
            $men=$row['url'];
            $jdl=$row['NmMenu'];
    	      $storeprocedure=$row['storeprocedure'];
            $submenu="#Group".$row['id'];	

            if ( $row['url']=='tdkada') 
               {
               if ($row['janak']==0)
                 {
                  ?>                         
          <li  class="panel"><a  class="catlablel" href="javascript:;" data-toggle="collapse" data-target='<?php echo $submenu; ?>' ><i class="<?php echo $row['icon']; ?>"></i><?php echo $row['NmMenu'];?></span><i class="fa fa-chevron-left pull-right" id="arow1"></i> </a>
                  <?php
                 }
                 else
                 {
                ?>
               <li class="panel"><a  class="catlablel" href="javascript:;" data-toggle="collapse" data-target='<?php echo $submenu; ?>'><?php echo $row['NmMenu'];?><i class="fa fa-chevron-left pull-right" id="arow1"></i> </a>
                 <?php
           
                 }			         
               }
	          if ( $row['url']!='tdkada') 
               {
	                $submenu="#Group".$row['id'];
                   if ($row['janak']==0)
                   {
                      ?>                                                 
                        <li class="panel"><a href='#' class="catlablel" href="javascript:;" data-toggle="collapse" data-target='<?php echo $submenu; ?>' onClick="ExeMain('<?php echo $men;?>','<?php echo $jdl;?>','<?php echo $row['id'];?>','<?php echo $storeprocedure;?>')"><i class="<?php echo $row['icon']; ?>"></i><span class="menu-text"><?php echo $jdl; ?></span><i class="fa fa-chevron-left pull-right" id="arow1"></i> </a>             
                      <?php
                   }
                   else
                    {
                    ?>                                                 
        <li class="panel"><a href='#' class="catlablel" href="javascript:;" data-toggle="collapse" data-target='<?php echo $submenu; ?>' onClick="ExeMain('<?php echo $men;?>','<?php echo $jdl;?>','<?php echo $row['id'];?>','<?php echo $storeprocedure;?>')"><i class="<?php echo $row['icon']; ?>"></i><?php echo $jdl; ?></span><div class="label label-default"><span><?php echo $row['janak']; ?></div></span><i class="fa fa-chevron-left pull-right" id="arow1"></i> </a>             
                      <?php
                     }
                      	
                 }
                echo $this->LoadChildrenRunDrag($row['id'],$row['janak'],$iduseridx,$Db);
 
        echo "</li>"; 
        }        
         
   
    }                    
  
  function LoadChildrenRunDrag($idmenu,$status,$iduseridx,$Db) 
  {  
    include $Db;
  $sql="SELECT DISTINCT menu.id,IFNULL(`menu`.`kode`,'kosong') AS st,
      menu.`headerid`,IFNULL(menu.url,'tdkada') url, menu.`kode`,menu.`namamenu` NmMenu,menu.id,IFNULL(menu.icon,'fa fa-envelope-o') icon ,'' storeprocedure,0 janak 
      FROM `maintypeuser`  INNER JOIN menu ON  `menu`.`menutypekey`=`maintypeuser`.`menutypekey`
      WHERE menu.`headerid`=".$idmenu." AND maintypeuser.`usertypeid`=".$iduseridx." ORDER BY menu.kode" ;   

  $connect = new mysqli($hostname,$username, $password, $database); 
  $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT);
  $dataparent="Group".$idmenu;
  echo ' <ul class="collapse nav" id='.$dataparent.'>';
  while($menu = mysqli_fetch_assoc($result)) {      
        $men=$menu['url'];
        $jdl=$menu['NmMenu'];
  	    $storeprocedure=$menu['storeprocedure'];
        $jl=0;       
  		  $submenu="#Group".$menu['id'];
        $jl=$menu['janak']; 
        if ( $menu['url']=='tdkada') {
            if ($jl==0)
                {
                    echo '<li class="panel"><a href="#" data-toggle="collapse"  class="catlablel" ><i class="fa fa-angle-double-right"></i>'.$menu['NmMenu'].'</a>';
                    echo "</li>";    
                }
            if ($jl!=0) 
                {
                echo '<li class="panel"><a href="#" data-toggle="collapse" class="catlablel" data-toggle="collapse"><i class="fa fa-angle-double-right"></i>'.$menu['NmMenu'].'</a>';
                  echo "</li>";  
                }
           
         }
             
         if ( $menu['url']!='tdkada') {
            if ($jl==0)
                {
                    echo '<li class="panel"><a href="#" data-toggle="collapse" class="catlablel" onClick="ExeMain('."'".$men."'".','."'".$jdl."'".','.$menu['id'].','."'".$storeprocedure."'".')"><i class="fa fa-angle-double-right"></i>'.$menu['NmMenu'].'</a>';
                    echo "</li>";         
                }
            if ($jl!=0) 
                {
                    echo '<li class="panel"><a href="#" data-toggle="collapse" class="catlablel" data-toggle="collapse" onClick="ExeMain('."'".$men."'".','."'".$jdl."'".','.$menu['id'].','."'".$storeprocedure."'".')"><i class="fa fa-angle-double-right"></i>'.$menu['NmMenu'].'</a>';
                    echo "</li>";
                }
  		     
            
            
         } 
           echo $this->LoadChildrenRunDrag($menu['id'],$menu['janak'],$iduseridx,$Db);
         
           
          
          
    }
       
             // echo "</li>";
              echo '</ul>';
            
          
      }
    

    
 }  
 

 ?>
  