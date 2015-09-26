<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Veículo Cadastrado</title>

    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js" type="text/javascript"></script>  

</head>

<body>
                    
    <?php 

        function getMarca($id) {
            $data = file_get_contents('marca.json');
            $json = json_decode($data, true);
            foreach ($json as $key => $value) {
                if($key == $id) { return $value; } 
            }
            return null;
        }

        function getOpcional($id) {
            $data = file_get_contents('opcional.json');
            $json = json_decode($data, true);
            foreach ($json as $key => $value) {               
                if($value[input]) { 
                    $value[label] = $_POST[$value[key]."Input"]; 
                }
                if($key == $id) { return $value; } 
            }
            return null;
        }

    ?>

	<div class="content">

		<div class="title">
			<h3>Veíulo Cadastrado</h3>
		</div>	

		<div class="body">

            <div class="col-8">

                <div class="group">
                    <div class="text-right col-4"><strong>Marca</strong></div>
                    <div class="text-left col-5">
                        <?php 
                            $marca = getMarca($_POST["marca"]);
                            echo $marca[value];
                        ?>
                    </div>
                </div>
                <div class="group">
                    <div class="text-right col-4"><strong>Modelo</strong></div>
                    <div class="text-left col-5">
                        <?php 
                            $modelo = $_POST["modelo"];
                            echo $modelo;
                        ?>
                    </div>
                </div>
                <div class="group">
                    <div class="text-right col-4"><strong>Ano Fabricação</strong></div>
                    <div class="text-left col-5">
                        <?php 
                            $ano = $_POST["ano"];
                            echo $ano;
                        ?>
                    </div>
                </div>
                <div class="group">
                    <div class="text-right col-4"><strong>Opcionais</strong></div>
                    <div class="text-left col-5">
                        <?php 
                            foreach($_POST["ckbOpcional"] as $opcional) { 
                                $opc = getOpcional($opcional);
                                echo $opc[label] . "<BR>"; 
                            }
                        ?>
                    </div>
                </div>  

            </div>

            <div class="col-2">

                <div>
                    <button type="button" class="btn" 
                        onclick="location.href='cadastro.php';">Voltar</button>
                </div>    

            </div>    

		</div>	

	</div>	

</body>

</html>
