<?php

/* 
****************************************
******************************
******************

APIs For Prep App by Niks.

******************
******************************
****************************************
*/

set_time_limit(0);

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('Asia/Kolkata');

$current_time = date('Y-m-d H:i:s');

require_once('include/config.php');

function secureCode($key) {
    return  strtoupper($key .date('y') .date('s') .date('n')   .bin2hex(random_bytes(2)));
}



function encrypt($key) {

    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method
    
    $options = 0;
  
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '12e582122H232046';

    // Store the encryption key
    $encryption_key = "!Fdj65%dj#s^sdT#@mH";

    // Use openssl_encrypt() function to encrypt the data
    return openssl_encrypt($key, $ciphering,
                    $encryption_key, $options, $encryption_iv);

}

function decrypt($key) {

    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method
    $options = 0;
    
    // Non-NULL Initialization Vector for decryption
    $decryption_iv  = '12e582122H232046';

    
    //  Store the decryption key
    $decryption_key  = "!Fdj65%dj#s^sdT#@mH";

        
    // Use openssl_decrypt() function to decrypt the data
    return openssl_decrypt ($key, $ciphering, 
        $decryption_key, $options, $decryption_iv);
        
}
// Add New User 

if(isset($_POST['AddNewUser']) === true) {

    $c = SecureCode('user');
   $username = $conn->real_escape_string(strip_tags($_POST['username']));
   $name = $conn->real_escape_string(strip_tags($_POST['name']));
   $passcode = $conn->real_escape_string(strip_tags($_POST['passcode']));
   $securityque = $conn->real_escape_string(strip_tags($_POST['securityque']));
   $securityans = $conn->real_escape_string(strip_tags($_POST['securityans'])); 

   $passcode = encrypt($passcode);
   
   $stmt = $conn -> prepare("INSERT INTO users (uid,name,user,identity,security,answer) VALUES (?,?,?,?,?,?)");
   $stmt -> bind_param('ssssss',$c,$name,$username,$passcode,$securityque,$securityans);

   if($stmt -> execute() === True) {
      echo json_encode(array('newuser' => True ));
   }else { 
      echo json_encode(array('newuser' => True));
   }

   $conn -> close();
}


// Login User
else if(isset($_POST['LoginUser']) === True) {

   
   $username = $conn->real_escape_string(strip_tags($_POST['username']));
   $passcode = $conn->real_escape_string(strip_tags($_POST['passcode']));



    $result = $conn->query("SELECT `uid`,`identity`,`user` FROM users WHERE user = '$username'");

    if($result -> num_rows > 0 ) {

    

        $row = $result -> fetch_assoc();

        $pass = decrypt($row['identity']);

        
        if($passcode === $pass) {
            
            $uid = $row['uid'];
            $chk_user = $conn -> query("SELECT `status` FROM users WHERE uid = '$uid'");

            $chk_detail = $chk_user -> fetch_assoc();

            if ($chk_detail['status'] == 1) {
                $response = array();
            
                $response[] = array ('auth'=>'Login Success');

                foreach($result as $q) {
                $response[] = $q ;
    
                }
            
                echo json_encode($response);
            } 
            else {
                echo json_encode(array("auth" => "Your Account Disable By Admin, Contact us!"));
            }
            
        } 

        else {
            echo json_encode(array("auth" => "password was wrong!"));
        }


    } else {
        echo json_encode(array("auth" => "please try again"));
    }
  
   $conn -> close();
}


// Update User Profile

else if (isset($_POST['UpdProfile'])) {


    $uid = $conn->real_escape_string(strip_tags($_POST['uid']));

    $username = $conn->real_escape_string(strip_tags($_POST['username']));
    $name = $conn->real_escape_string(strip_tags($_POST['name']));

    if($uid.is_null(0) && $username.is_null(0) && $name.is_null(0) ) {



            
            $stmt = $conn -> query("UPDATE users SET `name` = '$name' ,`user` = '$username' WHERE `uid` LIKE '$uid' ");
            
            if($stmt   === true) {
                    
            $response = array();

            $result = $conn -> query("SELECT `uid`,`user`,`name`,`identity` FROM users WHERE `uid` = '$uid'");
            $response[] = array('profile' => 'update');

            foreach($result as $q) {
                $response[] = $q ;

            }
            
            
            echo json_encode($response);

            } else {
                echo json_encode(array("profile" => 'fail_upd'));
            }
           
        
    }
    else {
        echo json_encode(array("profile" => 'Try Again!'));
    }
    
}


// Change Password 
else if(isset($_POST['ChngPassword'])) {

    $uid = $conn->real_escape_string(strip_tags($_POST['uid']));

    $oldpass = $conn->real_escape_string(strip_tags($_POST['oldpass']));

    $newpass = $conn->real_escape_string(strip_tags($_POST['newpass']));


    $result_chk_pwd =  $conn -> query("SELECT identity FROM users WHERE uid LIKE '$uid'");

    $row_pwd = $result_chk_pwd -> fetch_assoc();

    $decrypt_oldpwd = decrypt($row_pwd['identity']); 
    
    if($decrypt_oldpwd == $oldpass) {

        $encrypt_newpass = encrypt($newpass);

        $stmt_updpass = $conn -> query("UPDATE users SET identity = '$encrypt_newpass' WHERE uid LIKE '$uid'");

        if($stmt_updpass === TRUE) {
            echo json_encode(array("password" =>'password changed'));
        }

    } else {
        echo json_encode(array("password" =>'old password was wrong'));
    }

}


// Fetch Test Questions

else if (isset($_POST['FetchQuestion']) === True) {

    $limit = 2;

    $category = $conn->real_escape_string(strtolower(strip_tags($_POST['category'])));
    $mode = $conn->real_escape_string(strtolower(strip_tags($_POST['mode'])));


    $response = array();

    $result = $conn -> query("SELECT `qid`,`ques`,`optn1`,`optn2`,`optn3`,`optn4`,`ans` FROM questions WHERE `category` = '$category' AND `mode` = '$mode' AND `status` = 1 ORDER BY RAND() LIMIT $limit");

    if($result -> num_rows >0) {

        foreach($result as $q) {
            $response[] = $q ;

        }
        
         echo json_encode($response);
    }


    
}

// Fetch Learning Questions

else if (isset($_POST['FetchLearnQuestion']) === True) {

    $limit = 4;

    $page;

    $category = $conn->real_escape_string(strtolower(strip_tags($_POST['category'])));
    
    if(isset($_POST['page'])) {
        $page = $_POST['page'];
    } else {
        $page = 1;
    }


    $start = ($page - 1) * $limit; 

    $response = array();

    $result = $conn -> query("SELECT `id`,`ques`,`answer` FROM learn WHERE `category` = '$category'  ORDER BY id DESC LIMIT $start,$limit ");

    $result_count = $conn -> query("SELECT `id`,`ques`,`answer` FROM learn WHERE `category` = '$category' ");
    $count = round($result_count -> num_rows / $limit) ;

    if($result -> num_rows >0) {

        foreach($result as $q) {
            $response[] = $q ;

        }
        
        $response[] = array("total_page" => $count);
        
         echo json_encode($response);
    }


    
}


// Fetch User Quiz History

else if (isset($_POST['FetchHistory']) === True) {

    

    
    $uid = $conn->real_escape_string(strtolower(strip_tags($_POST['uid'])));


    $response = array();

    $result = $conn -> query("SELECT `mode`,`skip`,`score`,`date` FROM history WHERE `uid` = '$uid'");

    if($result -> num_rows >0) {

        foreach($result as $q) {
            $response[] = $q ;

        }
        
         echo json_encode($response);
    } else {

        echo json_encode(array("history" => "No Record Found"));
    }


    
}


// Add User Quiz History 

else if (isset($_POST['AddQuizHistory']) === True) {

    $uid = $conn->real_escape_string(strtolower(strip_tags($_POST['uid'])));
    $mode = $conn->real_escape_string(strtolower(strip_tags($_POST['mode'])));
    $skip = $conn->real_escape_string(strtolower(strip_tags($_POST['skip'])));
    $score = $conn->real_escape_string(strtolower(strip_tags($_POST['score'])));

    $stmt = $conn -> prepare("INSERT INTO history (`uid`,`mode`,`skip`,`score`,`date`) VALUES (?,?,?,?,?)");
    $stmt-> bind_param('sssss',$uid,$mode,$skip,$score,$current_time);

    if($stmt -> execute() === True) {
        echo json_encode(array("history" => "success"));
    }else {
        echo json_encode(array("history" => "fail"));
    }

}
 


else {

    
?>

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

<?php }


