// Loaded after CoreUI app.js
$("#mysearch").keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        $("#mysearch_form").submit();
    }
});

