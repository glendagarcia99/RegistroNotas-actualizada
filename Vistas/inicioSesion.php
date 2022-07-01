<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">

			<label for="email">Correo electrónico:</label>

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-envelope"></i>
					</span>
				</div>

				<input type="email" class="form-control" id="email" name="ingresoEmail">
			
			</div>
			
		</div>

		<div class="form-group">
			<label for="Password">Contraseña:</label>

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock"></i>
					</span>
				</div>

				<input type="password" class="form-control" id="password" name="ingresoPassword">

			</div>

		</div>

		<?php 

		$ingreso = new ControladorUsuario();
		$ingreso -> ctrIngresoUsuario();

		?>
		
		<button type="submit" class="btn btn-primary">Ingresar</button>

	</form>

</div>
</body>
</html>