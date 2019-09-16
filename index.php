<?php
if (isset($_POST['btn'])) {
    print_r('expression');
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simple Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="photizo.css">
   
</head>

<body>

    <section class="flex-container">
    <div class="flex-items items-02">
    
    <h1><span>TEAM PHOTIZO</span></h1>

    <h6 style="color:#ffffff; text-align:center;">FRONTEND. BACKEND. DESIGN.</h6><br>
            
    <p><h3 class="intro">PHOTIZO is a Greek word which means light.<br> It is a condition of divine awareness,<br> when there is divine illumination.</h3></p><br>

         

        </div>
        <div class="flex-items items-01">
        <div class="form-container">
                <h1>Sign in to your Account</h1>
                <form method="post">
                    <span style="text-align: center;color: red;margin: 2px auto;display: block;">Login Failed!</span>
                    <div class="form-input">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email" placeholder="email">
                    </div>
                    <div class="form-input">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="password">
                    </div>
                        <button type="submit" name="btn">Sign in</button>
                        <p>Don't have an account yet? <a href="#">click here</a> </p>
                </form>
        </div>
        </div>
        
    </section>

</body>

</html>