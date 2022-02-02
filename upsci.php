<?php
$fail=0;
$sucess=0;
$invalid=0;
$condid=0;
$satid=0;
$error=0;
$error1=0;
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    // $connection= mysqli_connect("localhost","root","");
    // $db= mysqli_select_db($connection,'satellitemanagement');
    include 'connect.php';
    $sid=$_POST['sid'];
    $param=$_POST['column'];
    $old=$_POST['old'];
    $new=$_POST['new'];
    $tableid=$_POST['tableid'];
    $table=$_POST['table'];
    $sql="select * from `scientist` SC, `satellite` S, `conditions` C , `uploads` U, `follows` F where SC.SID=U.SID and S.SATID=U.SATID and S.SATID=F.SATID and F.CONDID=C.CONDID and  SC.SID='$sid' ";               
    $result=mysqli_query($connection, $sql);
    if($result){
      $num=mysqli_num_rows($result);
      if($num>0){
            if($table=='conditions'){
              $sql1="select * from `scientist` SC, `satellite` S, `conditions` C , `uploads` U, `follows` F  where SC.SID=U.SID and S.SATID=U.SATID and S.SATID=F.SATID and F.CONDID=C.CONDID and  SC.SID='$sid' and C.CONDID='$tableid'";
              $result1=mysqli_query($connection, $sql1);
              if($result1){
                $count=mysqli_num_rows($result1);
                if($count>0){
                  if($param=='APOGEE' || $param=='apogee' || $param=='Apogee'){
                    $check="select * from `conditions` where APOGEE='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set APOGEE='$new' where CONDID='$tableid' and APOGEE='$old' ";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                    
                    
    
                  }
                  elseif($param=='PERIGEE' || $param=='perigee' || $param=='Perigee'){
                    $check="select * from `conditions` where PERIGEE='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set PERIGEE='$new' where CONDID='$tableid' and PERIGEE='$old' ";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                    
    
                  }
                  elseif($param=='CLASS OF ORBIT' || $param=='class of orbit' || $param=='Class of orbit'){
                    $check="select * from `conditions` where CLASS_OF_ORBIT='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set CLASS_OF_ORBIT='$new' where CONDID='$tableid' and CLASS_OF_ORBIT='$old' ";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                  
    
                  }
                  elseif($param=='ORBIT TYPE' || $param=='orbit type' || $param=='Orbit type'){
                    $check="select * from `conditions` where ORBIT_TYPE='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set ORBIT_TYPE='$new' where CONDID='$tableid' and ORBIT_TYPE='$old' ";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                  
    
                  }
                  elseif($param=='LONGITUDE' || $param=='longitude' || $param=='Longitude'){
                    $check="select * from `conditions` where LONGITUDE='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set LONGITUDE='$new' where CONDID='$tableid' and LONGITUDE='$old' ";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                    
                      
                  }
                  
    
                  
                  elseif($param=='ECCENTRICITY' || $param=='eccentricity' || $param=='Eccentricity'){
                    $check="select * from `conditions` where ECCENTRICITY='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set ECCENTRICITY='$new' where CONDID='$tableid' and ECCENTRICITY='$old'";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                  
    
                  }
                  elseif($param=='INCLINATION' || $param=='inclination' || $param=='Inclination'){
                    $check="select * from `conditions` where INCLINATION='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set INCLINATION='$new' where CONDID='$tableid'and INCLINATION='$old'";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                   
    
                  }
                  elseif($param=='LAUNCH MASS' || $param=='launch mass' || $param=='Launch mass'){
                    $check="select * from `conditions` where LAUNCHMASS='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set LAUNCHMASS='$new' where CONDID='$tableid' and LAUNCHMASS='$old' ";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                   
    
                  }
                  elseif($param=='PERIOD' || $param=='period' || $param=='Period'){
                    $check="select * from `conditions` where PERIOD='$old' and CONDID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $query="update `conditions` set PERIOD='$new' where CONDID='$tableid' and PERIOD='$old'";
                        $fin0=mysqli_query($connection, $query);
                        if($fin0){
                          $sucess=1;
                        }
                        
                      }
                      else{
                        $error=1;
                      }
                    
                    }
    
                  }
                  else{
                    $condid=1;

                  }
                  
                  }
                
                else{
                   $invalid=1;
                  // echo '<script type="text/javascript">alert("UNSER CON")</script>';

                }
              }
              // else{
              //   $invalid=1;
              // }
              
          }
          if($table=='satellite'){
            $sql1="select * from `scientist` SC, `satellite` S, `conditions` C , `uploads` U, `follows` F  where SC.SID=U.SID and S.SATID=U.SATID and S.SATID=F.SATID and F.CONDID=C.CONDID and  SC.SID='$sid' and S.SATID='$tableid'";
            $result1=mysqli_query($connection, $sql1);
            if($result1){
              $count=mysqli_num_rows($result1);
              if($count>0){
                if($param=='NAME' || $param=='Name' || $param=='name'){
                  $check="select * from `satellite` where SATNAME='$old' and SATID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $res0="update `satellite` set `SATNAME`='$new' where `satellite`.`SATID`='$tableid' and `satellite`.`SATNAME`='$old'";
                        $fin0=mysqli_query($connection, $res0);
                        if($fin0){
                          $sucess=1;
                        }
                        
                      }
                      else{
                        $error=1;
                        }
                    
                    }
                  

                }
                elseif ($param=='USER' || $param=='user' || $param=='User') {
                  $check="select * from `satellite` where SATUSER='$old' and SATID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $res1="update `satellite` set `SATUSER`='$new' where `satellite`.`SATID`='$tableid' and `satellite`.`SATUSER`='$old'";
                        $fin0=mysqli_query($connection, $res1);
                        if($fin0){
                          $sucess=1;
                        }
                        
                      }
                      else{
                        $error=1;
                        }
                    
                    }
                  

                }
                elseif ($param=='PURPOSE' || $param=='purpose' || $param=='Purpose') {
                  $check="select * from `satellite` where SATPURPOSE='$old' and SATID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $res1="update `satellite` set `SATPURPOSE`='$new' where `satellite`.`SATID`='$tableid' and `satellite`.`SATPURPOSE`='$old'";
                        $fin0=mysqli_query($connection, $res1);
                        if($fin0){
                          $sucess=1;
                        }
                        
                      }
                      else{
                        $error=1;
                        }
                    
                    }
                  

                }
                elseif ($param=='DATE OF LAUNCH' || $param=='date of launch' || $param=='Date of launch' || $param=='date') {
                  $check="select * from `satellite` where DATE_OF_LAUNCH='$old' and SATID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $res1="update `satellite` set `DATE_OF_LAUNCH`='$new' where `satellite`.`SATID`='$tableid' and `satellite`.`DATE_OF_LAUNCH`='$old'";
                        $fin0=mysqli_query($connection, $res1);
                        if($fin0){
                          $sucess=1;
                        }
                        
                      }
                      else{
                        $error1=1;
                        }
                    
                    }
                  

                }
                elseif ($param=='LIFE TIME' || $param=='life time' || $param =='Life time') {
                  $check="select * from `satellite` where LIFETIME='$old' and SATID='$tableid'";
                    $res=mysqli_query($connection, $check);
                    if($res){
                      $cc=mysqli_num_rows($res);
                      if($cc>0){
                        $res1="update `satellite` set `LIFETIME`='$new' where `satellite`.`SATID`='$tableid' and `satellite`.`LIFETIME`='$old'";
                        $fin0=mysqli_query($connection, $res1);
                        if($fin0){
                          $sucess=1;
                        }
                        
                      }
                      else{
                        $error=1;
                        }
                    
                    }
                }
                else{
                  $satid=1;

                }
                
                
              }
              else{
                $invalid=1;
                // echo '<script type="text/javascript">alert("UNDER SAT")</script>';

              }
              
              
            }
            else{
              $fail=1;
            }
            
           }
           
      }
      else{
        $fail=1;
      }
    }
   // else{
    //   $invalid=1;
    // }
}
?>

<!DOCTYPE html> 
<head>  
<title>  Update </title>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<head>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<link rel="icon" href="images/nwicon.png" type="image/png">
<style> 
 
body {  
  background-image: url('images/image.jpg');
  background-repeat: no-repeat;
  background-size: cover; 
  color: #f8f2f8;  
  font-family: "Roboto", Arial, Helvetica, sans-serif;  
  font-size: 16px;  
  font-weight: 300;  
  letter-spacing: 0.01em;  
  line-height: 1.6em;  
  margin: 0;  
  padding: 100px;   
  }  
  
h4 {  
  font-weight: bold;  
  margin-bottom: 2.5rem;  
 color: #000203;  
  text-align: center;  
}
/* /inner box/   */
.form-wrapper {  
  height:291px;
  background:#b1a7a6;  
  border-radius: 20px;  
  padding: 20px;  
} 
/* /text fields/  */
.form-control,  
.custom-select {  
  border-radius: 10px;  
  color: #495057;  
  background-color: #ffffff;  
  border-color:none; 
  max-height: 50px; 
}  
label{
    color:#01070e;
}
  
.form-control:focus {  
  color: #495057;  
  background-color: #f1f1f1;  
  border: 1px solid #3494e6;  
  outline: 0;  
  box-shadow: none;  
}  
  
.btn {  
  background: #010c16;  
  border: #3494e6;  
  padding: 0.6rem 3rem;  
  font-weight: bold;  
}  
.btn:hover,  
.btn:focus,  
.btn:active,  
.btn-primary:not(:disabled):not(.disabled).active,  
.btn-primary:not(:disabled):not(.disabled):active,  
.show > .btn-primary.dropdown-toggle {  
  background: #3494e6;  
  border: #3494e6;  
  outline: 0;  
}  
button {  

   position: absolute;
    right: 267px;
    top: 241px;

    display: inline-block;  
    padding: 0.35em 1.2em;  
    border: 0.1em solid #3494e6;  
    margin: 0 0.3em 0.3em 0;  
    border-radius: 0.12em;  
    box-sizing: border-box;  
    text-decoration: none;  
    font-family: 'Roboto',sans-serif;  
    font-weight: 700;  
    color: #0c0f11;  
    text-align: center;  
    transition: all 0.2s;
    border-radius: 100px;  
    align-items: center;
    margin:auto;
    display:block;
    }  
    button:hover {  
    color: #FFFFFF;  
    background-color: #3494e6;  
    }  
</style> 
 
</head> 
 
<body>  
<?php

if($fail){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Cant Find the Scientist ID
  
</div>';
}

?>

<?php

if($sucess){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong></strong> Updated  Successfully!  

</div>';
}

?> 
<?php

if($invalid){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Mismatched ID!</strong> Make sure you Update your Satellite!  

</div>';
}

?> 
<?php

if($condid){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong></strong> Invalid condition  parameter!  

</div>';
}

?> 
<?php

if($satid){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong></strong> Invalid satellite parameter!  

</div>';
}

?> 
<?php

if($error){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong></strong> Old value error!  

</div>';
}

?> 
<?php

if($error1){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong></strong> Old value error! Make sure You entered date in yyyy-mm-dd format  

</div>';
}

?>
<section class="contact-from pt-4">  
  <div class="container">  
  <div class="row mt-5">  
      <div class="col-md-7 mx-auto">  
        <div class="form-wrapper">  
          <div class="row">  
            <div class="col-md-12">  
              <h4> <b> Wanna Update !! </b> </h4>  
            </div>  
          </div>  
          <form action="upsci.php"   method="post"> 
            
            <div class="row">  
              <div class="col-md-6">  
                <div class="form-group">  
         <input type="text" class="form-control" placeholder="Enter your ID"  name="sid" autocomplete="off" required >  
                </div>  
              </div>  
 


              <div class="col-md-6">  
                <div class="form-group">  
         <input type="text" class="form-control" placeholder="Enter parameter to be changed"  autocomplete="off" name="column" required >  
                </div>  
              </div> 
          
              <div class="col-md-6">  
                <div class="form-group">  
               <input type="text" class="form-control" placeholder="Enter the old value"  name="old" autocomplete="off" required >  
                </div>  
              </div>  
              <div class="col-md-6">  
                <div class="form-group">  
                  <input type="text" class="form-control" placeholder="Changed to ?"  name="new" autocomplete="off" required >  
                </div>  
              </div>  
                
              <div class="col-md-6">  
                <div class="form-group">  
                  <input type="text" class="form-control" placeholder="Enter the Id of changes" name="tableid" autocomplete="off" required >  
                </div>  
              </div>  

              <div class="col-md-6"> 
                <select  class="form-control" name="table" autocomplete="off" required> 
                   <option >Choose what changes imply to</option>
                  <option>conditions </option>  
                  <option>satellite</option>  
                  
</select>   
          
  
            </div> 
            <!-- <input type="button" class="reset" align="left">  -->
            <div class="mt-3" style="align-items: center;">  
              <button name="update"> UPDATE </button> 
              <!-- <input type="button" class="button" value="Go back!" onclick="history.back()">            -->
            
     </div>  
          </form>  
        </div>  
      </div>  
    </div>  
</div>  
</section>  
</body>  

</html>