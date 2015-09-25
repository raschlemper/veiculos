<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Cadastro Veíulos</title>

    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js" type="text/javascript"></script>  
    <script src="marca.json" type="text/javascript"></script>  
    <script src="opcional.json" type="text/javascript"></script>  

</head>

<body onload="initCadastro()">

	<div class="content">

		<div class="title">
			<h3>Cadastro Veíulos</h3>
		</div>	

		<div class="body">

			<form class="form-horizontal" action="veiculo.php" method="POST" name="cadastroVeiculoForm" 
                    onsubmit="return validateCadastro(this)">

                <div class="col-8">

    				<div class="form-group">
                        <label class="col-4 control-label" for="marca">Marca:</label>
                        <div class="col-6">
                            <select class="form-control" name="marca" id="marca"></select>
                            <span class="error" id="marca-error"></span>
                        </div>
                    </div>

    				<div class="form-group">
                        <label class="col-4 control-label" for="modelo">Modelo:</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="modelo" id="modelo">
                            <span class="error" id="modelo-error"></span>
                        </div>
                    </div>

    				<div class="form-group">
                        <label class="col-4 control-label" for="ano">Ano Fabricação:</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="ano" id="ano">
                            <span class="error" id="ano-error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <fieldset id="opcionais" class="col-8">
                            <span class="error" id="ckbOpcional-error"></span>
                            <legend>Opcionais:</legend>
                        </fieldset>
                    </div>

                </div>

                <div class="col-2">

                    <div class="btn-bottom">
                        <input type="submit" value="Cadastrar" class="btn"/>
                        <input type="reset" value="Limpar" class="btn">
                    </div>    

                </div>    

			</form>

		</div>	

	</div>	

</body>

</html>
