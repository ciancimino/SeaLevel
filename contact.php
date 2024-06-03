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

if($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST['name'])) {
        $name_err = 'Please fill out your name';
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['email'])) {
        $email_err = 'Please fill out your email';
    } else {
        $email = $_POST['email'];
    }

    if(empty($_POST['phone'])) { // if empty, type in your number
        $phone_err = 'Your phone number please!';
        } elseif(array_key_exists('phone', $_POST)){
        if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
        { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
        $phone_err = 'Invalid format! 000-000-0000';
        } else{
        $phone = $_POST['phone'];
        } // end else
        } // end main if

    if(empty($_POST['message'])) {
        $message_err = 'Please fill your message';
    } else {
        $message = $_POST['message'];
    }



    if(isset($_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['message']
    )) {
        $to = 'alexandranciancimino@gmail.com';
        $subject = 'Test email on '.date('m/d/y, h i A');
        $body = '
        Name: '.$name.' '.PHP_EOL.'
        Email: '.$email.' '.PHP_EOL.'
        Phone: '.$phone.' '.PHP_EOL.'
        Message: '.$message.' '.PHP_EOL.'
        ';

        $header = array(
            'From' => 'noreply@sealevelbuilders.com'
        );

        if(!empty(
            $name &&
            $email &&
            $phone && 
            $message) &&
        preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone'])) {
            mail($to, $subject, $body, $header);
            header ('Location:thanks.php');
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

            </form> `
           
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

