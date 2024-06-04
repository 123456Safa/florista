// Sélectionne l'élément avec la classe '.navbar' dans l'élément avec les classes '.header .flex'

let navbar = document.querySelector('.header .flex .navbar');

// Sélectionne l'élément avec la classe '.account-box' dans l'élément avec les classes '.header .flex'

let userBox = document.querySelector('.header .flex .account-box');


// Ajoute un gestionnaire d'événements pour le clic sur le bouton avec l'ID 'menu-btn'

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');   // Bascule la classe 'active' sur l'élément 'navbar'

   userBox.classList.remove('active');   // Retire la classe 'active' de l'élément 'userBox'

}
// Ajoute un gestionnaire d'événements pour le clic sur le bouton avec l'ID 'user-btn'

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');    // Bascule la classe 'active' sur l'élément 'userBox'

   navbar.classList.remove('active');   // Retire la classe 'active' de l'élément 'navbar'

}
// Ajoute un gestionnaire d'événements pour le défilement de la fenêtre

window.onscroll = () =>{
   navbar.classList.remove('active');   // Retire la classe 'active' de l'élément 'navbar' lors du défilement

   userBox.classList.remove('active');   // Retire la classe 'active' de l'élément 'userBox' lors du défilement

}
