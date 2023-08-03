// when the button #searchButton is clicked use jquery ajax to get search.php with the value of the input field #searchField

// document on ready
$(document).ready(function() {
    // onload display all the books
    $.ajax({
        type: "GET",
        url: "search.php",
        data: {search: ""},
        success: function(data) {
            // decode the json object
            var obj = JSON.parse(data);
            // create a list markup
            var list = "<ul>";
            // loop through the array of objects
            for (var i = 0; i < obj.length; i++) {
                // create a list row for each object
                list += "<li>" + obj[i].title + "</li>";
            }
            // close the list
            list += "</ul>";
            // show the list in the div
            $("#result").html(list); 
        },
        error: function(request) {
            console.log("FOUT: " + request);
        }
    });

    $("#searchButton").click(function() {
        console.log("button clicked");
        $.ajax({
            type: "GET",
            url: "search.php",
            data: {search: $("#bookSearch").val()},
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
                $("#result").html(table);
            
            },
            error: function(request) {
                console.log("FOUT: " + request);
            }
        });
    });

    $("#bookSearch").keyup(function() {
        console.log("key pressed");
        $.ajax({
            type: "GET",
            url: "search.php",
            data: {search: $("#bookSearch").val()},
            success: function(data) {
                // decode the json object
                var obj = JSON.parse(data);
                // create a list markup
                var list = "<ul>";
                // loop through the array of objects
                for (var i = 0; i < obj.length; i++) {
                    // create a list row for each object
                    list += "<li>" + obj[i].title + "</li>";
                }
                // close the list
                list += "</ul>";
                // show the list in the div
                $("#result").html(list);            
            },
            error: function(request) {
                console.log("FOUT: " + request);
            }
        });
    });
});

// gebleven bij opdr 3.3 (daar aan beginnen)