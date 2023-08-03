// create a function to get the time from the server
function getTime() {
    $.ajax({
        type: "GET",
        url: "main.php",
        success: function(data) {
            $("#myDiv").html(data);
        },
        error: function(request) {
            console.log("FOUT: " + request);
        }
    });
}

// call the function every second
setInterval(getTime, 1000);