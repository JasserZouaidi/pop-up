<!DOCTYPE html>
<html lang="en">
    <!-- Github.com/ZouaidiJasser -->    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Form </title>
    <link rel="stylesheet" href="stylesheet/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <input type="checkbox" id="toggle">
    <label for="toggle" class="show-btn"><i class="far fa-envelope"></i></label>
    <div class="container">
        <label for="toggle">
            <i class="cancel-icon fas fa-times"></i>
        </label>
        <div class="content">
            <header>E-mail Your Friends</header>
        </div>
        <form action="index.php" method="POST">
            <?php
            $userEmail = ""; 
            if (isset($_POST['send'])) { //if subscribe btn clicked
                $userEmail = $_POST['email']; //getting user entered email
                $message = $_POST['message']; //getting user entered message
                if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) { //validating user email
                    $subject = " Just a Message";
                    $sender = "From: Your Friend";
                    if (mail($userEmail, $subject, $message, $sender)) {  //php function to send mail
            ?>
                        <!-- show sucess message -->
                        <div class="alert success-alert">
                            <?php echo "Sent successfully" ?>
                        </div>
                    <?php
                        $userEmail = "";
                    } else {
                    ?>
                        <!-- show error message  -->
                        <div class="alert error-alert">
                            <?php echo "Failed " ?>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <!-- show error message -->
                    <div class="alert error-alert">
                        <?php echo "$userEmail isn't a valid email address!" ?>
                    </div>
            <?php
                }
            }
            ?>
            <div class="field">
                <input type="textarea" class="message" name="message" placeholder="Message ..." required value="">
                <input type="text" class="email" name="email" placeholder="Email Address" required value="">
            </div>
            <div class="field btn">
                <div class="layer"></div>
                <button type="submit" name="send">Send</button>
            </div>
        </form>
        <div class="text">We don't share your informations</div>
    </div>

</body>

</html>