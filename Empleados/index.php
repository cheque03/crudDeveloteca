<?php 

$txtID = (isset($_POST['txtID'] )) ? $_POST['txtID'] :"";
$txtNombre = (isset($_POST['txtNombre']) ) ? $_POST['txtNombre'] : "";
$txtApellidoP = (isset($_POST['txtApellidoP'])) ? $_POST['txtApellidoP'] : "";
$txtApellidoM = (isset($_POST['txtApellidoM']) ) ? $_POST['txtApellidoM'] : "";
$txtCorreo = (isset($_POST['txtCorreo']) ) ? $_POST['txtCorreo'] : "";
$txtFoto = (isset($_POST['txtFoto'])) ? $_POST['txtFoto'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../conexion/conexion.php");

switch ($accion) {
	case 'btnAgregar':
		$sentencia = $pdo->prepare("INSERT INTO empleados (Nombre,apellidoP, apellidoM, Correo, Foto) VALUES (:Nombre, :apellidoP, :apellidoM, :Correo, :Foto)");
		$sentencia->bindParam(':Nombre', $txtNombre);
		$sentencia->bindParam(':apellidoP', $txtApellidoP);
		$sentencia->bindParam(':apellidoM', $txtApellidoM);
		$sentencia->bindParam(':Correo', $txtCorreo);
		$sentencia->bindParam(':Foto', $txtFoto);
		
		$sentencia->execute();

		break;

	case 'btnModificar':
		// code...
		break;
	case 'btnEliminar':
		// code...
		break;
	case 'btnCancelar':
		// code...
		break;
	}
	$sentencia = $pdo->prepare("SELECT * fROM empleados");
	$sentencia->execute();
	$listaEmpleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
	
	print_r($listaEmpleados); 

echo  $txtID . "--" . $txtNombre . "--" . $txtApellidoP . "--" . $txtApellidoM . "--" . $txtCorreo . "--" . $txtFoto;
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale= 1.0">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	<title></title>
</head>
<body>
	<div class="container">
	  <form action="" method="POST" enctype="multipart/form-data">
	  	<label for="">ID:</label>
	  	<input type="text" name="txtID" value="<?php echo $txtID; ?>" placeholder="" id="txtID" require="">
	  	<br>
	  	<label for="">Nombre(s):</label>
	  	<input type="text" name="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="" id="txtNombre" require="">
	  	<br/>
	  	<label for="">Apellido Paterno:</label>
	  	<input type="text" name="txtApellidoP" value="<?php echo $txtApellidoP; ?>" placeholder="" id="txtApellidoP" require="">
	  	<br>
	  	<label for="">Apellido Materno:</label>
	  	<input type="text" name="txtApellidoM" value="<?php echo $txtApellidoM; ?>" placeholder="" id="txtApellidoM" require="">
	  	<br>
	  	<label for="">Correo:</label>
	  	<input type="text" name="txtCorreo" value="<?php echo $txtCorreo; ?>" placeholder="" id="txtCorreo" require="">
	  	<br>
	  	<label for="">Foto:</label>
	  	<input type="text" name="txtFoto" value="<?php echo $txtFoto; ?>" placeholder="" id="txtFoto" require="">
	  	<br><br>

	  	<button value="btnAgregar" type="submit" name="accion">Agregar</button>
	  	<button value="btnModificar" type="submit" name="accion">Modificar</button>
	  	<button value="btnEliminar" type="submit" name="accion">Eliminar</button>
	  	<button value="btnCancelar" type="submit" name="accion">Cancelar</button>
	  	
	  </form>

	  <div class="row">
	  	<table>
	  		<thead>
	  			<tr>
	  				<th>Foto</th>
	  				<th>Nombre Completo</th>
	  				<th>Correo</th>
	  				<th>Acciones</th>
	  			</tr>
	  		</thead>
	  		<?php foreach ($listaEmpleados as $empleado) { ?>
	  				<tr>
	  					<td><?php echo $empleado['Foto']; ?></td>
	  					<td><?php echo $empleado['Nombre']. " " . $empleado['apellidoP'] . " " . $empleado['apellidoM']; ?></td>
	  					<td> <?php echo $empleado['Correo']; ?></td>
	  					<td>
	  					<form action="" method="POST">
	  						<input type="hidden" name="txtID" value="<?php echo $empleado['ID']; ?>">
	  						<input type="hidden" name="txtNombre" value="<?php echo $empleado['Nombre']; ?>">
	  						<input type="hidden" name="txtApellidoP" value="<?php echo $empleado['apellidoP']; ?>">
	  						<input type="hidden" name="txtApellidoM" value="<?php echo $empleado['apellidoM']; ?>">
	  						<input type="hidden" name="txtCorreo" value="<?php echo $empleado['Correo']; ?>">
	  						<input type="hidden" name="txtFoto" value="<?php echo $empleado['Foto']; ?>">
	  						<input type="submit" value="Seleccionar" name="accion">
	  					</form>

	  						
	  					</td>

	  				</tr>

	  		<?php } ?>
	  	</table>
	  </div>

	</div>
</body>
</html>