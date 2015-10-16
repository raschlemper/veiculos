var app = function() {

	var addMarcas = function() {
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

	var addOpcionais = function() {
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
				checkbox.id = opcional.key;
				
				var label = document.createElement('label')
				label.htmlFor = opcional.key;
				label.appendChild(document.createTextNode(opcional.label));

				div.appendChild(checkbox);
				div.appendChild(label);

				if(opcional.input) {			
					var text = document.createElement('input');
					text.type = opcional.input;
					text.id = opcional.key + 'Input';
					text.name = opcional.key + 'Input';
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
	    xobj.open('GET', file, true);
	    xobj.onreadystatechange = function () {
	          if (xobj.readyState == 4 && xobj.status == "200") {
	            callback(xobj.responseText);
	          }
	    };
	    xobj.send(null);  
	}

	var validateFieldMarca = function(form) {
		var field = form.marca;
		if(field.value == 0) {
			bindError(field.name, "O campo " + field.name + " deve ser selecionado!");
			return false;
		} 
		bindSuccess(field.name);
		return true;
	}

	var validateFieldModelo = function(form) {
		var field = form.modelo;
		if(!field.value) {
			bindError(field.name, "O campo " + field.name + " deve ser preenchido!");
			return false;
		}
		bindSuccess(field.name);
		return true;
	}

	var validateFieldAno = function(form) {
		var field = form.ano;
		var rangeInitial = '1970'; 
		var rangeFinal = '2014';
		if(field.value) {
			var error = null;
			var value = parseInt(field.value);
			if(!Number.isInteger(value)) { error =  "O valor preenchido não é numerico!"; };
			if(value < rangeInitial) { error = "O valor deve ser maior que " + rangeInitial + "!"; };
			if(value > rangeFinal) { error = "O valor deve ser menor que " + rangeFinal + "!"; };
			if(error) {
				bindError(field.name, error);
				return false;
			}
		}
		bindSuccess(field.name);
		return true;
	}

	var validateFieldOpcional = function(form) {
		var fields = document.getElementsByName('ckbOpcional[]');
		if(fields) {
			var error = null;
			var fieldOutros = form.outro;
			var fieldOutrosInput = form.outroInput;
			if(!verifyOneCheckboxSelected(fields)) { error =  "Selecione pelo menos um valor!"; };
			if(fieldOutros.checked && !fieldOutrosInput.value) { error = "O campo " + fieldOutros.id + " deve ser preenchido!"; }
			if(!fieldOutros.checked && fieldOutrosInput.value) { error = "O campo " + fieldOutros.id + " deve ser selecionado!"; }
			if(fieldOutros.checked && fieldOutrosInput.value 
				&& fieldOutrosInput.value.length < 2) { error = "O campo " + fieldOutros.id + " deve conter pelo menos 2 caracteres!"; }
			if(error) {
				bindError('ckbOpcional', error);
				return false;
			}
		}
		bindSuccess('ckbOpcional');
		return true;
	}

	var verifyOneCheckboxSelected = function(fields) {
		for(var i=0; i < fields.length; i++) {
			if(fields[i].checked) return true;
		}	
		return false;
	}

	var bindSuccess = function(field) {
		var element = document.getElementById(field);
		var elementError = document.getElementById(field + "-error");
		if(element) { element.className = element.className.replace('form-control-error', ''); }
		if(elementError) {
			elementError.innerHTML = '';
			elementError.style.display = 'none';}
	}

	var bindError = function(field, error) {
		var element = document.getElementById(field);
		var elementError = document.getElementById(field + "-error");
		if(element) { 
			element.className += ' form-control-error'; 
			element.focus();
		}
		if(elementError) {
			elementError.innerHTML = error;
			elementError.style.display = 'block';
		}	
	}

	return {
		addMarcas: addMarcas,
		addOpcionais: addOpcionais,
		validateFieldMarca: validateFieldMarca,
		validateFieldModelo: validateFieldModelo,
		validateFieldAno: validateFieldAno,
		validateFieldOpcional: validateFieldOpcional
	}

}();

var initCadastro = function() {
	app.addMarcas();
	app.addOpcionais();
}

var validateCadastro = function(form) {
	var error = [];
	error.push(app.validateFieldMarca(form));
	error.push(app.validateFieldModelo(form));
	error.push(app.validateFieldAno(form));
	error.push(app.validateFieldOpcional(form));
	for(var i=0; i < error.length; i++) {
		if(!error[i]) return false;
	}
	return true;
}