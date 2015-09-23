<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Cadastro Veíulos</title>

    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js" type="text/javascript"></script>  
    <script src="script.json.js" type="text/javascript"></script>  

</head>

<body>

	<div class="content">

		<div class="title">
			<h3>Cadastro Veíulos</h3>
		</div>	

		<div class="body">

			<form class="form-horizontal" action="veiculo.php" method="GET" name="cadastroVeiculoForm">

				<div class="form-group">
                    <label class="col-3 control-label" for="marca">Marca:</label>
                    <div class="col-4">
                        <select class="form-control" name="marca" id="marca"></select>
                    </div>
                </div>

				<div class="form-group">
                    <label class="col-3 control-label" for="modelo">Modelo:</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="modelo" id="modelo"></select>
                    </div>
                </div>

				<div class="form-group">
                    <label class="col-3 control-label" for="modelo">Ano Fabricação:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="modelo" id="modelo"></select>
                    </div>
                </div>

			</form>

		</div>	

	</div>	

</body>

</html>
