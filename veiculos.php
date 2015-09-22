<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <title>Cadastro Veículos</title>

    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js" type="text/javascript"></script>  

</head>

<body>

	<div class="content">

		<div class="title">
			<h3>Cadastro Veículos</h3>
		</div>	

		<div class="body">

			<form action="veiculo.php" method="GET" name="cadastroVeiculoForm">

				<div class="form-group">
                    <label class="col-md-2 control-label" for="gender">Marca:</label>
                    <div class="col-md-3">
                        <select class="form-control" name="gender" id="marca" name="marca">
                            <option value="0">Selecione item</option>
                            <option value="1">Chevrolet</option>
                        </select>
                    </div>
                </div>

				<!-- <table>
					<tr>
						<th class="label">Marca :</th>
						<td><input name="marca" type="text" id="marca" value=""/></td>
					</tr>
				</table> -->

			</form>

		</div>	

	</div>	

</body>

</html>
