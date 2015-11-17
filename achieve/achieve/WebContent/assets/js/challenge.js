//toggles the classes, by default users in on which hides form, when you click the button, user is new class which shows form
$(document).ready(function() {	 
    $("#btn-add").click(function(){
        $("#add-users").toggleClass('add-users-class add-user-class');      
    }); 
});
