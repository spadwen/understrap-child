(function($) {
    // Function to update the countdown timer
    function updateCountdown() {
        // Get the target countdown time from the data attribute
        var targetTimeStr = $('#countdown').data('countdown');

        // Extract date components
        var dateParts = targetTimeStr.split(/[\/ :]/);
        var day = parseInt(dateParts[0], 10);
        var month = parseInt(dateParts[1], 10) - 1; // Months are 0-indexed in JavaScript
        var year = parseInt(dateParts[2], 10);
        var hours = parseInt(dateParts[3], 10);
        var minutes = parseInt(dateParts[4], 10);
        var ampm = dateParts[5].toLowerCase();

        // Adjust hours for AM/PM
        if (ampm === 'pm' && hours < 12) {
            hours += 12;
        } else if (ampm === 'am' && hours === 12) {
            hours = 0;
        }

        // Create a JavaScript Date object
        var targetTime = new Date(year, month, day, hours, minutes);
        console.log('Parsed Date:', targetTime);
        // Get the current time
        var now = new Date();

        // Calculate the time difference in milliseconds
        var timeDiff = targetTime - now;

        if (timeDiff <= 0) {
            // Countdown has ended
            $('#countdown').html('Countdown has ended!');
        } else {
            // Calculate days, hours, minutes, and seconds
            var days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

            // Update the HTML with the countdown
            $('#countdown').html('Countdown: ' + days + ' days ' + hours + ' hours ' + minutes + ' minutes ' + seconds + ' seconds');
        }
    }

    // Initial call to update the countdown
    updateCountdown();

    // Set an interval to update the countdown every 5 seconds (5000 milliseconds)
    setInterval(updateCountdown, 500);
})(jQuery);
