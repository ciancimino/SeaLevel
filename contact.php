<?php

ob_start();

$name = '';
$name_err = '';

$email = '';
$email_err = '';

$phone = '';
$phone_err = '';

$message = '';
$message_err = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Validate name
    if (empty($_POST['name'])) {
        $name_err = 'Please fill out your name';
    } else {
        $name = $_POST['name'];
    }

    // Validate email
    if (empty($_POST['email'])) {
        $email_err = 'Please fill out your email';
    } else {
        $email = $_POST['email'];
    }

    // Validate phone
    if (empty($_POST['phone'])) {
        $phone_err = 'Please fill out your phone number';
    } else {
        $phone = $_POST['phone'];
    }

    // Validate message
    if (empty($_POST['message'])) {
        $message_err = 'Please fill your message';
    } else {
        $message = $_POST['message'];
    }

    // Check if all required fields are filled
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])) {
        $to = 'alexandranciancimino@gmail.com';
        $subject = 'Test email on ' . date('m/d/y, h i A');
        $body = '
        Name: ' . $name . ' ' . PHP_EOL . '
        Email: ' . $email . ' ' . PHP_EOL . '
        Phone: ' . $phone . ' ' . PHP_EOL . '
        Message: ' . $message . ' ' . PHP_EOL . '
        ';

        $header = array(
            'From' => 'noreply@sealevelbuilders.com'
        );

        // Send email to the recipient
        if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
            mail($to, $subject, $body, $header);

            // Send confirmation email to the user
            $user_subject = 'Thank you for your submission';
            $user_body = 'Dear ' . $name . ',' . PHP_EOL . PHP_EOL .
                         'Thank you for contacting us. Here is a copy of your message:' . PHP_EOL . PHP_EOL .
                         'Name: ' . $name . PHP_EOL .
                         'Email: ' . $email . PHP_EOL .
                         'Phone: ' . $phone . PHP_EOL .
                         'Message: ' . $message . PHP_EOL . PHP_EOL .
                         'We will get back to you shortly.' . PHP_EOL . PHP_EOL .
                         'Best regards,' . PHP_EOL .
                         'Sea Level Builders';

            $user_header = array(
                'From' => 'noreply@sealevelbuilders.com'
            );

            mail($email, $user_subject, $user_body, $user_header);

            header('Location: thanks.php');
        }
    }
    // end isset
}


?>

<?php include('includes/header.php'); ?>

<div class="main-wrapper">

    <div class="main-row">


    <div class="main-textbox">
            <h1>Contact Us</h1>

            <p >Call us: <a id="contact-number" href="tel:+1234567890">+1 (234) 567-8900</a> <br> or send us an email below!</p>

            <div class="contact-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post">

                <label>Name *</label>
                <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo htmlspecialchars($_POST['name']) ;?>">
                <span>
                <?php echo $name_err ;?>
                </span>

                <label>Email *</label>
                <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']) ;?>">
                <span>
                <?php echo $email_err ;?>
                </span>

                <label>Phone *</label>
                <input type="tel" name="phone" placeholder="xxx-xxx-xxxx" value="<?php if(isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']) ;?>">   
                <span>
                <?php echo $phone_err ;?>
                </span>  

                <label>Message *</label> 
                <textarea name="message"><?php if(isset($_POST['message'])) echo htmlspecialchars($_POST['message']) ;?></textarea>
                <span>
                <?php echo $message_err ;?>
                </span> 
            
                <p>* Required field</p>
            </div>

            <button class="small-button" type="submit">Submit</button>

            </form> 
           
        </div>
        <!-- end main-text -->


        <div class="main-image">
            <img src="images/exampleimage.png" alt="example">
        </div>
        <!-- end main-image -->



    </div>
    <!-- end main-row -->

</div>

<?php include('includes/footer.php'); ?>

