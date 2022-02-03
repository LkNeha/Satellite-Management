<?php
$user=0;
$sucess=0;
$passw=0;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $mailfrom='satellitemag001@gmail.com';
  $username=$_POST['username'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $dob=$_POST['date'];
  $desig=$_POST['designation'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $pswd=$_POST['pswd'];
  $cpswd=$_POST['cpswd'];
  $country=$_POST['countries'];
  $number = preg_match('@[0-9]@', $pswd);
  $uppercase = preg_match('@[A-Z]@', $pswd);
  $lowercase = preg_match('@[a-z]@', $pswd);
  $specialChars = preg_match('@[^\w]@', $pswd);
  if(strlen($pswd) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars && ($pswd==$cpswd)) {
    $passw=1;
  }
  else{
    $sql ="select * from `visitor` where VUNAME='$username'";
    $result=mysqli_query($connection,$sql);
    if($result){
      $num=mysqli_num_rows($result);
      if($num>0){
        $user=1;
      }
      else{
        $query = "insert into `visitor` (`VUNAME`,`VFNAME`,`VLNAME`,`VGENDER`,`VDOB`,`VDESIG`,`VEMAIL`,`VPHONE`,`VPASSWD`,`VCOUNTRY`,`num`) values ('$username','$fname','$lname','$gender','$dob','$desig','$email','$phone','$pswd','$country','NULL')";
        $result= mysqli_query($connection,$query);
        if($result && sendmail($email)){
          // $sql="update `visitor` set count=0 where VUNAME = '$username'";
          // mysqli_query($connection,$sql);
          $sucess=1;
        }
        else{
          echo '<script type="text/javascript">alert("Server down")</script>';
        }
      }
    }
  }

}
function sendmail($email){
  require ('PHPMailer/PHPMailer.php');
  require ('PHPMailer/SMTP.php');
  require ('PHPMailer/Exception.php');
  $mail = new PHPMailer(true);
  try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'satellitemanage@gmail.com';                     //SMTP username
    $mail->Password   = 'Satellitemag001$';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('satellitemanage@gmail.com', 'SAT developers');
    $mail->addAddress($email);     //Add a recipient
    

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Confirmation: Registration Successfull!";
    $mail->Body    = "Thank you  for registering ! Keep Spacifying!";

    $mail->send();
    // echo 'Message has been sent';
    return true;
} 
catch (Exception $e) {
    // echo "Message could not be sent. ";
    return false;
}
}
?>
<! DOCTYPE html>  
<html>  
<head>  
<title>  
Registration Form 
</title>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<head>  
<link rel="stylesheet" href="signup.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<link rel="icon" href="images/nwicon.png" type="image/png">
</head> 
<script>
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;

	return true;
}
</script>
<script>
  function toggle(){
    var password=document.querySelector('[name=pswd]');
    if(password.getAttribute('type')==='password'){
      password.setAttribute('type','text');

    }
    else{
      password.setAttribute('type','password');
      
    }

  }
</script>
<body>
<?php
if($user){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oh no sorry</strong> Username already exists. Choose a different one!
  </div>';
}
?>
<?php
if($passw){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Note </strong> Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.
  </div>';
}
?>
<?php
if($sucess){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Woohooo</strong> Your signed in Successfully! Now go back to login page  
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
              <h4> <b> FILL IN </b> </h4>  
            </div>  
          </div>  
          <form _lpchecked="1" name="Regform" action="signup.php"  method="post"> 
            
            <div class="row">  
              <div class="col-md-6">  
                <div class="form-group">  
         <input type="text" class="form-control" name="fname" placeholder="First name" autocomplete="off" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required >  
                </div>  
              </div>  
              <div class="col-md-6">  
                <div class="form-group">  
                  <input type="text" name="lname" class="form-control" placeholder="Last name" autocomplete="off" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required >  
                </div>  
              </div> 
              <div class="col-md-6">  
                <div class="form-group">  
                  <input type="text" name="username" class="form-control" placeholder="username" autocomplete="off" required >  
                </div>  
              </div>  
              <div class="col-md-6">  
                <div class="form-group">  
               <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required >  
                </div>  
              </div>  
              <div class="col-md-6">  
                <div class="form-group">  
                  <input type="text" class="form-control" name="designation" placeholder="Designation" autocomplete="off" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required >  
                </div>  
              </div> 
              <div class="col-md-6">  
                <div class="form-group">  
  
                  <div class="form-check form-check-inline">  
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" autocomplete="off" required>  
                    <label class="form-check-label" for="gender" > Male </label>  
                  </div>  
                  <div class="form-check form-check-inline">  
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" autocomplete="off" required>  
                    <label class="form-check-label" for="gender" > Female </label>  
                  </div> 
                  <div class="form-check form-check-inline">  
                    <input class="form-check-input" type="radio" name="gender" id="other" value="Other" autocomplete="off" required>  
                    <label class="form-check-label" for="gender" > Other </label>  
                  </div> 
                </div>  
              </div>  
  
              <div class="col-md-6">  
                <div class="form-group">  
                  <input type="text" name="phone" class="form-control" placeholder="Phone number" autocomplete="off" onkeypress="return isNumberKey(event)" maxlength="10"  required >  
                </div>  
              </div>  
  
              <div class="col-md-6">  
                <div class="form-group">  
                  <input type="date" name="date" class="form-control" placeholder="" autocomplete="off" required>  
                </div>  
              </div>  
    <div class="col-md-6">  
                <div class="form-group">  
                  <input id="password" name="pswd" type="password" class="form-control" placeholder="Password" autocomplete="off" required="" >
                  <i class="far fa-eye" area-hidden="true" style="margin-left: 270px; margin-top:-25px; cursor: pointer;" onclick="toggle()"></i>
  
                </div>  
              </div>  
  
              <div class="col-md-6">  
                <div class="form-group">  
                  <input name=cpswd type="password" class="form-control" placeholder="Confirm Password" autocomplete="off" required>  
                </div>  
              </div>  
              <div class="col-md-12"> 
                <label class="form-check-label" for="inlineRadio1" > Select country</label>  
                <select name="countries" class="custom-select" placeholder="select your country" id="FormControlSelect1" required> 
                  <option>Afghanistan </option>  
                  <option>Albania </option>  
                  <option>Algeria </option>  
                  <option>Andorra </option>  
                  <option> Angola </option> 
                  <option >Antigua and Barbuda</option>
                  <option >Argentina</option>
                  <option >Armenia</option>
                  <option >Australia</option>
                  <option >Austria</option>
                  <option >Azerbaijan</option>
                  <option >Bahamas</option>
                  <option >Bahrain</option>
                  <option >Bangladesh</option>
                  <option >Barbados</option>
                  <option >Belarus</option>
                  <option >Belgium</option>
                  <option >Belize</option>
                  <option >Benin</option>
                  <option >Bhutan</option>
                  <option >Bolivia</option>
                  <option >Bosnia and Herzegovina</option>
                  <option >Botswana</option>
                  <option >Brazil</option>
                  <option >Brunei</option>
                  <option >Bulgaria</option>
                  <option >Burkina Faso</option>
                  <option >Burundi</option>
                  <option >Cote d'lvoire</option>
                  <option >Cabo Verde</option>
                  <option >Cambodia</option>
                  <option >Cameroon</option>
                  <option >Canada</option>
                  <option >Central Africa Republic</option>
                  <option >Chad</option>
                  <option >Chile</option>
                  <option >China</option>
                  <option >Colombia</option>
                  <option >Comoros</option>
                  <option >Congo</option>
                  <option >Costa Rica</option>
                  <option >Croatia</option>
                  <option >Cuba</option>
                  <option >Cyprus</option>
                  <option >Czechia</option>
                  <option >Democratic Republic of the Congo</option>
                  <option >Denmark</option>
                  <option >Djibouti</option>
                  <option >Dominica</option>
                  <option >Dominican Republic</option>
                  <option >Ecuador</option>
                  <option >Egypt</option>
                  <option >El Salvador</option>
                  <option >Equatorial Guinea</option>
                  <option >Eritrea</option>
                  <option >Estonia</option>
                  <option >Eswatini</option>
                  <option >Ethiopia</option>
                  <option >Fiji</option>
                  <option >Finland</option>
                  <option >France</option>
                  <option >Gabon</option>
                  <option >Gambia</option>
                  <option >Georgia</option>
                  <option >Germany</option>
                  <option >Ghana</option>
                  <option >Greece</option>
                  <option >Grenada</option>
                  <option >Guatemala</option>
                  <option >Guinea</option>
                  <option >Guinea-Bissau</option>
                  <option >Guyana</option>
                  <option >Haiti</option>
                  <option >Holy See</option>
                  <option >Hungary</option>
                  <option >Iceland</option>
                  <option >India</option>
                  <option >Indonesia</option>
                  <option >Iran</option>
                  <option >Iraq</option>
                  <option >Ireland</option>
                  <option >Israel</option>
                  <option >Italy</option>
                  <option >Jamaica</option>
                  <option >Japan</option>
                  <option >Jordan</option>
                  <option >Kazakhstan</option>
                  <option >Kenya</option>
                  <option >Kyrgyzstan</option>
                  <option >Laos</option>
                  <option >Latvia</option>
                  <option >Lebanon</option>
                  <option >Lesotho</option>
                  <option >Liberia</option>
                  <option >Libya</option>
                  <option >Liechtenstein</option>
                  <option >Lithuania</option>
                  <option >Luxembourg</option>
                  <option >Madagascar</option>
                  <option >Malawi</option>
                  <option >Malaysia</option>
                  <option >Maldives</option>
                  <option >Mali</option>
                  <option >Malta</option>
                  <option >Marshall Island</option>
                  <option >Mauitania</option>
                  <option >Maritius</option>
                  <option >Mexico</option>
                  <option >Micronesia</option>
                  <option >Moldova</option>
                  <option >Monaco</option>
                  <option >Mongolia</option>
                  <option >Montenegro</option>
                  <option >Morocco</option>
                  <option >Mozambique</option>
                  <option >Myanmar</option>
                  <option >Nauru</option>
                  <option >Nepal</option>
                  <option >Netherlands</option>
                  <option >New Zeland</option>
                  <option >Nicaragua</option>
                  <option >Niger</option>
                  <option >Nigeria</option>
                  <option >North Korea</option>
                  <option >Nort Macedonia</option>
                  <option >Norway</option>
                  <option >Oman</option>
                  <option >Pakistan</option>
                  <option >Papua New Guinea</option>
                  <option >Paraguay</option>
                  <option >Peru</option>
                  <option >Philippines</option>
                  <option >Poland</option>
                  <option >Portugal</option>
                  <option >Qatar</option>
                  <option >Romania</option>
                  <option >Russia</option>
                  <option >Rwanda</option>
                  <option >Saint Lucia</option>
                  <option >Saint VIncent and the Grenadies</option>
                  <option >Samoa</option>
                  <option >Sao Tome and Principe</option>
                  <option >Saudi Arabia</option>
                  <option >Senegal</option>
                  <option >Serbia</option>
                  <option >Seychelles</option>
                  <option >Siera Leone</option>
                  <option >Singapore</option>
                  <option >Slovenia</option>
                  <option >Solomon Island</option>
                  <option >Somalia</option>
                  <option >South Africa</option>
                  <option >Sount Korea</option>
                  <option >Souht Sudan</option>
                  <option >Spain</option>
                  <option >Sri-Lanka</option>
                  <option >Sudan</option>
                  <option >Suriname</option>
                  <option >Switzerland</option>
                  <option >Syria</option>
                  <option >Tajikistan</option>
                  <option >Tanzania</option>
                  <option >ThailandYimor-Leste</option>
                  <option >Togo</option>
                  <option >Tonga</option>
                  <option >Trinida and Tobago</option>
                  <option >Tunisia</option>
                  <option >Turkey</option>
                  <option >Turkmenistan</option>
                  <option >Tuvalu</option>
                  <option >Uganda</option>
                  <option >Ukrain</option>
                  <option >United Arab Emirates</option>
                  <option >United Kingdom</option>
                  <option >United States of America</option>
                  <option >Uruguay</option>
                  <option >Uzbekistan</option>
                  <option >Vanuatu</option>
                  <option >Venezuela</option>
                  <option >Vietnam</option>
                  <option >Yemen</option>
                  <option >Zambia</option>
                  <option >Zimbabwe</option>
                  
                  

                </select>  
              </div>  
  
            </div> 
            <!-- <input type="button" class="reset" align="left">  -->
            <div class="mt-3" style="align-items: center;">  

            <button name="register"  class="reg">REGISTER</button> 
             <button class="button"><a href="/DBMS-project/login.php">Go back</a></button> 
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