<?php 

    $conn = mysqli_connect("localhost", "root", "", "shop"
        ) or die("ERror :" . mysqli_error($conn));
     //set utf8
    mysqli_query($conn,"SET CHARACTER SET UTF8" );

    echo date('Y-m-d H:i:s');
    // // set time zone
    date_default_timezone_set('Asia/Bangkok');  
    echo '<hr>';    
    echo date ('Y-md H:i:s');
        
    
  
?>
