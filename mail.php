<?php

    $to = "dcracksaa@gmail.com";
    $subject = "test mail";
    $message = "hello";
    $from = "ritspatel50@gmail.com";
    $headers = "From: $from";

    if(mail($to,$subject,$message,$headers)) {
        echo "mail sent";
    }else {
        echo "PRob";
    }

    
