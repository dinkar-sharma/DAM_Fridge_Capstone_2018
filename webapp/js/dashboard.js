/*Dashboard*/

function init_page() {
    /*Initialize all materialize plugins*/
    M.AutoInit();
}

function init_calendar() {
    $('#calendar').fullCalendar({
    	locale: 'en',
        header: { 
        			left: 'prev next title',
        			right: 'month, agendaWeek, agendaDay' 
    			},
        views: {
            		month: { 
                				titleFormat: 'MMMM YYYY'
						}	
    			}
    })
}

$("#calendar-start").click(function(event) {
	/* Act on the event */
});

$(document).ready(function() {
	init_calendar();
    init_page();
});