var app = function() {

	var _addMarcas = function() {
		var select = document.getElementById("marca");
		loadJSON("marca.json", function(response) {  
	        var marcaJson = JSON.parse(response);
			for(var i=0; i < marcaJson.length; i++) {
				var marca = marcaJson[i];
				var option = document.createElement("option");
				option.text = marca.value;
				option.value = marca.key;
				select.add(option);
			}
	    });
	};

	var _addOpcionais = function() {
		var opcionais = document.getElementById("opcionais");
		loadJSON("opcional.json", function(response) {  
	        var opcionalJson = JSON.parse(response);
			for(var i=0; i < opcionalJson.length; i++) {
				var opcional = opcionalJson[i];
				
				var div = document.createElement('div')

				var checkbox = document.createElement("input");
				checkbox.type = "checkbox";
				checkbox.name = 'ckbOpcional[]';
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
	    });
	};

	var loadJSON = function(file, callback) {  
	    var xobj = new XMLHttpRequest();
	    xobj.overrideMimeType("application/json");
	    xobj.open('GET', file, true); // Replace 'my_data' with the path to your file
	    xobj.onreadystatechange = function () {
	          if (xobj.readyState == 4 && xobj.status == "200") {
	            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
	            callback(xobj.responseText);
	          }
	    };
	    xobj.send(null);  
	}

	return {
		addMarcas: _addMarcas,
		addOpcionais: _addOpcionais,
	}

}();

var initCadastro = function() {
	app.addMarcas();
	app.addOpcionais();
}