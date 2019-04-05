<?php

$lastnameError = $firstnameError = $emailError = $countryError = $messageError = "";
$lastname = $firstname = $email = $message = $send = "";
$isSuccess = false;
$emailTo = "Losenko.alexis@gmail.com";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
     country = $_POST['country'];
     $sexe = $_POST['genre'];

     $choice = $_POST['choix'];
     $honeypot = $_POST['bot'];

     isSuccess = true;
     $emailText = "";
     if (empty($_POST['lastname'])) {
          $lastnameError = "Veuillez indiquer votre nom";
          $isSuccess = false;
     } else {
          $lastname = verifyinput($_POST['lastname']);
          $emailText .= "Nom : $lastname\n";

          if (!preg_match("/^[a-zA-Z éè-]*$/", $lastname)) {
               $lastnameError = "Seules les lettres, accents, espaces et tirets sont autorisés";
               $isSuccess = false;
          }
     }
     if (empty($_POST['firstname'])) {
          $firstnameError = "Veuillez indiquer votre prénom";
          $isSuccess = false;
     } else {
          $firstname = verifyinput($_POST['firstname']);
          $emailText .= "Prénom : $firstname\n";

          if (!preg_match("/^[a-zA-Z éè-]*$/", $firstname)) {
               $firstnameError = "Seules les lettres, accents, espaces et tirets sont autorisés";
               $isSuccess = false;
          }
     }
     if (empty($_POST['email'])) {
          $emailError = "Veuillez indiquer votre adresse mail";
          $isSuccess = false;
     } else {
          $email = verifyinput($_POST['email']);
          $emailText .= "email : $email\n";
     }
     if (empty($_POST['message'])) {
          $messageError = "Veuillez indiquer votre message";
          $isSuccess = false;
     } else {
          $message = verifyinput($_POST['message']);
     }
     if ($honeypot > 1) {
          return die("No bots allowed");
     }
     if ($isSuccess) {
          $emailText .= "Option : $choice\n";
          $emailText .= "Sexe : $sexe\n";
          $emailText .= "Pays : $country\n";
          $emailText .= "Message : $message\n";
          $headers = "From : $firstname $lastname <$email>\r\nReply-to: $email"."\r\n" .'X-Mailer: PHP/' . phpversion();
          mail($emailTo, "Message from contact form", $emailText, $headers);
          $send = "Votre E-Mail à bien été envoyé. Vous recevrez un message du support sous 48H.";
          $lastname = $firstname = $email = $country = $message = "";

      }
}
function verifyinput($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
function isEmail($email)
{
     return filter_var($email, FILTER_VALIDATE_EMAIL);
}
