<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Veículo Cadastrado</title>

    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js" type="text/javascript"></script>  

</head>

<body>

    <?php

        $conn = mysql_connect("localhost", "root", "123456");
        mysql_select_db("locadoraveiculos");

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

        function getOpcionalValue($id) {
            foreach($_POST["ckbOpcional"] as $opcional) { 
                $opc = getOpcional($opcional);
                if($opc[key] == $id) return "S";
            }
            return null;
        }

        function getOpcionalOutroValue($id) {
            foreach($_POST["ckbOpcional"] as $opcional) { 
                $opc = getOpcional($opcional);
                if($opc[key] == $id) return "$opc[label]";
            }
            return null;
        }

        $marca = getMarca($_POST["marca"]);
        $direcao = getOpcionalValue("direcaoHidraulica");
        $ar_condicionado = getOpcionalValue("arCondiconado");
        $air_bag = getOpcionalValue("airBag");
        $alarme = getOpcionalValue("alarme");
        $banco_couro = getOpcionalValue("bancoCouro");
        $som = getOpcionalValue("som");
        $tavas = getOpcionalValue("travas");
        $piloto_automatico = getOpcionalValue("pilotoAutomatico");
        $outro = getOpcionalOutroValue("outro");

        $result = mysql_query("insert into veiculo (marca, modelo, ano, direcao, ar_condicionado, air_bag, alarme, banco_couro, som, 
                                                    tavas, piloto_automatico, outro) 
                                            values ('".$marca[value]."','".$_POST["modelo"]."','".$_POST["ano"]."',
                                                    '".$direcao."','".$ar_condicionado."','".$air_bag."',
                                                    '".$alarme."','".$banco_couro."','".$som."',
                                                    '".$tavas."','".$piloto_automatico."','".$outro."')") 
                              or die ("Erro ao cadastrar autor");

        header("location: cadastro.php");                      

    ?>

</body>

</html>
