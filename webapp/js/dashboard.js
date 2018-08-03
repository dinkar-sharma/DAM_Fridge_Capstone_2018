/*Dashboard*/

function init_page() {
	$("#calendar-wrapper").hide();
	$("#settings-wrapper").hide();
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

function userClickEvent(Event) {
	var pressed = Event.data.pressed;

	if (pressed == "calendar") {
		$(".brand-logo").text('Calendar');
		$("#settings-wrapper").hide();
		$("#calendar-wrapper").show();
	} else if (pressed == "settings") {
		$(".brand-logo").text('Settings');
		$("#calendar-wrapper").hide();
		$("#settings-wrapper").show();
	} else if (pressed == "dasboard") {
		$(".brand-logo").text('Dashboard');
		$("#calendar-wrapper").hide();
		$("#settings-wrapper").hide();
	}
	else {
		console.log('None pressed');
	}
}

$("#calendar-start").on("click", {
	pressed: "calendar"
}, userClickEvent);

$("#settings-start").on("click", {
	pressed: "settings"
}, userClickEvent);

$("#dashboard-start").on("click", {
	pressed: "dasboard"
}, userClickEvent);


$(document).ready(function() {
    init_page();
	init_calendar();
    /*Initialize all materialize plugins*/
    M.AutoInit();
});