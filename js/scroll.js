setTimeout(function() { $('#loader').fadeOut('slow', function() { $('#content').fadeIn('slow'); }); }, 5000);

$(document).ready(function() {
    //loader
    
    
    // Function to check if an element is in viewport
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Function to add the 'visible' class to elements in viewport
    function revealOnScroll() {
        $('.hidden').each(function() {
        
            $(window).on('scroll', function() { $('.hidden').each(function() { var elementTop = $(this).offset().top; var viewportBottom = $(window).scrollTop() + $(window).height(); if (elementTop < viewportBottom) { $(this).addClass('visible'); } else { $(this).removeClass('visible'); } }); });
        });
    }

    // Run the reveal function on scroll
    $(window).on('scroll', revealOnScroll);

    // Run the reveal function on page load
    revealOnScroll();

 

});


