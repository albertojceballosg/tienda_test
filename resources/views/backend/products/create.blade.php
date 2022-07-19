<p><a href="{{ route('products.index') }}">Regresar</a></p>
<form method="POST" action="{{ route('products.store') }}">
	@csrf
	<label>Imagen (url de una imagen de internet)</label>
	<br>
	<input type="text" name="image" id="image">
	<br><br>
	<label>Nombre</label>
	<br>
	<input type="text" name="name" id="name" required>
	<br><br>
	<label>Precio</label>
	<br>
	<input type="text" name="price" id="price" required>
	<br><br>
	<label>Impuesto</label>
	<br>
	<input type="text" name="tax" id="tax" required>
	<br><br>
	<label>Descripcion</label>
	<br>
	<textarea name="description" id=""></textarea>
	<br><br>
	<input type="submit" name="Enviar">
</form>