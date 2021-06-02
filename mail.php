<?php

    $to = "dcracksaa@gmail.com";
    $subject = "test mail";
    $message = "hello";
    $from = "dcracksaa@gmail.com";
    $headers = "From: $from";

    mail($to,$subject,$message,$headers);

    echo "mail send";
