document.addEventListener("DOMContentLoaded", function () {
	/* initialize the external events
    -----------------------------------------------------------------*/

	var containerEl = document.getElementById("external-events-list");
	new FullCalendar.Draggable(containerEl, {
		itemSelector: ".fc-event",
		eventData: function (eventEl) {
			return {
				title: eventEl.innerText.trim(),
			};
		},
	});

	//// the individual way to do it
	// var containerEl = document.getElementById('external-events-list');
	// var eventEls = Array.prototype.slice.call(
	//   containerEl.querySelectorAll('.fc-event')
	// );
	// eventEls.forEach(function(eventEl) {
	//   new FullCalendar.Draggable(eventEl, {
	//     eventData: {
	//       title: eventEl.innerText.trim(),
	//     }
	//   });
	// });

	/* initialize the calendar
    -----------------------------------------------------------------*/

	var calendarEl = document.getElementById("draggableCalendar");
	var calendar = new FullCalendar.Calendar(calendarEl, {
		headerToolbar: {
			left: "prev,next today",
			center: "title",
			right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
		},
		initialDate: "2022-10-10",
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar
		drop: function (arg) {
			// is the "remove after drop" checkbox checked?
			if (document.getElementById("drop-remove").checked) {
				// if so, remove the element from the "Draggable Events" list
				arg.draggedEl.parentNode.removeChild(arg.draggedEl);
			}
		},
		events: [
			{
				title: "Team Meeting",
				start: "2022-10-04",
				color: "#294137",
			},
			{
				title: "Training",
				start: "2022-10-07",
				end: "2022-10-08",
				color: "#768e84",
			},
			{
				groupId: 999,
				title: "Birthday",
				start: "2022-10-09",
				color: "#3b5d4f",
			},
			{
				title: "Interview",
				start: "2022-10-12",
				color: "#9daea7",
			},
			{
				title: "Travel to Japan",
				start: "2022-10-14T10:30:00",
				color: "#899e95"
			},
			{
				title: "Interview",
				start: "2022-10-21T17:30:00",
				color: "#355447",
			},
			{
				title: "Birthday",
				start: "2022-10-25T19:00:00",
				color: "#b1beb9",
			},
			{
				title: "Leave",
				start: "2022-10-28",
				color: "#627d72",
			},
		],
	});
	calendar.render();
});
