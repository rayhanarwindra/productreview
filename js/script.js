$(document).ready(function () {
	let suggestions = [];

	const loadData = (query) => {
		$.ajax({
			method: "GET",
			url: `${base_url}index.php/product/fetch_products`,
			data: { query: query },
			success: function (response) {
				suggestions = setItems(response);
				setAutoComplete();
			},
		});
	};

	const setAutoComplete = () => {
		console.log(suggestions);
		$(function () {
			$("#search").autocomplete({
				source: suggestions,
			});
		});
	};

	const setItems = (data) => {
		if (data) {
			data = JSON.parse(data);
			return data.map((d) => d.name);
		} else {
			return [];
		}
	};

	$("#search").keypress(function (e) {
		loadData($(this).val());
	});
});
