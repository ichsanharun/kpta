eventReceive: function(event){
	var title = event.title;
	var start = event.start.format("YYYY-MM-DD[T]HH:MM:SS");
	$.ajax({
	   url: 'process.php',
           data: 'type=new&title='+title+'&startdate='+start+'&zone='+zone,
	   type: 'POST',
           dataType: 'json',
	   success: function(response){
	   event.id = response.eventid;
	   $('#calendar').fullCalendar('updateEvent',event);
	},
           error: function(e){
           console.log(e.responseText);
	  }
        });
	 $('#calendar').fullCalendar('updateEvent',event);
	      console.log(event);
	},

  eventClick: function(event, jsEvent, view) {
       console.log(event.id);
       var title = prompt('Event Title:', event.title, { buttons: { Ok: true, Cancel: false} });
	   if (title){
		 event.title = title;
		  console.log('type=changetitle&title='+title+'&eventid='+event.id);
		    $.ajax({
		       url: 'process.php',
		       data: 'type=changetitle&title='+title+'&eventid='+event.id,
		       type: 'POST',
		       dataType: 'json',
		       success: function(response){
		       if(response.status == 'success')
		            $('#calendar').fullCalendar('updateEvent',event);
			     },
			error: function(e){
		        alert('Error processing your request: '+e.responseText);
			}
		      });
		 }
	},

  eventDragStop: function (event, jsEvent, ui, view) {
	if (isElemOverDiv()) {
               var con = confirm('Are you sure to delete this event permanently?');
	       if(con == true) {
		  $.ajax({
		      url: 'process.php',
		      data: 'type=remove&eventid='+event.id,
		      type: 'POST',
		      dataType: 'json',
		      success: function(response){
		      console.log(response);
		          if(response.status == 'success')
			       jQuery('#calendar').fullCalendar('removeEvents', event.id);
		       },
		       error: function(e){
				alert('Error processing your request: '+e.responseText);
		       }
		   });
	       }
	}
}

function isElemOverDiv() {
        var trashEl = jQuery('#trash');

        var ofs = trashEl.offset();

        var x1 = ofs.left;
        var x2 = ofs.left + trashEl.outerWidth(true);
        var y1 = ofs.top;
        var y2 = ofs.top + trashEl.outerHeight(true);

        if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
            currentMousePos.y >= y1 && currentMousePos.y <= y2) {
            return true;
        }
        return false;
    }
