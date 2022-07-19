<p><a href="{{ route('dashboard.index') }}">Regresar</a> - <a href="{{ route('products.create') }}">Crear Producto</a></p>
<table border="1">
	<tr>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Impuesto</th>
		<th>Acciones</th>
	</tr>
	@foreach($products as $key => $value)
		<tr>
			<td>
				@if($value->image)
					<img src="{{$value->image }}" style="width:50px">
				@endif
			</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->price }}</td>
			<td>{{ $value->tax }}</td>
			<td>
				<a href="{{ route('products.show', $value->id) }}">Ver</a>
				<a href="{{ route('products.edit', $value->id) }}">Editar</a>
				<a href="{{ route('products.delete', $value->id) }}">Borrar</a>
			</td>
		</tr>
	@endforeach
</table>