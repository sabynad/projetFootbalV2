import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.scss';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

var ready = (callback) => {
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
});