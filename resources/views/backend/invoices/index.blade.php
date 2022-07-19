<p><a href="{{ route('dashboard.index') }}">Regresar</a> - <a href="{{ route('invoices.run') }}">Realizar Facturación Pendiente</a></p>
<table border="1">
	<th>Código</th>
	<th>Usuario</th>
	<th>Acciones</th>
	@if(count($invoices) > 0)
		@foreach($invoices as $key => $value)
			<tr>
				<td>{{ $value->code }}</td>
				<td>{{ $value->user->first_name }} {{ $value->user->last_name }}</td>
				<td><a href="{{ route('invoices.show', $value->id) }}">Detalles</a></td>
			</tr>
		@endforeach
	@else
		<tr>
			<td colspan="3"><p>No hay facturas</p></td>
		</tr>
	@endif
</table>