<?php
    /* Thanks to http://tangledindesign.com/how-to-create-a-contact-form-using-html5-css3-and-php/
       for a lot of the code for this page. */
    $pageName = 'Contact';
    include_once 'inc/header.php';
    $retrySubmit = false;
    if (isset($_POST['submit'])) {
        if (trim($_POST['human']) == '4') {
            // construct email message
            $emailSubject = 'TPP Contact from: ' . $_POST['name'];

            $emailBody = 'Name: ' . $_POST['name'];
            $emailBody .= "\r\nEmail: " . $_POST['email'];
            $emailBody .= "\r\nComment: " . nl2br(htmlspecialchars($_POST['message'], ENT_NOQUOTES | ENT_HTML5, 'UTF-8'));
            
            $mailheader = "From: ".$_POST["email"]."\r\n";
            $mailheader .= "Reply-To: ".$_POST["email"]."\r\n";
            $mailheader .= "Content-type: text/html; charset=utf-8\r\n"; 
            
            // try to send the email
            if (mail($toEmail, $emailSubject, $emailBody, $mailheader)) {
                $retrySubmit = false;
                $userMessage = 'Thank you. Message successfully submitted.';
            } else {
                $retrySubmit = true;
                $userMessage = 'The email failed to send, please try again.<p>If it <em>still</em> does not work, please email me: ' . $toEmail;
            }
        } else {
            $retrySubmit = true;
            $userMessage = 'You answered the anti-spam question incorrectly!';
        }
    }
?>
        <div class="container">
<?php
// after submit message box
if (isset($_POST['submit']))
    if ($retrySubmit) {?>
        <div id="contact-error" class="grid 1of1"><?php echo $userMessage; ?></div>
<?php } else { ?>
        <div id="contact-ok" class="grid 1of1"><?php echo $userMessage; ?></div>
<?php } ?>
        <div class="grid 1of1">
            <form id="contact_form" method="post" action="contact.php">
                <label>*Name</label>
                <input name="name" type="text" placeholder="Type Your Name Here" required<?php if ($retrySubmit) echo ' value="', $_POST['name'], '"';?>>
                <label>*Email</label>
                <input name="email" type="email" placeholder="Type Your Email Address Here" required <?php if ($retrySubmit) echo ' value="', $_POST['email'], '"';?>>
                <label>*Message</label>
                <textarea name="message" placeholder="Type Your Message Here" required><?php if ($retrySubmit) echo $_POST['message'];?></textarea>
                <label>*What is 2+2? (Anti-spam)</label>
                <input name="human" type="text" placeholder="Type The Answer Here" required>
                <input id="contact_submit" name="submit" type="submit" value="Submit">
            </form>
        </div>
        </div>
<?php include_once 'inc/footer.php' ?>
