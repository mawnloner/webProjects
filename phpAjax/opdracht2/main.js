// use jquery to call the chucknorris api when the button is pressed
$("#clickMe").click(function() {
    console.log("button clicked");
    $.ajax({
        type: "GET",
        url: "https://api.chucknorris.io/jokes/random",
        success: function(data) {
            $("#clickMe").html(data.value);
        },
        error: function(request) {
            console.log("FOUT: " + request);
        }
    });
});