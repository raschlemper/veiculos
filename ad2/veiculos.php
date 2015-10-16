<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Veículos Cadastrados</title>

    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js" type="text/javascript"></script>  

</head>

<body>

    <?php

        $conn = mysql_connect("localhost", "root", "123456");
        mysql_select_db("locadoraveiculos");
        $result = mysql_query( "select * from veiculo");

    ?>

	<div class="content content-table">

		<div class="title">
			<h3>Veículos Cadastrados</h3>
		</div>	

		<div class="body">

            <div class="col-full">

                <div class="align-rigth">
                    <button type="button" class="btn" 
                        onclick="location.href='cadastro.php';">Voltar</button>
                </div>    

            </div>    

            <div class="col-full">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Modelo</th>
                            <th class="text-center">Ano</th>
                            <th class="text-center">Dir. Hid.</th>
                            <th class="text-center">Ar. Cond.</th>
                            <th class="text-center">Air. Bag.</th>
                            <th class="text-center">Alarme</th>
                            <th class="text-center">Banco Couro</th>
                            <th class="text-center">Som</th>
                            <th class="text-center">Travas</th>
                            <th class="text-center">Piloto</th>
                            <th class="text-center">Outros</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                while ($relacao = mysql_fetch_array($result)) {
                            ?> 
                            <td class="text-left"><?php echo $relacao["marca"]; ?></td>
                            <td class="text-left"><?php echo $relacao["modelo"]; ?></td>
                            <td class="text-center"><?php echo $relacao["ano"]; ?></td>
                            <td class="text-center"><?php if($relacao["direcao"] == 'S') { echo X; } ?></td>
                            <td class="text-center"><?php if($relacao["ar_condicionado"] == 'S') { echo X; } ?></td>
                            <td class="text-center"><?php if($relacao["air_bag"] == 'S') { echo X; } ?></td>
                            <td class="text-center"><?php if($relacao["alarme"] == 'S') { echo X; } ?></td>
                            <td class="text-center"><?php if($relacao["banco_couro"] == 'S') { echo X; } ?></td>
                            <td class="text-center"><?php if($relacao["som"] == 'S') { echo X; } ?></td>
                            <td class="text-center"><?php if($relacao["tavas"] == 'S') { echo X; } ?></td>
                            <td class="text-center"><?php if($relacao["piloto_automatico"] == 'S') { echo X; } ?></td>
                            <td class="text-center"><?php $relacao["outro"] ?></td>
                            <?php 
                                }
                            ?> 
                        </tr>
                    </tbody>    
                </table> 

            </div>

		</div>	

	</div>	

</body>

</html>
