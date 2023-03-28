<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Correo</title>
	<style>
		.titulo{
			color: #000000 ;
			padding-top: 20px;
			padding-bottom: 10px;
			padding-left: 20px;
			padding-right: 20px;

		}
		.body{
			background-color:  #c3cbf0 ;
		}
		.div_contenido{
			color: #000000;
			padding-top: 20px;
			padding-bottom: 10px;
			padding-left: 20px;
			padding-right: 20px;
			background-color: #000000  !important;
		}
		.div_footer{
			color: #3B1D20;
			font-size: 16px;
			padding-top: 20px;
			padding-bottom: 10px;
			padding-left: 20px;
			padding-right: 20px;
			background-color: #ff0019  !important;
		}
        .brand-logo {
            max-height: 100px;
            top: 40px;
            right: 40px;
        }
	</style>
</head>
<body class="body">

<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
	<tr>
		<td style="background-color: #ecf0f1; text-align: left; padding: 0">
			 
			</a>
		</td>
	</tr>

	<tr>
		<td style="padding: 0">
		 
		</td>
	</tr>

	<tr>
		<td style="background-color: #ecf0f1">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
				<h2 style="color: #e67e22; margin: 0 0 7px">Hola !</h2>
				<p style="margin: 2px; font-size: 15px">
                    Adjuntamos reporte del equipo con los siguientes datos : </p>
				<ul style="font-size: 15px;  margin: 10px 0">
                <li>ID: #<?= $id ?></li>
                <li>CLAVE: <?= $clave ?></li>

				</ul>
				<div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">

				</div>




				<div style="width: 100%; text-align: center">
					<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #08a139" href="https://testbd.pruebas.xyz/equipos/public/">CONTINUAR</a>
				</div>

                <br>
                <p style="color: #ff0019 margin: 2px; font-size: 10px " >
                    #Nota: Para aceptar el reporte por favor dar click en el boton "CONTINUAR" y loguearse </p>




                <br>
                <br>

			</div>
		</td>
	</tr>
</table>
<!--hasta aquí-->



















</body>
</html>
