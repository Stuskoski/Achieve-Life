//Puts a listener on the send submission button.  Opens a window to upload a picture and a note for the submission
$(document).on("click", "button", function () {
	  alert("Hi");
	});

$(function() {
	$(document).on("click", '#sub-sub-btn', function() {
		window.open('www.google.com', 'window name', '');
	});
	  });

$(function() {
    $(document).on('click', '.submit-submission', function(e) {
       var x = $("#sub-sub-btn").val();
       alert(text(x));
       e.preventDefault();
    });
});
