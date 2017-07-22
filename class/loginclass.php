<?php
    if (!isset($_SESSION)) {
        session_start();
    }   

$GLOBALS = array(
    'idUs' => 0,
    'userlogin' => '',
    'userpassword' =>'',
    'namauserrr'=>'',
    'NamaPerusahaan'=>'',
    'Alamat1'=>'',
    'Alamat2'=>'',
    'NPWP'=>'',
    'KodePos'=>'',
    'Notelp'=>'',
    'NoFax'=>'',
    'AlamatEmail'=>'',
    'logo'=>'',
    'planid'=>0,
    'namacabang'=>''
    
);

  
class loginclass {
    protected $glob;

    public function __construct() {
        global $GLOBALS;
        $this->glob =& $GLOBALS;
    }

    public function getGlob() {
        return $this->glob['idUs'];
    }
    
    public function IsiUserI() {
     $this->glob['idUs']=2;
    }
    
     public function IsiUserId($userlogin,$passw,$planid) {
     $this->glob['userlogin']=$userlogin;
     $this->glob['userpassword']=$passw;
     $this->glob['planid']=$planid;
    }
     
    
    public function IsiUseraja() {
     return $this->glob['userlogin'];
    }
    
     public function ceklogin($Db)
     {
     
      include $Db;
      $statuslogin=0;
      $connect = new mysqli($hostname,$username, $password,  $database);     
      $ssql="SELECT DISTINCT usertbl.id,usertbl.userid, usertbl.username,usertbl.usertypeid,ifnull(usertype.admin,0) admin  FROM usertbl
      inner join usertype on usertbl.usertypeid=usertype.id
      Where usertbl.userid='".$this->glob['userlogin']."'   
       AND  usertbl.userpassword='".$this->glob['userpassword']."'";

      $query = mysqli_query($connect,$ssql,MYSQLI_USE_RESULT) or die("Gagal mengambil data");

       while($row = mysqli_fetch_assoc($query)) {                    
        $this->glob['idUs']=$row['id'];
        $this->glob['namauserrr']=$row['username'];
        $_SESSION['namauserrr'] = $row['username'];
        $_SESSION['idUs'] = $row['id'];
        $_SESSION['usertypeid']=$row["usertypeid"];
        $_SESSION["admin"]=$row["admin"];
        $statuslogin=1;
      }
      
      
       echo $_SESSION['idUs'];
     } 
     
     
    public function nomorIdUser()
     {
      return $this->glob['idUs'];
     }
      

    function CompanyPerusahaan($Db)
     {    
     include $Db;
     $connect = mysql_connect($hostname, $username, $password) or die('Could not connect: ' . mysql_error());
     $sql="select id,NamaPerusahaan,NPWP ,Alamat1,Alamat2 ,KodePos ,Notelp,NoFax ,AlamatEmail,logo  from companyprofile"; 
     $query = mysql_query($sql) or die(mysql_error());
     while($row = mysql_fetch_assoc($query)){          
              $this->glob['NamaPerusahaan']=$row["NamaPerusahaan"];
              $this->glob['NPWP']=$row["NPWP"];
              $this->glob['Alamat1']=$row["Alamat1"];
              $this->glob['Alamat2']=$row["Alamat2"];
              $this->glob['KodePos']=$row["KodePos"];                       
              $this->glob['Notelp']=$row["Notelp"];
              $this->glob['NoFax']=$row["NoFax"];
              $this->glob['AlamatEmail']=$row["AlamatEmail"];       
              $this->glob['logo']=$row['logo'];
      }
      
     }
     
     function logoperusahaan(){
      return $this->glob['logo'];
     }
     
     function namaperusahaaan(){
      return $this->glob['NamaPerusahaan'];
     }
     
}



?>
