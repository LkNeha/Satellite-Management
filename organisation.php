<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/nwicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Organisation Details</title> 
</head>
<style>
    body{
    background-image: url('images/nightsky.jpg');
    background-repeat: no-repeat;
    background-color: black;
    color: whitesmoke;
    margin: 0;
    padding: 0;
    height: 2525px;
    
}
</style>
<body>
    <table border="10" class="table ">
        <tr>
            <!-- <th>Organisation ID</th> -->
            <th>Organisation Name</th>
            <th>Location</th>
            <th>Number of Satellite Launch</th>
            
        </tr>


    

<?php

include 'connect.php';
$query="select * ,count(*) as COUNT from organisation O, satellite S where O.ORGID=S.ORGID group by O.ORGID order by O.ORGID";
$result=mysqli_query($connection,$query);
$total=mysqli_num_rows($result);


if($total!=0){
    while(($final=mysqli_fetch_assoc($result))){
        echo "<tr>
        <td>".$final['ORGNAME']."</td>
        <td>".$final['LOCATION']."</td>
        <td>".$final['COUNT']."</td>
         </tr>";
    }
}

?>
</table>
<div text-align="align-right">
<button class="btn"><i class="fa fa-download"></i><a href='oexecl.php'> Download</a></button>

</div>
</body>
</html>