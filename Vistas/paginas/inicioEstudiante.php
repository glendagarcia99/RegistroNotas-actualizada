<?php
 if(!isset($_SESSION["validarIngreso"])){

    echo '<script>window.location = "index.php?Vistas=inicioSesion";</script>';

    return;

}else{

    if($_SESSION["validarIngreso"] != "ok"){

        echo '<script>window.location = "index.php?Vistas=inicioSesion";</script>';

        return;
    }
    
}

$usuarios = ControladorEstudiante::ctrSeleccionarRegistroEstudiante(null, null);


?>



<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>ID</th>
			<th>Correo</th>
			<th>Telefono</th>
            <th>FechaIngreso</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>

	<?php foreach ($usuarios as $key => $value): ?>

		<tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo $value["Nombre"]; ?></td>
			<td><?php echo $value["IdEstudiante"]; ?></td>
			<td><?php echo $value["Correo"]; ?></td>
			<td><?php echo $value["Telefono"]; ?></td>
            <td><?php echo $value["FechaIngreso"]; ?></td>
			<td><?php echo $value["Estado"]; ?></td>
			<td>

			<div class="btn-group">

				<div class="px-1">
				
				<a href="index.php?pagina=editarEstudiante&IdEstudiante=<?php echo $value["IdEstudiante"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

				</div>

				<div class="px-2">
				
				<a href="index.php?pagina=registrarNotas&IdEstudiante=<?php echo $value["IdEstudiante"]; ?>" class="btn btn-info"><i class="fas fa-book"></i></a>

				</div>

			</div>
			
				

			</td>
		</tr>
		
	<?php endforeach ?>	
	
	</tbody>
</table>