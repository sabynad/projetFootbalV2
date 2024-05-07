import './bootstrap.js';

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.scss';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

let ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}


ready(() => { 
    document.querySelector('.burger-menu-button').addEventListener('click', () => {
        document.body.classList.add('open');
    });
    document.querySelector('.burger-menu-close').addEventListener('click', () => {
        document.body.classList.remove('open');
    });
    
        // Sélectionnez le bouton de fermeture
    const closeButton = document.querySelector('.burger-menu-close');

    // Sélectionnez le menu burger
    const burgerMenu = document.querySelector('.burger-menu-content');

    // Ajoutez un gestionnaire d'événements au clic sur le bouton de fermeture
    closeButton.addEventListener('click', function() {
        // Masquez le menu burger en modifiant ses styles
        burgerMenu.style.transform = 'translateX(-100%)';
        burgerMenu.style.right = '100%';
        // Ajoutez une classe au corps pour indiquer que le menu est fermé
        document.body.classList.remove('open');
    });
});

