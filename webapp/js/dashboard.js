/*Dashboard*/

function init_page() {
    $("#calendar-wrapper").hide();
    $("#settings-wrapper").hide();
    $('.materialboxed').materialbox();
    $.ajax({
        url: '../php/userInfo.php',
        type: 'POST',
        success: function(res) {
            var icon = "<i class=\"material-icons left\">person</i>"
            var userName = res.data.username;
            $(".logo-container").html(userName + icon);
        },
        error: function(res) {}
    });

    //get_items();
}

// function get_items() {
//     var list = [];

//     $.ajax({
//         url: '../php/modify.php',
//         type: 'POST',
//         success: function(res) {
//             if (res.status == 'success') {
//                 for (var i=0; i < res.data.length; i++) {
//                     list.push("<li><a>\"res.data[i]\"</a></li>");
//                 }
//                 console.log(list);
//             }
//         },
//         error: function(res) {}
//     });
// }

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
        },
        googleCalendarApiKey: 'AIzaSyD4XPGyJ-osIO1HslvEkmmXzHJTghlPnW0',
        events: {
            googleCalendarId: 'glj6o83kbhbj267bvf2fvvfpq4@group.calendar.google.com'
        }
    })
}

function show_image() {
    $.ajax({
        url: '../php/imageLocation.php',
        type: 'POST',
        success: function(res) {
            var imageLocation = res.data.imageLocation;
            if (imageLocation != '') {
                var array = imageLocation.split('/');
                var relativeLocation = array.splice(-3).join('/');
                $("#image").attr('src', relativeLocation);
            } else {
                $("#viewfinder-wrapper").hide();
            }
        },
        error: function(res) {}
    });
}


function init_dataTable() {
    $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "scrollY": 200,
        "ajax": {
            type: 'POST',
            url: '../php/userItems.php'
        },
    });
}

function userClickEvent(Event) {
    var pressed = Event.data.pressed;

    if (pressed == "calendar") {
        $(".brand-logo").text('Calendar');
        $("#table-wrapper").hide();
        $("#settings-wrapper").hide();
        $("#image-wrapper").hide();
        $("#recipe-wrapper").hide();
        $("#title").hide();
        $("#modify-wrapper").hide();
        $("#calendar-wrapper").show();
    } else if (pressed == "settings") {
        $(".brand-logo").text('Settings');
        $("#table-wrapper").hide();
        $("#calendar-wrapper").hide();
        $("#image-wrapper").hide();
        $("#recipe-wrapper").hide();
        $("#modify-wrapper").hide();
        $("#title").hide();
        $("#settings-wrapper").show();
    } else if (pressed == "dasboard") {
        $(".brand-logo").text('Dashboard');
        $("#calendar-wrapper").hide();
        $("#settings-wrapper").hide();
        $("#title").show();
        $("#image-wrapper").show();
        $("#recipe-wrapper").show();
        $("#table-wrapper").show();
        $("#modify-wrapper").show();
    } 
    else {
        console.log('None pressed');
    }
}

$("#item-dropdown").on('click', {
    pressed: "dropdown"
}, userClickEvent);

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
    init_dataTable();
    show_image();
    /*Initialize all materialize plugins*/
    M.AutoInit();
});