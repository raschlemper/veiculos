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

	var _addOpcionais = function() {
		var opcionais = document.getElementById("opcionais");
		for(var i=0; i < app.json.opcionais.length; i++) {
			var opcional = app.json.opcionais[i];
			
			var div = document.createElement('div')

			var checkbox = document.createElement("input");
			checkbox.type = "checkbox";
			checkbox.name = 'ckbOpcional';
			checkbox.value = opcional.value;
			checkbox.id = opcional.id;
			
			var label = document.createElement('label')
			label.htmlFor = opcional.id;
			label.appendChild(document.createTextNode(opcional.label));

			div.appendChild(checkbox);
			div.appendChild(label);

			if(opcional.input) {			
				var text = document.createElement('input');
				text.type = opcional.input;
				text.id = 'input-' + opcional.id;
				text.className = 'form-control form-control-inside';
				div.appendChild(text);
			}

			opcionais.appendChild(div);
		}
	};

	return {
		addMarcas: _addMarcas,
		addOpcionais: _addOpcionais
	}

}();

window.onload = function() {
	app.addMarcas();
	app.addOpcionais();
}