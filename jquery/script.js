// global variables
var id = 0;

$(document).ready(function () {
    function rgbToHex(rgb) {
        // Parse the RGB string (e.g. "rgb(255, 255, 255)")
        var parts = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
      
        // Convert each component to hexadecimal and concatenate them
        var hex = "#" + ("0" + parseInt(parts[1], 10).toString(16)).slice(-2) + 
                        ("0" + parseInt(parts[2], 10).toString(16)).slice(-2) + 
                        ("0" + parseInt(parts[3], 10).toString(16)).slice(-2);
        return hex;
    }

    // use jquery to add an event listener to the button
    $('#add').click(function () {

        // use jquery to get the value of the input fields 
        var title = $('#title').val();
        var titleColor = $('#titleColor').val();
        var titleSize = parseInt($('#titleSize').val(), 10);
        var titleFont = $('#titleFont').val();
        var bgColor = $('#bgColor').val();
        var keepValues = $('#keepValues');

        // title
        if (title === '') {
            alert('Please enter a title');
            return;
        } else if (title < 1 || title > 50) {
            alert('Please enter a title');
            return;

            // title size
        } else if (titleSize === '') {
            alert('Please enter a title size');
            return;
        } else if (titleSize < 10 || titleSize > 50) {
            alert('Please enter a title size between 10 and 50');
            return;
        } else if (!Number.isInteger(titleSize)) {
            alert('Please enter a title size between 10 and 50');
            return;

            // colors
        } else if (titleColor === bgColor) {
            alert('Please enter a different title color and background color');
            return;
        } else {
            // add the values to the html in a new div called .card
            // use the values to style the div, use title as the title
            // also use a fade in effect, which needs hiding first
            var id = Date.now(); // unique id
            $("#outputField").append("<div id=" + id + " class='card' style='background-color: " + bgColor + "; display: none;'><h1 style='color: " + titleColor + "; font-family: " + titleFont + "; font-size: " + titleSize + "px;'>" + title + "</h1></div>")
            .find('#' + id)
            .fadeIn();
        
            // position the card at the top left of the parent div
            $('#' + id).css({position: 'absolute', top: 0, left: 0});

            // make sure parent div has relative position
            $('#outputField').css({position: 'relative'});

            // reset the input fields to default if the user does not want to keep the values
            if (!keepValues.is(':checked')) {
                $('#title').val('');
                $('#titleColor').val('#7A7A7A');
                $('#titleSize').val(10);
                $('#titleFont').val('Arial');
                $('#bgColor').val('#FAFAFA');
            }
        }
    });

    // select a card
    $('#outputField').on('click', '.card', function () {
        // remove the class from any previously selected card
        $('.card-selected').removeClass('card-selected');

        // add the class to the selected card
        $(this).addClass('card-selected');

        // make the card draggable
        $(function () {
            $(".card").draggable({
                containment: "parent",
                cursor: "move"
            });
        });

        // enable the delete and edit and cancel buttons
        $('#delete').prop('disabled', false);
        $('#edit').prop('disabled', false);
        $('#cancel').prop('disabled', false);

        // disable the add button
        $('#add').prop('disabled', true);

        // get the id of the card
        var cardId = $(this).attr('id');

        // get the title of the card and other values
        var title = $(this).text();
        var titleColor = $(this).find('h1').css('color');
        var titleSize = $(this).find('h1').css('font-size');
        var titleFont = $(this).find('h1').css('font-family');
        var bgColor = $(this).css('background-color');

        // convert the values to hex
        titleColor = rgbToHex(titleColor);
        bgColor = rgbToHex(bgColor);
        
        // remove the px from the title size
        titleSize = titleSize.substring(0, titleSize.length - 2);

        // set the values of the card to the values of the input fields
        $('#title').val(title);
        $('#titleColor').val(titleColor);
        $('#titleSize').val(titleSize);
        $('#titleFont').val(titleFont);
        $('#bgColor').val(bgColor);
    });

    // use jquery to add an event listener to the edit button
    $('#edit').click(function () {
        // remove the selected card class
        $('.card-selected').removeClass('card-selected');

        // get the id of the card
        var cardId = $('.card').attr('id');

        // get the values of the input fields
        var title = $('#title').val();
        var titleColor = $('#titleColor').val();
        var titleSize = parseInt($('#titleSize').val(), 10);
        var titleFont = $('#titleFont').val();
        var bgColor = $('#bgColor').val();

        // edit the values of the card
        $('#' + cardId).find('h1').text(title);
        $('#' + cardId).find('h1').css('color', titleColor);
        $('#' + cardId).find('h1').css('font-size', titleSize + 'px');
        $('#' + cardId).find('h1').css('font-family', titleFont);
        $('#' + cardId).css('background-color', bgColor);

        // reset the input fields to default
        $('#title').val('');
        $('#titleColor').val('#7A7A7A');
        $('#titleSize').val(10);
        $('#titleFont').val('Arial');
        $('#bgColor').val('#FAFAFA');

        // disable the delete and edit and cancel buttons
        $('#delete').prop('disabled', true);
        $('#edit').prop('disabled', true);
        $('#cancel').prop('disabled', true);

        // enable the add button
        $('#add').prop('disabled', false);
    });

    // use jquery to add an event listener to the delete button
    $('#delete').click(function () {
        // remove the selected card class
        $('.card-selected').removeClass('card-selected');

        // get the id of the card
        var cardId = $('.card').attr('id');

        // use a fadeOut effect to remove the card and after the fadeOut is complete, remove the card
        $('#' + cardId).fadeOut(500, function () {
            $('#' + cardId).remove();
        });

        // reset the input fields to default
        $('#title').val('');
        $('#titleColor').val('#7A7A7A');
        $('#titleSize').val(10);
        $('#titleFont').val('Arial');
        $('#bgColor').val('#FAFAFA');

        // disable the delete and edit and cancel buttons
        $('#delete').prop('disabled', true);
        $('#edit').prop('disabled', true);
        $('#cancel').prop('disabled', true);

        // enable the add button
        $('#add').prop('disabled', false);
    });

    // use jquery to add an event listener to the cancel button
    $('#cancel').click(function () {
        // remove the selected card class
        $('.card-selected').removeClass('card-selected');

        // reset the input fields to default
        $('#title').val('');
        $('#titleColor').val('#7A7A7A');
        $('#titleSize').val(10);
        $('#titleFont').val('Arial');
        $('#bgColor').val('#FAFAFA');

        // disable the delete and edit and cancel buttons
        $('#delete').prop('disabled', true);
        $('#edit').prop('disabled', true);
        $('#cancel').prop('disabled', true);

        // enable the add button
        $('#add').prop('disabled', false);
    });

    $('#save').click(function () {
        // put all of the data of the memo's in an array
        var data = [];
        $('.card').each(function () {
            data.push({
                title: $(this).find('h1').text(),
                titleColor: $(this).find('h1').css('color'),
                titleSize: $(this).find('h1').css('font-size'),
                titleFont: $(this).find('h1').css('font-family'),
                bgColor: $(this).css('background-color')
            });
        });
        // save the data to a .json file
        var json = JSON.stringify(data);
        var blob = new Blob([json], {type: 'application/json'});
        var url = URL.createObjectURL(blob);
        var downloadLink = $('<a></a>');
        downloadLink.attr('href', url);
        downloadLink.attr('download', 'memo.json');
        downloadLink.hide();
    
        // add the link to the DOM and simulate a click event on it
        $('body').append(downloadLink);
        downloadLink[0].click();
        URL.revokeObjectURL(url);
    
        console.log("Data saved and downloaded successfully!");
    });
    
    // use jquery to add an event listener to the load button
    $('#load').click(function () {	
        var input = $('<input type="file" accept="application/json" />');
        input.on('change', function () {
            var file = input[0].files[0];
            var reader = new FileReader();
            reader.onload = function () {
                var data = JSON.parse(reader.result);
                data.forEach(function (memo) {
                    var card = $('<div class="card"></div>');
                    var title = $('<h1></h1>');
                    title.text(memo.title);
                    title.css('color', memo.titleColor);
                    title.css('font-size', memo.titleSize);
                    title.css('font-family', memo.titleFont);
                    card.css('background-color', memo.bgColor);
                    card.append(title);
                    $('#outputField').append(card);
                });
            };
            reader.readAsText(file);
        });
        input.trigger('click');
    });

    // use jquery to add an event listener to the clear button
    $('#clear').click(function () {
        // alert the user that the data will be deleted
        var result = confirm("Are you sure you want to delete all of the data?");
        if (result) {
            // remove all of the cards
            $('.card').remove();
        }
    });
});