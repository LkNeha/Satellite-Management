<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $fdate=$_POST['fdate'];
    $tdate=$_POST['tdate'];
    session_start();
    $_SESSION['DATE_OF_LAUNCH_1']=$fdate;
    $_SESSION['DATE_OF_LAUNCH_2']=$tdate;
    header('location:date.php');
}
?>
<!DOCTYPE html> 
<head>  
<title>  Date Page  </title>  
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
  height:209px;
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
    right: 275px;
    top: 152px;

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
              <h4> <b> Enter Date range !! </b> </h4>  
            </div>  
          </div>  
          <form action="searchdate.php"  method="post"> 
            
            <div class="row">  
              <div class="col-md-6">  
                <div class="form-group">
         <!-- <label for="">Enter from date:</label>            -->
         <input type="text" class="form-control" placeholder="From date 'yyyy-mm-dd'"  name="fdate" autocomplete="off" required >  
                </div>  
              </div>  
 


              <div class="col-md-6">  
                <div class="form-group">  
          <!-- <label for="">Enter to date:</label> -->
         <input type="text" class="form-control" placeholder="To date 'yyyy-mm-dd'"  autocomplete="off" name="tdate" required >  
                </div>  
              </div> 

               
               
  
          
  
            </div> 
            <!-- <input type="button" class="reset" align="left">  -->
            <div class="mt-3" style="align-items: center;">  
              <button name="update"> SEARCH </button> 
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