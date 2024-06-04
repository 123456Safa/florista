<?php

@include 'config.php';

session_start(); //gérer les variables de session.

$admin_id = $_SESSION['admin_id'];//récupère  l'ID de l'administrateur 

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){
// rendant  la chaîne sécurisée
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = mysqli_real_escape_string($conn, $_POST['price']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $image = $_FILES['image']['name'];// renvoie le nom du fichier téléchargé dans le champ de formulaire "image".
   $image_size = $_FILES['image']['size'];//contiendra la taille du fichier téléchargé en octets
   $image_tmp_name = $_FILES['image']['tmp_name'];//le nom temporaire du fichier téléchargé sur le serveur.
   $image_folter = 'uploaded_img/'.$image;// emplacement temp 

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already exist!';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, details, price, image) VALUES('$name', '$details', '$price', '$image')") or die('query failed');

      if($insert_product){
         if($image_size > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name, $image_folter);// //Cette fonction est utilisée pour déplacer le fichier 
            //téléchargé depuis son emplacement temporaire vers l'emplacement final sur le serveur.
            $message[] = 'product added successfully!';
         }
      }
   }

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);//récupérer une ligne de résultat sous forme de tableau associatif 
   unlink('uploaded_img/'.$fetch_delete_image['image']);//supprime physiquement le fichier image du produit stocké dans le dossier uploaded_img/ sur le serveur.
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query failed');
   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8"> <!-- utilisés dans différentes langues. -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Indique au navigateur de rendre la page dans le mode le plus récent disponible -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!--Spécifie comment le navigateur doit contrôler le dimensionnement et l'échelle de la page -->
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data"> <!--utilisé pour indiquer que le formulaire contient des contrôles permettant à l'utilisateur de spécifier des fichiers à envoyer avec le formulaire.-->
      <h3>add new product</h3>
      <input type="text" class="box" required placeholder="enter product name" name="name">
      <input type="number" min="0" class="box" required placeholder="enter product price" name="price">
      <textarea name="details" class="box" required placeholder="enter product details" cols="30" rows="10"></textarea>
      <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
         <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="details"><?php echo $fetch_products['details']; ?></div>
         <a href="admin_update_product.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>
   

</section>












<script src="admin_script.js"></script>

</body>
</html>
