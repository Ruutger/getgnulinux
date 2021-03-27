const togbtn = document.querySelector('.btn-toggle');

$(window).load(function() {
    $('.sidenav').sidenav();
    $('.language-button-small').dropdown();
    $('.language-button-large').dropdown();
    $('.materialboxed').materialbox();
    $('.flexslider').flexslider({
        animation: 'fade'
    });
});

// Listen for a click on the button
togbtn.addEventListener('click', function() {
    // Then toggle (add/remove) the .dark-theme class to the body
    document.body.classList.toggle('dark-theme');  
});