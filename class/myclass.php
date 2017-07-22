<?php 

class myclass
{
  
 private $id =0;
  
 function __construct(){
        
 }    
  
  
function get_numeric($val) {
  if (is_numeric($val)) {
    return $val + 0;
  }
  return 0;
} 

function TableHeadHead()
 {
  $th='table table-bordered dt-responsive table-condensed table-striped tableheader" cellspacing="0" width="100%"';
 return $th;
  }

  
   
 function right($string, $length)
              	{
              	$str = substr($string, -$length, $length);
              	return $str;
              	}  
                
 function left($string, $length)
              	{
              	$str = substr($string, 0, $length);
              	return $str;
              	}

 function mid($string, $left_start, $length)
              	{
              	$str = substr($string, $left_start, $length);
              	return $str;
              	}
                  
function bulanprd($b)
{
    $bln="";
    if ($b=='01' or $b==1)
    {
     $bln="Januari";
    }
    
    if ($b=='02' or $b==2)
    {
     $bln="Februari";
    }
    
    if ($b=='03' or $b==3)
    {
     $bln="Maret";
    }
    
    if ($b=='04' or $b==4)
    {
     $bln="April";
    }
    
    if ($b=='05' or $b==5)
    {
     $bln="Mei";
    }
    
    if ($b=='06' or $b=='6')
    {
     $bln="Juni";
    }
    
    if ($b=='07' or $b==7)
    {
     $bln="Juli";
    }
    
    if ($b=='08' or $b==8)
    {
     $bln="Agustus";
    }
    
    if ($b=='09' or $b==9)
    {
     $bln="September";
    }
    if ($b=='10' or $b==10)
    {
     $bln="Oktober";
    }
    
    if ($b=='11' or $b==11)
    {
     $bln="November";
    }
    if ($b=='12' or $b==12)
    {
     $bln="Desember";
    }
      return $bln;
}	

		
function number_format_drop_zero_decimals($n, $n_decimals)
    {
        return ((floor($n) == round($n, $n_decimals)) ? number_format($n) : number_format($n, $n_decimals));
    }

function inputtext($label,$id,$placeHolder,$value,$disabled,$Class,$ClassForm)
      {
         $code="";
         $code=$code .'<div class="col-sm-12">';
         $code=$code .'<div class="col-sm-12 col-sm-5">';
         $code=$code.' <label for="'.$id.'" >'.$label.'</label>';
         $code=$code .'</div>';
         $code=$code .'<div class="col-sm-12 col-sm-7">'; 
         $code=$code .'<input "'.$ClassForm.'"  value="'.$value.'" "'.$Class.'"  type="text" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeHolder.'"   '.$disabled.' />';  
         $code=$code .'</div>';   
         $code=$code .'</div>';           
         return $code;               
      }
      
       function inputtextarea($label,$id,$placeHolder,$value,$disabled,$Class,$ClassForm)
      {
         $code="";
         $code=$code .'<div class="col-sm-12">';
         $code=$code .'<div class="col-sm-12 col-sm-5">';
         $code=$code.' <label for="'.$id.'" >'.$label.'</label>';
         $code=$code .'</div>';
         $code=$code .'<div class="col-sm-12 col-sm-7">'; 
         $code=$code .'<input "'.$ClassForm.'"  value="'.$value.'" "'.$Class.'"  type="text" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeHolder.'"   '.$disabled.' />';  
         $code=$code .'</div>';   
         $code=$code .'</div>';           
         return $code;               
      }

      function inputtextMultiVar($label,$id,$placeHolder,$value,$id2,$placeHolder2,$value2,$disabled,$Class,$ClassForm)
      {
         $code="";
         $code=$code .'<div class="col-sm-12">';
         $code=$code .'<div class="col-sm-12 col-sm-5">';
         $code=$code.' <label for="'.$id.'" >'.$label.'</label>';
         $code=$code .'</div>';
         $code=$code .'<div class="col-sm-12 col-sm-7">'; 
         $code=$code .'<input "'.$ClassForm.'"  value="'.$value.'" "'.$Class.'"  type="text" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeHolder.'"   '.$disabled.' />';  
         $code=$code .'<input "'.$ClassForm.'"  value="'.$value2.'" "'.$Class.'"  type="text" id="'.$id2.'" name="'.$id2.'"  placeholder="'.$placeHolder2.'"   '.$disabled.' />';        
         $code=$code .'</div>';   
         $code=$code .'</div>';           
         return $code;               
      }
      
      function inputtextWithButton($label,$id,$placeHolder,$value,$disabled,$Class,$ClassForm,$buttonName,$ActiveBotton)
      {
         $code="";
         $code=$code .'<div class="col-sm-12">';
         
         $code=$code .'<div class="col-sm-12 col-sm-5">';
         $code=$code.' <label for="'.$id.'" >'.$label.'</label>';
         $code=$code .'</div>';
         
         $code=$code .'<div class="col-sm-12 col-sm-6">'; 
         $code=$code .'<input "'.$ClassForm.'"  value="'.$value.'" "'.$Class.'"  type="text" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeHolder.'"   '.$disabled.' />';          
         $code=$code .'</div>';  
         
         $code=$code .'<div class="col-sm-12 col-sm-1">'; 
        if ($ActiveBotton=="")
         {
          $code=$code .'<a href="#" type="button" id="'.$buttonName.'" class="form-control" name="'.$buttonName.'" class="btn btn-xs btn-primary">...</a>';
         }
         $code=$code .'</div>'; 
         
         $code=$code .'</div>';           
         return $code;               
      }
      
      function inputtextWithTableButton($id,$placeHolder,$value,$disabled,$Class,$ClassForm,$buttonName,$ActiveBotton,$ActionButton)
      {
         $code="";
         $code=$code .'<div class="col-sm-12">';         
         $code=$code .'<div class="col-sm-12 col-sm-10">';                 
         $code=$code .'<input  value="'.$value.'" "'.$Class.'"  type="text" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeHolder.'"   '.$disabled.' />';          
         $code=$code .'</div>';           
         $code=$code .'<div class="col-sm-12 col-sm-2">'; 
        if ($ActiveBotton=="")
         {
          $code=$code .'<a href="#"   type="button" '.$ActionButton.' id="'.$buttonName.'" name="'.$buttonName.'" class="btn btn-white btn-xs btn-info btn-bold">...</a>';
         }
         $code=$code .'</div>'; 
         
         $code=$code .'</div>';           
         return $code;               
      }
      
       function inputtextWithTableButtonDouble($id,$placeHolder,$value,$disabled,$Class,$ClassForm,$id2,$placeHolder2,$value2,$disabled2,$Class2,$ClassForm2,$buttonName,$ActiveBotton,$ActionButton)
      {
         $code="";
         $code=$code .'<div class="col-sm-12">';
         $code=$code .'<div class="col-sm-12 col-sm-2">';                 
         $code=$code .'<input  value="'.$value2.'" "'.$Class2.'"  type="text" id="'.$id2.'" name="'.$id2.'"  placeholder="'.$placeHolder2.'"   '.$disabled2.' />';          
         $code=$code .'</div>';           
         $code=$code .'<div class="col-sm-12 col-sm-8">';                 
         $code=$code .'<input  value="'.$value.'" "'.$Class.'"  type="text" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeHolder.'"   '.$disabled.' />';          
         $code=$code .'</div>';           
         $code=$code .'<div class="col-sm-12 col-sm-2">'; 
        if ($ActiveBotton=="")
         {
          $code=$code .'<a href="#"   type="button" '.$ActionButton.' id="'.$buttonName.'" name="'.$buttonName.'" class="btn btn-white btn-xs btn-info btn-bold">...</a>';
         }
         $code=$code .'</div>'; 
         
         $code=$code .'</div>';           
         return $code;               
      }
      
      function inputtextWithButtonCol1($label,$id,$placeHolder,$value,$disabled,$Class,$ClassForm,$buttonName,$ActiveBotton)
      {
         $code="";
         $code=$code .'<div class="col-sm-12 col-sm-2">';
         $code=$code.' <label for="'.$id.'" >'.$label.'</label>';
         $code=$code .'</div>';
         
         $code=$code .'<div class="col-sm-12 col-sm-9">'; 
         $code=$code .'<input "'.$ClassForm.'"  value="'.$value.'" "'.$Class.'"  type="text" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeHolder.'"   '.$disabled.' />';          
         $code=$code .'</div>';  
         
         $code=$code .'<div class="col-sm-12 col-sm-1">'; 
        if ($ActiveBotton=="")
         {
          $code=$code .'<a href="#" type="button" id="'.$buttonName.'" name="'.$buttonName.'" class="btn btn-xs btn-primary">...</a>';
         }
         $code=$code .'</div>'; 
         
           
         return $code;               
      }
    
      
         
      function ComboSelectGeneralValue($Label,$cmb,$id)
       {
         $code="";
         $code=$code .'<div class="col-sm-12">';
         $code=$code .'<div class="col-sm-12 col-sm-5">';
         $code=$code.' <label for="'.$id.'" >'.$Label.'</label>';
         $code=$code .'</div>';
         $code=$code .'<div class="col-sm-12 col-sm-7">'; 
         $code=$code . $cmb;  
         $code=$code .'</div>';   
         $code=$code .'</div>';           
         return $code;      
        }  
        
    function inputtextareaNew($label,$id,$placeHolder,$value,$disabled,$Class,$ClassForm)
      {
         $code="";
         $code=$code .'<div class="col-sm-12">';
         $code=$code .'<div class="col-sm-12 col-sm-5">';
         $code=$code.' <label for="'.$id.'" >'.$label.'</label>';
         $code=$code .'</div>';
         $code=$code .'<div class="col-sm-12 col-sm-7">'; 
         $code=$code .'<textarea name="textarea" id="'.$id.'" name="'.$id.'" '.$disabled.' '.$Class.'>'.$value.'</textarea>';
        // $code=$code .'<input "'.$ClassForm.'"  value="'.$value.'" "'.$Class.'"  type="text" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeHolder.'"   '.$disabled.' />';  
         $code=$code .'</div>';   
         $code=$code .'</div>';           
         return $code;               
      }
      
      
    function garis()
      {
       echo '<div class="col-xs-12 col-sm-12 widget-container-col">';
          echo '<div class="hr hr-18 dotted "></div>';
       echo '</div>';
      }
          
     
      function comboSemester($nameid,$Db,$GroupDanaNam,$GroupDanaid,$active)
        {
          include $Db;
          $strcmbthn="";
          $group=0; 
          $sql="SELECT semester.`id`,semester.`kodesemester`,semester.`namasemester` FROM `semester`";

          $connect = new mysqli($hostname,$username, $password, $database);
          $strcmbthn =$strcmbthn."<select style='width:230px;' class='chosen-select' ".$active."  id=".$nameid." data-placeholder='Choose a Pabrik...'  >";         
          $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT);  
           
          if ($GroupDanaid!=0)
          {
          $strcmbthn =$strcmbthn. "<option  value=".$GroupDanaid.">".$GroupDanaNam."</option>";
          }
                                                          
           while($row = mysqli_fetch_assoc($result)) {             
             $Keterangan = $row["namasemester"]; 
             $id=$row["id"];             
             $strcmbthn =$strcmbthn. "<option  value=".$id.">".$Keterangan."</option>";
          }
          $strcmbthn =$strcmbthn.'</select>';
          return $strcmbthn;  
        }


    function comboMahasiswa($nameid,$Db,$GroupDanaNam,$GroupDanaid,$active)
        {
          include $Db;
          $strcmbthn="";
          $group=0; 
          $sql="SELECT id,`userid`,`username`,`userpassword`,`usertypeid` FROM `usertbl`
          where usertbl.usertypeid=2";

          $connect = new mysqli($hostname,$username, $password, $database);
          $strcmbthn =$strcmbthn."<select style='width:230px;' class='chosen-select' ".$active."  id=".$nameid." data-placeholder='Choose a Pabrik...'  >";         
          $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT);  
           
          if ($GroupDanaid!=0)
          {
          $strcmbthn =$strcmbthn. "<option  value=".$GroupDanaid.">".$GroupDanaNam."</option>";
          }
                                                          
           while($row = mysqli_fetch_assoc($result)) {             
             $Keterangan = $row["username"]; 
             $id=$row["id"];             
             $strcmbthn =$strcmbthn. "<option  value=".$id.">".$Keterangan."</option>";
          }
          $strcmbthn =$strcmbthn.'</select>';
          return $strcmbthn;  
        }

    function combopembimbing($nameid,$Db,$GroupDanaNam,$GroupDanaid,$active)
        {
          include $Db;
          $strcmbthn="";
          $group=0; 
          $sql="SELECT id,`userid`,`username`,`userpassword`,`usertypeid` FROM `usertbl`
          where usertbl.usertypeid=1";
          $connect = new mysqli($hostname,$username, $password, $database);
          $strcmbthn =$strcmbthn."<select style='width:230px;' class='chosen-select' ".$active."  id=".$nameid." data-placeholder='Choose a Pabrik...'  >";         
          $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT);  
           
          if ($GroupDanaid!=0)
          {
          $strcmbthn =$strcmbthn. "<option  value=".$GroupDanaid.">".$GroupDanaNam."</option>";
          }
                                                          
           while($row = mysqli_fetch_assoc($result)) {             
             $Keterangan = $row["username"]; 
             $id=$row["id"];             
             $strcmbthn =$strcmbthn. "<option  value=".$id.">".$Keterangan."</option>";
          }
          $strcmbthn =$strcmbthn.'</select>';
          return $strcmbthn;  
        }    

    function ProductPage($Vpage,$VrecordsPerPage,$Vcount)
  {
    $page = (int) (!isset($Vpage) ? 1 :$Vpage);    
    $page = ($page == 0 ? 1 : $page);
    $recordsPerPage = $VrecordsPerPage;
    $start = ($page-1) * $recordsPerPage;
    $adjacents = "2";              
    $prev = $page - 1;
    $next = $page + 1;
    $count=$Vcount;
    if ($Vcount==0)
    {
      $count=1;
    }
    
    if ($recordsPerPage==0)
    {

        $recordsPerPage=1;
    }
    
    $lastpage = ceil($count/$recordsPerPage);
    $lpm1 = $lastpage - 1;   
    $pagination = "";
    
    if($lastpage > 1)
           {   
            $pagination .= "<div class='pagination'>";
            if ($page > 1)
              $pagination.= "<li><a href=\"#Page=".($prev)."\" onClick=' loadRefreshTableProductTable(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a></li>";
               else
               $pagination.= "<li><span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span></li>";   
               if ($lastpage < 7 + ($adjacents * 2))
                  {   
                   for ($counter = 1; $counter <= $lastpage; $counter++)
                   {
                       if ($counter == $page)
                          $pagination.= "<li><span class='current'>$counter</span></li>";
                       else
                          $pagination.= "<li><a href=\"#Page=".($counter)."\" onClick=' loadRefreshTableProductTable(".($counter).");'>$counter</a></li>";     
                                       
                       }
                  }
                  elseif($lastpage > 5 + ($adjacents * 2))
                  {
                  if($page < 1 + ($adjacents * 2))
                  {
                      for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                        {
                           if($counter == $page)
                              $pagination.= "<li><span class='current'>$counter</span></li>";
                           else
                              $pagination.= "<li><a href=\"#Page=".($counter)."\" onClick=' loadRefreshTableProductTable(".($counter).");'>$counter</a></li>";     
                           }
                              $pagination.= "...";
                              $pagination.= "<li><a href=\"#Page=".($lpm1)."\" onClick=' loadRefreshTableProductTable(".($lpm1).");'>$lpm1</a></li>";
                              $pagination.= "<li><a href=\"#Page=".($lastpage)."\" onClick=' loadRefreshTableProductTable(".($lastpage).");'>$lastpage</a></li>";   
                         
                  }
                   elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                  {
                             $pagination.= "<li><a href=\"#Page=\"1\"\" onClick=' loadRefreshTableProductTable(1);'>1</a></li>";
                             $pagination.= "<li><a href=\"#Page=\"2\"\" onClick=' loadRefreshTableProductTable(2);'>2</a></li>";
                             $pagination.= "...";
                             for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                             {
                                 if($counter == $page)
                                     $pagination.= "<span class='current'>$counter</span>";
                                 else
                                     $pagination.= "<li><a href=\"#Page=".($counter)."\" onClick=' loadRefreshTableProductTable(".($counter).");'>$counter</a></li>";     
                             }
                             $pagination.= "..";
                             $pagination.= "<li><a href=\"#Page=".($lpm1)."\" onClick=' loadRefreshTableProductTable(".($lpm1).");'>$lpm1</a></li>";
                             $pagination.= "<li><a href=\"#Page=".($lastpage)."\" onClick=' loadRefreshTableProductTable(".($lastpage).");'>$lastpage</a></li>";   
                         }
                         else
                         {
                             $pagination.= "<li><a href=\"#Page=\"1\"\" onClick=' loadRefreshTableProductTable(1);'>1</a></li>";
                             $pagination.= "<li><a href=\"#Page=\"2\"\" onClick=' loadRefreshTableProductTable(2);'>2</a></li>";
                             $pagination.= "..";
                             for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                             {
                                 if($counter == $page)
                                      $pagination.= "<span class='current'>$counter</span>";
                                 else
                                      $pagination.= "<li><a href=\"#Page=".($counter)."\" onClick=' loadRefreshTableProductTable(".($counter).");'>$counter</a></li>";     
                             }
                         }
                      }
                      if($page < $counter - 1)
                          $pagination.= "<li><a href=\"#Page=".($next)."\" onClick=' loadRefreshTableProductTable(".($next).");'>Next &raquo;</a></li>";
                      else
                          $pagination.= "<span class='disabled'>Next &raquo;</span>";
                      
                      $pagination.= "</div>";       
                  }
           return  $pagination;
    }
 }  
 

 ?>
  