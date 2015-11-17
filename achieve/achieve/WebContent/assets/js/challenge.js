    /* attach a submit handler to the form */
    $("#challenge-form1").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get some values from elements on the page: */
      var $form = $( this ),
          url = $form.attr( 'action' );

      /* Send the data using post */
      var posting = $.post( url, { name: $('#name').val(), name2: $('#name2').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
        alert('success');
      });
    });
    
    
    $(document.onready()){
    	
    };
    
    
    $(document).ready(function() {
    	 
        $('#btn-add').click(function(){
            alert("HEY");
        });
        $('#btn-remove').click(function(){
            $('#select-to option:selected').each( function() {
                $('#select-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $(this).remove();
            });
        });
     
    });