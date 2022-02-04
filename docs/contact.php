<?php
  $result = "";

  if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $mail->Host='imap.mail.me.com';
    $mail->Port=993;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='SSL';
    $mail->Username="lukramon@icloud.com";
    $mail->Password='emojisareweak';

    $mail->setFrom($email,$name);
    $mail->addAddress('lukramon@icloud.com');
    $mail->addReplyTo($email,$name);

    $mail->isHTML(true);
    $mail->Subject='Form Submission: '.$_POST['subject'];
    $mail->Body='<h1>Name: '.$name. '<br>Email: '.$email.'<br>Message: '.$_POST['message'].'</h1>';

    $headers .= "Reply-To: .$name.'&nbsp'.$name.'&nbsp'.$email.\r\n";
    $headers .= "Return-Path: .$name.'&nbsp'.'&nbsp'.$email.\r\n";
    $headers .= "From: .$email." ."\r\n" .
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

    if(!$mail->send()){
      $result="Something went wrong, please check if all lines are correctly completed and try again.";
    }
    else{
      $result="Your message was succesfully send (-:";
    }
    if(isset($_POST['spam']) && !empty($_POST['spam'])){
      die();
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luk Ramon | Contact</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
</head>

<body>
    <header class="menu-grid">
        <div class="menu-grid-item">
            <div class="menu-wrapper">
                <div class="dark-mode">
                    <label class="switch" title="Enable Dark Mode">
                        <div class="switcher"></div>
                        <div class="circle"></div>
                    </label>
                    <p class="dark-mode-call">dark-mode</p>
                </div>
                <nav>
                    <h1><svg class="logo" viewBox="0 0 490 400" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                            style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                            <title>Luk Ramon | Belgium Based Designer</title>
                            <path id="_1-20"
                                d="M257.473,83.978l145.454,-83.978l86.591,149.981l-142.839,82.468l96.736,167.551l-199.975,0l-43.826,-75.909l-20.34,75.909l-179.292,0l84.678,-316.022l172.813,-0Zm-52.706,220.882l130.647,-75.429l-75.429,-130.647l-55.218,206.076Z" />
                        </svg>
                    </h1>
                    <ul>
                        <li>
                            <a href="index.html">Logofolio</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <div class="socials">
                        <a href="https://www.instagram.com/lukramon/" target="blanc">Instagram</a>
                        <a href="https://dribbble.com/LukRamon" target="blanc">Dribbble</a>
                        <a href="https://www.linkedin.com/in/luk-ramon-5423b41a0/" target="blanc">LinkedIn</a>
                    </div>
                    <div class="obligations">
                        <p>
                            <script>
                            document.write(new Date().getFullYear())
                            </script> All Rights Reserved
                        </p>
                        <p>©lukramon</p>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <span class="result"><?= $result; ?></span>
    <section class="contact">
        <h2 id="contact" class="contact__heading">contact</h2>
        <form action="#" method="post">
            <div class="contact__img"></div>
            <input id="name" type="text" name="name" placeholder="Ben Dover" required>
            <label for="name">Name</label>
            <input id="email" type="email" name="email" placeholder="bendover@here.com" required>
            <label for="email">E-mail</label>
            <input hidden type="text" name="spam" required value="" placeholder="">
            <input id="subject" type="text" name="about" placeholder="What about the bird shit?" required>
            <label for="subject">Subject</label>
            <textarea id="message" name="message" rows="5" placeholder="Hi team," required></textarea>
            <label for="message">Message</label>
            <button type="submit" name="submit">Send</button>
        </form>
    </section>
    <!-- <form action="" method="post">
            <table>
              <tr>
                <td><label for="">First name</label></td>
                <td><label for="">Name</label></td>
              </tr>
              <tr>
                <input hidden type="text" name="spam" required value="" placeholder="">
                <td><input type="text" required name="firstname" placeholder="Wise"></td>
                <td><input type="text" required name="lastname" placeholder="Helen"></td>
              </tr>
              <tr>
                <td><label for="">Email address</label></td>
                <td><label for="">Subject</label></td>
              </tr>
              <tr>
                <td><input type="email" name="email" required placeholder="helen.wise@...."></td>
                <td><input type="text" name="subject" required placeholder="Postcard"></td>
              </tr>
              <tr>
                <td><label for="text">Message</label></td>
              </tr>
              <tr>
                <td colspan="2"><textarea name="message" required placeholder="..."></textarea></td>
              </tr>
              <tr>
                <td><button type="submit" name="submit" value="">Send</button></td>
              </tr>
            </table>
          </form> -->
    <script src="app.js"></script>
</body>

</html>