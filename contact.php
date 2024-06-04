<?php

@include 'config.php'; // Inclure le fichier de configuration s'il existe.

session_start(); // Démarrer la session.

$user_id = $_SESSION['user_id']; // Récupérer l'identifiant de l'utilisateur à partir de la session.

if(!isset($user_id)){ // Vérifier si l'identifiant de l'utilisateur n'est pas défini.
   header('location:login.php'); // Rediriger vers la page de connexion.
};

if(isset($_POST['send'])){ // Vérifier si le formulaire a été soumis.

    $name = mysqli_real_escape_string($conn, $_POST['name']); // Échapper les caractères spéciaux et sécuriser le nom.
    $email = mysqli_real_escape_string($conn, $_POST['email']); // Échapper les caractères spéciaux et sécuriser l'e-mail.
    $number = mysqli_real_escape_string($conn, $_POST['number']); // Échapper les caractères spéciaux et sécuriser le numéro.
    $msg = mysqli_real_escape_string($conn, $_POST['message']); // Échapper les caractères spéciaux et sécuriser le message.

    // Sélectionner les messages existants de la base de données correspondant aux données saisies.
    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    // Vérifier s'il existe déjà des messages correspondant.
    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message sent already!'; // Message indiquant que le message a déjà été envoyé.
    }else{
        // Insérer le nouveau message dans la base de données.
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'message sent successfully!'; // Message indiquant que le message a été envoyé avec succès.
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- Lien CDN pour Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php @include 'header.php'; // Inclure l'en-tête. ?>

<section class="heading">
    <h3>contact us</h3>
    <p> <a href="home.php">home</a> / contact </p>
</section>

<section class="contact">

    <form action="" method="POST">
        <h3>send us message!</h3>
        <input type="text" name="name" placeholder="enter your name" class="box" required> 
        <input type="email" name="email" placeholder="enter your email" class="box" required>
        <input type="number" name="number" placeholder="enter your number" class="box" required>
        <textarea name="message" class="box" placeholder="enter your message" required cols="30" rows="10"></textarea>
        <input type="submit" value="send message" name="send" class="btn">
    </form>

</section>

<?php @include 'footer.php'; // Inclure le pied de page. ?>

<script src="script.js"></script>

</body>
</html>
