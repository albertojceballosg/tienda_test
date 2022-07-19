@if(auth::check())
	<a class="dropdown-item" href="{{ route('logout') }}"
	   onclick="event.preventDefault();
	                 document.getElementById('logout-form').submit();">
	    {{ __('Salir') }}
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	    @csrf
	</form>
@else
	<p><a href="{{ route('login') }}">Ingresar</a></p>
@endif


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
				<a href="{{ route('products.buy', $value->id) }}">Comprar</a>
			</td>
		</tr>
	@endforeach
</table>