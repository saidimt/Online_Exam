Morris.Donut({
	element: "donutFormatter",
	data: [
		{ value: 155, label: "voo", formatted: "at least 70%" },
		{ value: 12, label: "bar", formatted: "approx. 15%" },
		{ value: 10, label: "baz", formatted: "approx. 10%" },
		{ value: 5, label: "A really really long label", formatted: "at most 5%" },
	],
	resize: true,
	hideHover: "auto",
	formatter: function (x, data) {
		return data.formatted;
	},
	labelColor: "#007ae1",
	colors: ["#155cba", "#097ce0", "#5f9def", "#8db9f4", "#bad5f8", "#e8f1fd"],
});
