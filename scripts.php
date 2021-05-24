<!DOCTYPE html>
<html lang="en">
<head>

	
    <title>Prep App </title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!-- Libraries CSS -->
    <link href="assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/particle_video_dark.css" rel="stylesheet">


   
</head>
<body >



<!-- Hero Section
================================================== -->
<section id="hero" class="hero-section-video-dark">
    <div class="video-overlay"></div>
    <!-- /.video-overlay -->
    <div class="hero-video">
        <video autoplay loop poster="assets/video/particle-video-dark.jpg" id="bgvid" muted playsinline>
            <source src="assets/video/particle-video-dark.mp4" type="video/mp4">
            <source src="assets/video/particle-video-dark.webm" type="video/webm">
        </video>
    </div>
    
</section>
</body>


</html>



<?php   @session_start();



/*
    //  ***********************************
    //  ********************
    //  ***********
    //  ******
    //  ***
    //         ADMIN PANEL  BACKEND SCRIPTS 
    //  ***
    //  ******
    //  ***********
    //  ********************
    //  ************************************ 
*/

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('Asia/Kolkata');


// Current Date Time
$currentDateTime = date('Y-m-d H:i:s');

// For Identify Blocks
$code = '';

$SERVER = "remotemysql.com";
$USER = "URPPIcJUN1";
$PASSWORD = "Hk4ou5T01K";
$DBNAME = "URPPIcJUN1";


// Connection Variable
$conn = new mysqli($SERVER,$USER,$PASSWORD,$DBNAME) OR die("Connection Problems") ;
// $conn->connect($SERVER,$USER,$PASSWORD,$DBNAME) OR die("Connection Problems");

// For Creating Unique Code
function secureCode($key) {
    return  strtoupper($key  .bin2hex(random_bytes(4)));
}


// Add Category On DB
if (isset($_POST['AddCategory']) == True) {

    $category =  $conn->real_escape_string(strtolower(strip_tags($_POST['category']))); 
  
    $stmt = $conn->prepare("INSERT INTO category(category) VALUES (?)");
    $stmt->bind_param('s',$category);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./categories.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./categories.php";</script>'; 
    }

    $conn->close();
    
}


// Disable People Account
else if(isset($_GET['DlUAccount']) == True) {

    $id =  $conn->real_escape_string(strip_tags($_GET['s'])); 
  
    $stmt = $conn->prepare("UPDATE users SET status = 0 WHERE uid = ?");
    $stmt->bind_param('s',$id);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./customers.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./customers.php";</script>'; 
    }

    $conn->close();
}


// Delete Category
else if(isset($_GET['DlCategory']) == True) {

    $id =  $conn->real_escape_string(strip_tags($_GET['s'])); 
  
    $stmt = $conn->prepare("UPDATE category SET status = 0 WHERE id = ?");
    $stmt->bind_param('s',$id);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./categories.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./categories.php";</script>'; 
    }

    $conn->close();
}


// Add New Question
else if(isset($_POST['NewQuesiton']) == True) {

    $secure = secureCode('Ques');
    $category =  $conn->real_escape_string(strtolower(strip_tags($_POST['category']))); 
    $mode =  $conn->real_escape_string(strtolower(strip_tags($_POST['mode']))); 
    $ques =  $conn->real_escape_string(strip_tags($_POST['ques'])); 
    $answ =  $conn->real_escape_string(strip_tags($_POST['answ'])); 
    $optn1 =  $conn->real_escape_string(strip_tags($_POST['optn1'])); 
    $optn2 =  $conn->real_escape_string(strip_tags($_POST['optn2'])); 
    $optn3 =  $conn->real_escape_string(strip_tags($_POST['optn3'])); 
    $optn4 =  $conn->real_escape_string(strip_tags($_POST['optn4'])); 
  
    $stmt = $conn->prepare("INSERT INTO questions(qid,ques,optn1,optn2,optn3,optn4,ans,category,mode ) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssssss',$secure,$ques,$optn1,$optn2,$optn3,$optn4,$answ,$category,$mode);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./questions.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./questions.php";</script>'; 
    }

    $conn->close();

}

// New Learning Questions
else if(isset($_POST['NewLearnQuesiton']) == True) {

    $secure = secureCode('Ques');
    $category =  $conn->real_escape_string(strtolower(strip_tags($_POST['category']))); 
    $ques =  $conn->real_escape_string(strip_tags($_POST['ques'])); 
    $answ =  $conn->real_escape_string(strip_tags($_POST['answ'])); 
  
    $stmt = $conn->prepare("INSERT INTO learn(category,ques,answer) VALUES (?,?,?)");
    $stmt->bind_param('sss',$category,$ques,$answ);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./learning.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./learning.php";</script>'; 
    }

    $conn->close();

}


// Update Existing Question 
else if(isset($_POST['UpdQuesiton']) == True) {

    $secure =  $conn->real_escape_string(strip_tags($_POST['q'])); 
    $category =  $conn->real_escape_string(strip_tags($_POST['category'])); 
    $mode =  $conn->real_escape_string(strip_tags($_POST['mode'])); 
    $ques =  $conn->real_escape_string(strip_tags($_POST['ques'])); 
    $answ =  $conn->real_escape_string(strip_tags($_POST['answ'])); 
    $optn1 =  $conn->real_escape_string(strip_tags($_POST['optn1'])); 
    $optn2 =  $conn->real_escape_string(strip_tags($_POST['optn2'])); 
    $optn3 =  $conn->real_escape_string(strip_tags($_POST['optn3'])); 
    $optn4 =  $conn->real_escape_string(strip_tags($_POST['optn4'])); 
  
    $stmt = $conn->prepare("UPDATE questions SET ques = ?,optn1 = ?,optn2 = ?,optn3 = ?,optn4 = ?,ans = ?, category = ? , mode = ? WHERE qid = ?");
    $stmt->bind_param('sssssssss',$ques,$optn1,$optn2,$optn3,$optn4,$answ,$category,$mode,$secure);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./questions.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./questions.php";</script>'; 
    }

    $conn->close();

}

// Update Learning Questions

else if(isset($_POST['UpdLernQuesiton']) == True) {

    $secure =  $conn->real_escape_string(strip_tags($_POST['q'])); 
    $category =  $conn->real_escape_string(strip_tags($_POST['category'])); 
    $ques =  $conn->real_escape_string(strip_tags($_POST['ques'])); 
    $answ =  $conn->real_escape_string(strip_tags($_POST['answ'])); 
   
    $stmt = $conn->prepare("UPDATE learn SET ques = ?,answer = ?, category = ? WHERE id = ?");
    $stmt->bind_param('sssi',$ques,$answ,$category,$secure);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./learning.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./learning.php";</script>'; 
    }

    $conn->close();

}

// Delete Question
else if(isset($_GET['DlQuestion']) == True) {

    $id =  $conn->real_escape_string(strip_tags($_GET['s'])); 
  
    $stmt = $conn->prepare("UPDATE questions SET status = 0 WHERE qid = ?");
    $stmt->bind_param('s',$id);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./questions.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./questions.php";</script>'; 
    }

    $conn->close();
}

// Delete Learning Questions

else if(isset($_GET['DlLernQuestion']) == True) {

    $id =  $conn->real_escape_string(strip_tags($_GET['s'])); 
  
    $stmt = $conn->prepare("DELETE FROM `learn` WHERE `learn`.`id` = ?");
    $stmt->bind_param('i',$id);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./learning.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./learning.php";</script>'; 
    }

    $conn->close();
}


// Add New Administrator
else if(isset($_POST['Admini']) == True) {

    $user = $conn->real_escape_string(strip_tags($_POST['username'])); 
    $simple = $conn->real_escape_string(strip_tags($_POST['passcode'])); 

    // Store the cipher method
    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
  
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1203011163740195';

    // Store the encryption key
    $encryption_key = "G#87D%23@46bOcx!Vk5T";

    // Use openssl_encrypt() function to encrypt the data
    $encryption = openssl_encrypt($simple, $ciphering,
                    $encryption_key, $options, $encryption_iv);


    $stmt = $conn->prepare("INSERT INTO administrator (exec_username,exec_password) VALUES (?,?)");
    $stmt->bind_param('ss',$user,$encryption);
    
    if($stmt->execute() === TRUE) {
        echo '<script>window.alert("Succesfully ");
        window.location.href="./blank.php";</script>'; 
    }else {
        echo '<script>window.alert("Fail ");
        window.location.href="./blank.php";</script>'; 
    }

    $conn->close();
    
}


// Login Administrator
else if(isset($_POST['LogAdmin']) == True) {

    $user = $conn->real_escape_string(strip_tags($_POST['username'])); 
    $simple = $conn->real_escape_string(strip_tags($_POST['passcode'])); 


    $result = $conn->query("SELECT * FROM administrator WHERE exec_username = '$user'");
    
    if($result->num_rows>0) {

        $row = $result->fetch_assoc();
        
        $encryption = $row['exec_password'];

          // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $options = 0;
    
        // Non-NULL Initialization Vector for decryption
        $decryption_iv  = '1203011163740195';

        //  Store the decryption key
        $decryption_key  = "G#87D%23@46bOcx!Vk5T";

        
        // Use openssl_decrypt() function to decrypt the data
        $decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);
            

        if($simple === $decryption) {

            setcookie("Auth" ,'TRUE',time()+ (60*60),'/');
            echo '<script>window.alert("Success ");
            window.location.href="./index.php";</script>'; 
        } else {
            echo '<script>window.alert("Try Again ");
            window.location.href="./auth-login.php";</script>'; 
        }


    } else {
        echo '<script>window.alert("username or password does not exist ");
            window.location.href="./auth-login.php";</script>'; 
    }

    $conn->close();
    
}

else{
    $conn->close();
}


?>

