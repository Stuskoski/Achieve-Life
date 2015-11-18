//toggles the classes, by default users in on which hides form, when you click the button, user is new class which shows form
$(document).ready(function() {	 
    $("#btn-add").click(function(){
        $("#add-users").toggleClass('add-users-class add-user-class');      
    }); 
});

$(function() {
    $( "#selectable" ).selectable();
  });

function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "models/GetHint.php?q=" + str, true);
        xmlhttp.send();
    }
}

//Prevents the user from being able to submit the form with pressing enter.  Need this to keep the form from submitting when pressing enter in the search hint form.
$(document).on("keypress", ":input:not(textarea)", function(event) {
    return event.keyCode != 13;
});