<?php
 
if(isset($_POST['update'])){
    $connection= mysqli_connect("localhost","root","");
    $db= mysqli_select_db($connection,'satellitemanagement');
    // include 'connect.php';
    $sid=$_POST['sid'];
    $param=$_POST['column'];
    $old=$_POST['old'];
    $new=$_POST['new'];
    $tableid=$_POST['tableid'];
    $table=$_POST['table'];

    $sql="select * from `scientist` where 123='$sid'";               
    $result=mysqli_query($connection, $sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num=0){
            echo '<script type="text/javascript">alert("Invalid ID")</script>';
    
        }
    // else{
    //     if($table='conditions'){
    //       $query="update `conditions` set '$param'='$new' where CONDID='$tableid' ";
    //       mysqli_query($connection, $query);
    //       echo '<script type="text/javascript">alert("updated")</script>';
    //   }
    //       else if($table='rocket'){
    //           $query="update `rocket` set '$param'='$new' where RID='$tableid' ";
    //           mysqli_query($connection, $query);
    //           echo '<script type="text/javascript">alert("updated")</script>';
    //       }
    //       else{
    //           $query="update `organisation` set '$param'='$new' where CONDID='$tableid' ";
    //       mysqli_query($connection, $query);
    //       echo '<script type="text/javascript">alert("updated")</script>';
    //       }
  
    // }

  }
  


}



?>

<!DOCTYPE html> 

<head>  
<title>  
Update Page  
</title>  
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
  background-image: url('image.jpg');
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
                  <option>Condition </option>  
                  <option>Rocket </option>  
                  <option>Organisation </option>
</select>   
          
  
            </div> 
            <!-- <input type="button" class="reset" align="left">  -->
            <div class="mt-3" style="align-items: center;">  
              <button name="update"> UPDATE </button>             
     </div>  
          </form>  
        </div>  
      </div>  
    </div>  
</div>  
</section>  
</body>  

</html>