var app = function() {

	var _addMarcas = function() {
		var select = document.getElementById("marca");
		for(var i=0; i < app.json.marcas.length; i++) {
			var marca = app.json.marcas[i];
			var option = document.createElement("option");
			option.text = marca.value;
			option.value = marca.key;
			select.add(option);
		}
	};

	return {
		addMarcas: _addMarcas
	}

}();

window.onload = function() {
	app.addMarcas();
}