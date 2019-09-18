<?php
ini_set('display_errors',1); error_reporting(E_ALL);
if (isset($_POST['btn'])) {
    require 'auth.php';
    $signup = signup(filter_input(INPUT_POST, 'name'),filter_input(INPUT_POST, 'email'),filter_input(INPUT_POST, 'password'),filter_input(INPUT_POST, 'phone'));
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simple signup Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="photizo.css">
</head>

<body>
    <section class="flex-container">
        <div class="flex-items items-01">
            <div class="form-container">
                <h1>Welcome to Photizo!</h1>
                <form>
                    <?php if (isset($signup) and $signup['status']): ?>
                    <span style="text-align: center;color: green;margin: 2px auto;display: block;"><?php print $signup['message'] ?></span>
                    <?php elseif(isset($signup) and !$signup['status']): ?>
                    <span style="text-align: center;color: red;margin: 2px auto;display: block;"><?php print $signup['message'] ?></span>
                    <?php endif ?>
                    <div class="form-input">
                        <label for="name">Name:</label>
                        <input type="name" name="name" placeholder="Name" required="required">
                    </div>
                    <div class="form-input">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-input">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Password" required="required">
                    </div>
                    <div class="form-input">
                        <label for="phone">Mobile number:</label>

                        <input type="tel" name="phone" placeholder="Number" required="required">
                    </div>
                    <button type="submit" name="btn">Register</button>
                    <p>Have an account? <a href="/">Log In</a> </p>
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