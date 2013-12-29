<?php
    /* Thanks to http://tangledindesign.com/how-to-create-a-contact-form-using-html5-css3-and-php/
       for a lot of the php, html and css. */
    $pageName = 'Contact';
    include_once 'header.php';
    $retrySubmit = false;
    if (isset($_POST['submit'])) {
        if (trim($_POST['human']) == '4') {
            $emailSubject = 'TPP Contact from: ' . $_POST['name'];

            $emailBody = 'Name: ' . $_POST['name'];
            $emailBody .= 'Email: ' . $_POST['email'];
            $emailBody .= 'Comment: ' . nl2br(htmlspecialchars($_POST['message'], ENT_NOQUOTES | ENT_HTML5, 'UTF-8'));
            
            $mailheader = "From: ".$_POST["email"]."\r\n";
            $mailheader .= "Reply-To: ".$_POST["email"]."\r\n";
            $mailheader .= "Content-type: text/html; charset=utf-8\r\n"; 
            
            if (mail($toEmail, $emailSubject, $emailBody, $mailheader)) {
                $retrySubmit = false;
                $userMessage = 'Message sucessfully submitted.';
            } else {
                $retrySubmit = true;
                $userMessage = 'The email failed to send, please try again.<p>If it <em>still</em> doesn\'t work, please email me: ' . $toEmail;
            }
        } else {
            $retrySubmit = true;
            $userMessage = 'You answered the anti-spam question incorrectly!';
        }
    }
?>
        <div class="container">
<?php
if (isset($_POST['submit'])) {
    if ($retrySubmit) {
        echo '<div id="contact-error" class="grid 1of1">' . $userMessage . '</div>';
    } else {
        echo '<div id="contact-ok" class="grid 1of1">' . $userMessage . '</div>';
    }
}
?>
        <div class="grid 1of1">
            <form id="contact_form" method="post" action="contact.php">
                <label>*Name</label>
                <input name="name" type="text" placeholder="Type Your Name Here" required autofocus<?php if ($retrySubmit) echo ' value="' . $_POST['name'] . '"';?>>
                <label>*Email</label>
                <input name="email" type="email" placeholder="Type Your Email Address Here" required <?php if ($retrySubmit) echo ' value="' . $_POST['email'] . '"';?>>
                <label>*Message</label>
                <textarea name="message" placeholder="Type Your Message Here" required><?php if ($retrySubmit) echo $_POST['message'];?></textarea>
                <label>*What is 2+2? (Anti-spam)</label>
                <input name="human" type="text" placeholder="Type The Answer Here" required>
                <input id="contact_submit" name="submit" type="submit" value="Submit">
            </form>
        </div>
        </div>
<?php include_once 'footer.php' ?>
