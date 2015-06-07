$(document).ready(function($){
            $('#flexinav1').flexiNav({
                flexinav_effect: 'flexinav_click', // Type of event to show the drop downs ('flexinav_hover' or 'flexinav_click')
                flexinav_show_duration: 300, // Duration to fade in drop downs
                flexinav_hide_duration: 200, // Duration to fade out drop downs
                flexinav_show_delay: 200, // Delay before fading in/out drop downs
                flexinav_trigger : false, // Button to toggle the menu bar (fixed version only)
                flexinav_hide : false, // Hides the menu bar when the page loads (fixed version only)
                flexinav_scrollbars: true, // Enables scrollbars within drop downs
                flexinav_scrollbars_height: 360, // Height of drop downs that use scrollbars (unique value in pixels)
                flexinav_responsive: true // Enables the responsive version of the menu
            });
        });

$(window).load(function() { // makes sure the whole site is loaded
        $('body').delay(350).css({'overflow':'visible'});
});