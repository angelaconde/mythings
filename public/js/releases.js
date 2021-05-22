document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'en',
        initialView: 'dayGridMonth',
        showNonCurrentDates: false,
        fixedWeekCount: false,
        selectable: false,
        height: "auto",
        handleWindowResize: true,
        events: "/getreleases",
    });
    calendar.render();
});
