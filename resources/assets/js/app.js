/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

let alert = document.getElementById('alert');

if (alert) {
    setTimeout(function () {
        alert.style.display = 'none';
    }, 4000);
}
