// script.js
$(document).ready(function() {
    $('#userForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        $.ajax({
            type: 'POST',
            url: 'healpers\injectionhelper.php', // The PHP file to handle the request
            data: $(this).serialize(), // Serialize the form data
            success: function(response) {
                $('#result').html(response); // Update the result div with the response
            },
            error: function() {
                $('#result').html('<div class="alert alert-danger">An error occurred while processing your request.</div>');
            }
        });
    });
});
