<p><a href="{{ route('products.index') }}">Regresar</a></p>
{!! Form::open(['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}
	@csrf
	<label>Imagen</label>
	<br>
	<input type="text" name="image" id="image" value="{{ $product->image }}">
	<br><br>
	<label>Nombre</label>
	<br>
	<input type="text" name="name" id="name" value="{{ $product->name }}" required>
	<br><br>
	<label>Precio</label>
	<br>
	<input type="text" name="price" id="price" value="{{ $product->price }}" required>
	<br><br>
	<label>Impuesto</label>
	<br>
	<input type="text" name="tax" id="tax" value="{{ $product->tax }}" required>
	<br><br>
	<label>Descripcion</label>
	<br>
	<textarea name="description" id="">{{ $product->description }}</textarea>
	<br><br>
	<input type="submit" name="Enviar">
{!! Form::close(); !!}