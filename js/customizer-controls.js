/**
 * Scripts within the customizer controls window.
 *
 * Adds a warning to the Theme Layout Settings section.
 */

 (function() {
	wp.customize.bind( 'ready', function() {
		// Only show the navbar type setting when running Bootstrap 5.
		wp.customize.section( 'understrap_theme_layout_options').notifications.add( 'example-warning', new wp.customize.Notification(
			'example-warning',
			{
				type: 'warning',
				message: 'You are currently using an Understrap child theme, which may override some of these settings.'
			}
		) );
	});
})();
/*
* initial the Carousel
*/
jQuery(document).ready(function($) {
    $('#myCarousel').carousel(); // Replace 'myCarousel' with the ID of your carousel element.
});

/*
* make the Carousel running every 5 seconds
*/
jQuery(document).ready(function($) {
    // Set the interval for automatic sliding (5 seconds in milliseconds)
    var carouselInterval = 5000;

    // Initialize the carousel
    $('#myCarousel').carousel();

    // Create a function to automatically advance the carousel
    function autoAdvanceCarousel() {
        $('#myCarousel').carousel('next');
    }

    // Set an interval to trigger the automatic slide change
    setInterval(autoAdvanceCarousel, carouselInterval);
});
