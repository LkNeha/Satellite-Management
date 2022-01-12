<?php
session_start();
if(!isset($_SESSION['VUNAME'])){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kurenaido&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="mainpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet"/>
    <link rel="icon" href="images/nwicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div >
  <h4  style="font-family:'Poppins',sans-serif" class="display">
    Hello
    <?php
     echo $_SESSION['VUNAME'];
    ?>
  </h4>
  </div>
  <header>
      <nav class="navbar">
         <ul class="navi">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#aboutus">About Us</a></li>
            <li class="item"><a href="#container">Satellite</a></li>
            <li class="item"><a href="#contactus">Contact Us</a></li>
            <!-- <li class="item"><button>login</button></li> -->
          </ul>
       </nav>
       <div class="right">
      <!-- right box for buttons  -->
      <a href="/DBMS-Project/login.php"><button class="btn" onclick="alert('LOGGED OUT')">log out</button></a>
    
    </div>
       
    </header>   
         <section>
             <h3>Welcome to  our DBMS Project </h3>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla unde placeat voluptatem quas fugiat maiores a repudiandae animi harum libero, nihil veniam provident culpa doloremque enim esse eligendi! Totam hic maxime perspiciatis, recusandae velit cupiditate.</p>
         </section>
          
         <section id="aboutus">
          <h2>Team</h2>
           <div class="container">
             
             <div class="card">
                <div class="front">
                  <img src="images/ritvik.jpg" alt="">
                    <div class="details">
                      <h2>Ritvik S Shetty</h2>
                      <span>Student/Developer</span>
                      <p>SJEC</p>
                 </div>
               </div>

               
               <div class="back">
                 <a href="#" target="blank" class="icon">
                   <i class="fab fa-instagram"></i>
                 </a>
                 <a href="https://www.linkedin.com/in/ritvik-s-shetty" target="blank" class="icon">
                   <!-- <i class="fab fa-linkedin-square"></i> -->
                   <i class="fa fa-linkedin-square"></i>
                 </a>
                 <a href="https://twitter.com/RitvikSShetty1" target="blank" class="icon">
                   <i class="fab fa-twitter"></i>
                 </a>
               </div>
             
               </div>

            
               <div class="card1">
               <div class="front1">
                 <img src="images/neha.jpeg" alt="">
                   <div class="details">
                     <h2>Neha L K</h2>
                     <span>Student/Developer</span>
                     <p>SJEC</p>
                </div>
              </div>

               <div class="back1">
                 <a href="#" target="blank" class="icon1">
                   <i class="fab fa-instagram"></i>
                 </a>
                 <a href="#" target="blank" class="icon">
                   <!-- <i class="fab fa-linkedin-square"></i> -->
                   <i class="fa fa-linkedin-square"></i>
                 </a>
                 <a href="#" target="blank" class="icon">
                   <i class="fab fa-twitter"></i>
                 </a>
               </div>
            </div>
             </div>
           
      </section>
           
          <section id="satelite">
             <h2>Satellite</h2>
            <div id="container">
            
                <div class="box">
                  <h2 style="color: black;">LAUNCH</h2>
                  <div class="information">
                  <img src="images/satlaunch.jpg" alt="">

                  </div>
                <p style="color: black;" >Hey! You tryna launch a Satellite?
                Then what are you waiting for!!
                 Here we gooo..</p>
                <a href="/DBMS-Project/sbutton.php"  rel="noopener noreferrer" target="_parent"><button class="btn1">Register</button></a>
                </div>
                <div class="box">
                  <h2 style="color: black;">INFORMATION</h2>
                  <div class="information">
                   
                   <img src="images/launch.jpg" alt=""> 
                  </div>
                  <p style="color: black;">Psst! Looking for some amazing Satellite information. Come on lets goo.. </p>
                  <a href="/DBMS-Project/button.php"  rel="noopener noreferrer" target="_parent"><button class="btn1">CLICK HERE</button></a>
                
                </div>
                <div class="box">
                <h2 style="color: black;">New Launches?</h2>

                  <div class="information">
                    <img src="images/login3.jpg" alt="">
                  </div>
                  <p style="color: black;"> Any New upcoming on board? Lets have a look at em.. </p>
                  <a href="/DBMS-Project/new.php"  rel="noopener noreferrer" target="_parent"><button class="btn1">Letss go</button></a>

                </div>
                
            
            </div>
         </section>

        <section id="contactus">
        <h2 >CONTACT US</h2>
        <h5>Team</h5>
        <span>Neha L K: <a href="" style="color: blanchedalmond;">nehalk@gmail.com</a></span>
        <span>Ritvik S Shetty: <a href="https://mail.google.com/" style="color: blanchedalmond;">ritviksshetty@gmail.com
      </a</span>
        </section> 
 
</body>
</html>