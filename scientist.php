 <?php
 $success=0;
 $fail=0;
 $rock=0;
 $org=0;
 $conderror=0;
 $saterror=0;
 $scerror=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $sname=$_POST['sname'];
  $sid=$_POST['sid'];
  $semail=$_POST['semail'];
  $orgid=$_POST['orgid'];
  $satname=$_POST['satname'];
  $satid=$_POST['satid'];
  $satuser=$_POST['satuser'];
  $satpurpose=$_POST['satpurpose'];
  $satlife=$_POST['satlife'];
  $launchdate=$_POST['launchdate'];
  $rid=$_POST['rid'];
  $conid=$_POST['conid'];
  $orbit=$_POST['orbit'];
  $type=$_POST['type'];
  $longi=$_POST['longi'];
  $apogee=$_POST['apogee'];
  $perigee=$_POST['perigee'];
  $eccen=$_POST['eccen'];
  $incli=$_POST['incli'];
  $launchmass=$_POST['launchmass'];
  $power=$_POST['power'];
  $launchtime=$_POST['launchtime'];
  // $image=$_FILES['image'];

  $sql ="select * from `organisation` where ORGID = '$orgid'";
  $result=mysqli_query($connection,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num<=0){
      $org=1;
    }
    else{
      $sql4="select * from `scientist` where SID = '$sid'";
      $output4=mysqli_query($connection,$sql4);
      if($output4){
        $sccount=mysqli_num_rows($output4);
        if($sccount>0){
          $scerror=1;
        }
        else{
          $query="insert into `scientist` (`SID`,`SNAME`,`SEMAIL`,`ORGID`) values ('$sid','$sname','$semail','$orgid')";
          $result=mysqli_query($connection,$query);
          if($result){
            $sql1="select * from `rocket` where RID='$rid'";
            $output=mysqli_query($connection,$sql1);
            if($output){
              $count=mysqli_num_rows($output);
              if($count<=0){
                $del1="delete from `scientist` where SID='$sid'";
                $final1=mysqli_query($connection,$del1);
                $rock=1;
              }
              else{
                $sql3="select * from `satellite` where SATID='$satid'";
                $output3=mysqli_query($connection,$sql3);
                if($output3){
                  $countsat=mysqli_num_rows($output3);
                  if($countsat>0){
                    $del2="delete from `scientist` where SID='$sid'";
                    $final2=mysqli_query($connection,$del2);
                    $saterror=1;
                  }
                  else{
                    $query1="insert into `satellite` (`SATID`,`SATNAME`,`SATUSER`,`SATPURPOSE`,`DATE_OF_LAUNCH`,`LIFETIME`,`SATIMAGE`,`RID`,`ORGID`) values ('$satid','$satname','$satuser','$satpurpose','$launchdate','$satlife','','$rid','$orgid')";
                    $result1=mysqli_query($connection,$query1);
                    if($result1){
                      $sql2="select * from `conditions` where CONDID='$conid'";
                      $output1=mysqli_query($connection,$sql2);
                      if($output1){
                        $concount=mysqli_num_rows($output1);
                        if($concount>0){
                          $del3="delete from `scientist` where SID='$sid'";
                          $final3=mysqli_query($connection,$del3);
                          $del4="delete from `satellite` where SATID='$satid'";
                          $final4=mysqli_query($connection,$del4);
                          $conderror=1;
                        }
                        else{
                          $query2="insert into `conditions`(`CONDID`,`CLASS_OF_ORBIT`,`ORBIT_TYPE`,`LONGITUDE`,`APOGEE`,`PERIGEE`,`ECCENTRICITY`,`INCLINATION`,`LAUNCHMASS`,`PERIOD`,`POWER`) values ('$conid','$orbit','$type','$longi','$apogee','$perigee','$eccen','$incli','$launchmass','$launchtime','$power')";
                          $result2=mysqli_query($connection,$query2);
                          if($result2){
                            $query3="insert into `follows`(`SATID`,`CONDID`) values ('$satid','$conid')";
                            $result3=mysqli_query($connection,$query3);
                            if($result3){
                              $query4="insert into `dropped` (`SATID`,`RID`) values ('$satid','$rid')";
                              $result4=mysqli_query($connection,$query4);
                              if($result4){
                                $query5="insert into `uploads` (`SID`,`SATID`) values ('$sid','$satid')";
                                $result5=mysqli_query($connection,$query5);
                                if($result5){
                                  $success=1;
                                }
                                else{
                                  $fail=1;
                                  // echo '<script type="text/javascript">alert("in uploads")</script>';
                                }
                              }
                              else{
                                $fail=1;
                                // echo '<script type="text/javascript">alert("in dropped")</script>';
                              }
                            }
                            else{
                              $fail=1;  
                              // echo '<script type="text/javascript">alert("in follows")</script>';
                            }
                          }
                          else{
                            $fail=1;
                            // echo '<script type="text/javascript">alert("in condition")</script>';
                          }
                        }
                      }
                      else{
                        $fail=1;
                      }
                    }
                    else{
                      $fail=1;  
                      // echo '<script type="text/javascript">alert("in satellite")</script>';
                    }
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
          else{
            $fail=1;
            // echo '<script type="text/javascript">alert("in scientist")</script>';
          }
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
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scientist Form</title>
    <link rel="stylesheet" href="scientist.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/nwicon.png" type="image/png">
    <style>
  body {  
    background-image: url('images/nightsky.jpg');
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
    /* align: center;   */
  }
  /* /inner box/   */
  .form-wrapper {  
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
  <strong>Error Occured</strong> Try Re-entering
  
</div>';
}

?>
<?php

if($rock){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Wrong Rocket ID
  
</div>';
}

?>
<?php

if($org){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Wrong Organization ID
  
</div>';
}

?>
<?php

if($conderror){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Condition ID already exists
  
</div>';
}

?>
<?php

if($saterror){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Satellite ID already exists
  
</div>';
}

?>
<?php

if($scerror){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Scientist ID already exists
  
</div>';
}

?>

<?php

if($success){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Great!</strong> Info Entered Successfully!  

</div>';
}

?>
  <h3>Enter the details</h3>
    <div class="container">
        <form action="scientist.php" method="post" enctype="multipart/form-data">

      
          <label for="name">Scientist Name</label>
          <input type="text" id="name" name="sname" placeholder="Your name.." autocomplete="off" required>
      
          <label for="sid">Scientist ID</label>
          <input type="text" id="sid" name="sid" placeholder="Your unique id.." autocomplete="off" required>

          <label for="sid">Email</label>
          <input type="text" id="sid" name="semail" placeholder="Your email" autocomplete="off" required><br>

          <label for="organization">Organization ID</label>
          <input type="text" id="org" name="orgid" placeholder="Organization id.." autocomplete="off" required>

          

          <label for="Position">Designation</label>
          <input type="text" id="pos" name="desig" placeholder="Your Designation.." autocomplete="off" required>
      
         
      
            <!-- <section class="contact-from pt-4">   -->
          <div class="container">  
          <div class="row mt-5">  
          <div class="col-md-7 mx-auto">  
                    <div class="form-wrapper">  
                      <div class="row">  
                        <div class="col-md-12">  
                          <h4> <b> SATELLITE DETAILS!! </b> </h4>  
                        </div>  
                      </div>  
                      <form _lpchecked="1" name="Regform" action="scientist.php"  method="post"> 
                        
                        <div class="row">  
                          <div class="col-md-6">  
                            <div class="form-group">  
                     <input type="text" class="form-control" name="satname" placeholder="Satellite name" autocomplete="off" required >  
                            </div>  
                          </div>  
                          <div class="col-md-6">  
                            <div class="form-group">  
                              <input type="text" class="form-control" name="satid" placeholder="Satellite id" autocomplete="off" required >  
                            </div>  
                          </div>  
                           
                       
            
                          <div class="col-md-6">  
                            <div class="form-group">  
                              <input type="text" class="form-control"  name="satuser" placeholder="Satellite user" autocomplete="off" required >  
                            </div>  
                          </div>
                          
                          
                          <div class="col-md-6">  
                            <div class="form-group">  
                              <input type="text" class="form-control" name="satpurpose" placeholder="Satellite purpose" autocomplete="off" required >  
                            </div>  
                          </div>  
                          
                          <div class="col-md-6">  
                            <div class="form-group">  
                              <input type="number"  min="0" class="form-control" name="satlife" placeholder="Satellite lifetime (years)" required >  
                            </div>  
                          </div>  


              
                          <div class="col-md-6">  
                            <div class="form-group">  
                              <input type="date" placeholder="launchdate" name="launchdate" class="form-control" required>  
                            </div>  
                          </div>  
                
               
                          
                        <div class="mt-3" style="align-items: center;">  
                                     
                 </div>  
                      </form>  
                    </div>  
                  </div>  
                </div>  
            </div>  
            
            <!-- <script type="text/javascript">
            $(".custom-select").chosen();
            </script> -->
            
         <!-- </section> -->

          
         <label for="Position">Rocket ID</label>
         <input type="text" id="rid" name="rid" placeholder="RocketID.." autocomplete="off" required>

         
         <label for="Position">Condition ID</label>
         <input type="text" id="pos" name="conid" placeholder="Enter the condition ID" autocomplete="off" required>

         
         <label for="Position">Class of orbit</label>
         <input type="text" id="pos" name="orbit" placeholder="Enter the class of orbit" autocomplete="off" required>

         
         <label for="Position">Orbit type</label>
         <input type="text" id="pos" name="type" placeholder="Enter the orbit type" autocomplete="off" required>

         
         <label for="Position">Longitude</label>
         <input type="text" id="pos" name="longi" placeholder="Enter the longitude(in degrees)" autocomplete="off" required>

         <label for="Position">Apogee</label>
         <input type="text" id="pos" name="apogee" placeholder="Enter apogee values (in km)" autocomplete="off" required>

         <label for="Position">Perigee</label>
         <input type="text" id="pos" name="perigee" placeholder="Enter the perigee value (in km)" autocomplete="off" required>
        
         
         <label for="Position">Eccentricity</label>
         <input type="text" id="pos" name="eccen" placeholder="Enter the Eccentricity" autocomplete="off" required>

         
         <label for="Position">Inclination</label>
         <input type="text" id="pos" name="incli" placeholder="Enter the Inclination (in degrees)" autocomplete="off" required>

         
         <label for="Position">Launch mass</label>
         <input type="text" id="pos" name="launchmass" placeholder="Enter the launch mass (in kg)" autocomplete="off" required>

         
         <label for="Position">Power</label>
         <input type="text" id="pos" name="power" placeholder="Enter the power (in watts)" autocomplete="off" required>
        
         <label for="Position">Period</label>
         <input type="text" id="pos" name="launchtime" placeholder="Enter the period (in minutes)" autocomplete="off" required>
         
         <label for="Position">Launch Time</label>
         <input type="time" id="pos" name="Period" placeholder="Enter the launch time" autocomplete="off" required>


         <br>
         <br>

          <label for="subject">Write about the Satellite </label>
          <textarea id="subject" name="subject" placeholder="Write..or Optional" style="height:200px"></textarea>
          <br>
          <br>

          <label for="image"> Upload the Launch Certificate</label>
          <div class="input-group mb-3">
          <input type="file" class="form-control" name="file" required>
          </div>
          

          <input type="submit" value="Submit" align="right">
          <!-- <button name="register"  class="reg">REGISTER</button>   -->
          
      
        </form>
      </div>
</body>
</html>