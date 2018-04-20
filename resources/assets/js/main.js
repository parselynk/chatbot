$(document).ready(function () {

	$('select#ticket-project-select').on('change', function(){
		if(this.value){
			var action = $(this.closest('form')).attr('action');
         var url =  action + '/' + this.value
         window.location = url; /* redirect */
         return false;
		}

	})
});


function prepareTicketPermissions(value, action, callback){
	     title = typeof title !== 'undefined' ? title : 'General question';
	     $.ajax({
         type: 'POST',
         url:  '/ticketproject',
         dataType : 'json',
         data: 
         { 
         	project: value,
         },
      })
         .done( function (response) {

         })
         .fail( function (jqXHR, status, error) {
            
         })
         .always( function() {
            // Always run after .done() or .fail()
           // $('p:first').after('<p>Thank you.</p>');
         });
}
