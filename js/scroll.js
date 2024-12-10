$(document).ready(function() {
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
        
            if (isElementInViewport(this)) {
                $(this).animate({ opacity: 1, right: "-=50" }, 1000);
                $(this).animate({ opacity: 1, right: "-=0" }, 1000);
               
             
            }
        });
    }

    // Run the reveal function on scroll
    $(window).on('scroll', revealOnScroll);

    // Run the reveal function on page load
    revealOnScroll();

 

});


