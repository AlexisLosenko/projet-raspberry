<?php
     //Variables pour les erreurs
$lastnameError = $firstnameError = $emailError = $countryError = $messageError = "";
$lastname = $firstname = $email = $message = $send = "";
//isSuccess est utilisée pour définir si tout les champs sont correctement remplis : Si ils le sont renvoie "true" sinon renvoie "false"
//Permet également d'envoyer l'email à la fin il il renvoie "true"
$isSuccess = false;
//emailto me permet de définir l'adresse mail vers laquelle seront envoyés les mails provenant du formulaire de contact
$emailTo = "cangejeremy@gmail.com";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
     //Variables ne rentrant pas dans les conditions de vérification ci-dessous
     $country = $_POST['country'];
     $sexe = $_POST['genre'];
     $choice = $_POST['choix'];
     //Mise en place du Honeypot
     $honeypot = $_POST['bot'];
     //Fin Honeypot
     $isSuccess = true;
     $emailText = "";
     if (empty($_POST['lastname'])) {
          $lastnameError = "Veuillez indiquer votre nom";
          $isSuccess = false;
     } else {
          $lastname = verifyinput($_POST['lastname']);
          $emailText .= "Nom : $lastname\n";
          //Ici on autorise uniquement l'utilisation de lettres, accents, espaces et tirets dans le nom
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
          //Ici on autorise uniquement l'utilisation de lettres, accents, espaces et tirets dans le prénom
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
          //Message de confirmation pour l'envoi de l'email (Utilisateur)
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
