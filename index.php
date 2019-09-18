<?php
ini_set('display_errors',1); error_reporting(E_ALL);
if (isset($_POST['btn'])) {
    require 'auth.php';
    $login = login(filter_input(INPUT_POST, 'email'),filter_input(INPUT_POST, 'password'));
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
        <div class="flex-items items-01">
            <div class="form-container">
                <h1>Sign in to your Account</h1>
                <form method="post">
                    <?php if (isset($login) and $login['status']): ?>
                    <span style="text-align: center;color: green;margin: 2px auto;display: block;"><?php print $login['message'] ?></span>
                    <?php elseif(isset($login) and !$login['status']): ?>
                    <span style="text-align: center;color: red;margin: 2px auto;display: block;"><?php print $login['message'] ?></span>
                    <?php endif ?>
                    <div class="form-input">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-input">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Password" required="required">
                    </div>
                    <button type="submit" name="btn">Sign in</button>
                    <p>Not a User? <a href="signup.php">Join Us</a> </p>
                </form>
            </div>
        </div>
        <div class="flex-items items-02">
            <div class="items-02 logo">
                <h2><span>TP</span></h2>
            </div>
            <h1><span>TEAM PHOTIZO</span></h1>
            <p class="tagline"><em>...Work, Share, Collaborate.</em></p>
            <!--<p class="intro">PHOTIZO is a Greek word which means light. <br>It is a condition of divine awareness, when there is divine illumination.</p><br>-->
        </div>
    </section>
</body>

</html>