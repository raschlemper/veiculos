<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Veíulo Cadastrado</title>

    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js" type="text/javascript"></script>  

</head>

<body>
                    
    <?php 

        function getMarca($id) {
            $data = file_get_contents('marca.json');
            $json = json_decode($data, true);
            foreach ($json as $key => $value) {
                if ($key == $id) { return $value; } 
            }
            return null;
        }
    ?>

	<div class="content">

		<div class="title">
			<h3>Veíulo Cadastrado</h3>
		</div>	

		<div class="body">
            <div>
                <div class="text-right col-4"><strong>Marca:</strong></div>
                <div class="text-left col-5">
                    <?php 
                        $marca = getMarca($_GET["marca"]);
                        print_r($marca[value]);
                    ?>
                </div>
            </div>

		</div>	

	</div>	

</body>

</html>
