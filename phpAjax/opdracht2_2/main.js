// use jquery to call main.php when the button is pressed and show the result in the div with id myDiv. the main.php return is a json object
$("#clickMe").click(function() {
    console.log("button clicked");
    $.ajax({
        type: "GET",
        url: "main.php",
        success: function(data) {
            // decode the json object
            var obj = JSON.parse(data);
            // create a table markup
            var table = "<table><tr><th>id</th><th>title</th><th>author</th><th>isbn</th></tr>";
            // loop through the array of objects
            for (var i = 0; i < obj.length; i++) {
                // create a table row for each object
                table += "<tr><td>" + obj[i].id + "</td><td>" + obj[i].title + "</td><td>" + obj[i].author + "</td><td>" + obj[i].isbn + "</td></tr>";
            }
            // close the table
            table += "</table>";
            // show the table in the div
            $("#myDiv").html(table);
        
        },
        error: function(request) {
            console.log("FOUT: " + request);
        }
    });
});