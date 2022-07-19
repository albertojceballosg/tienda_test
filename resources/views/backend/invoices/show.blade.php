<p><a href="{{ route('invoices.index') }}">Regresar</a></p>
<table border="1">
	<tr>
		<th>Nombre</th>
		<th>Codigo</th>
		<th>Fecha</th>
	</tr>
	<tr>
		<td>{{ $invoice->user->first_name }} {{ $invoice->user->last_name }}</td>
		<td>{{ $invoice->code }}</td>
		<td>{{ $invoice->created_at->format('m-d-Y') }}</td>
	</tr>
</table>
<br><br>
<table border="1">
	<tr>
		<td>Producto</td>
		<td>Cantidad</td>
		<td>Inpuesto</td>
		<td>Precio</td>
	</tr>
	@php
		$var1 = 0;
		$var2 = 0;
	@endphp
	@foreach($invoice->invoiceDetail as $key => $value)
		<tr>
			<td>{{ $value->order->product->name }}</td>
			<td>1</td>
			<td>{{ $value->order->product->tax }} %</td>
			<td>{{ $value->order->product->price }}</td>
		</tr>
		@php
			$var1 = $var1 + $value->order->product->price;
			$var2 = $var2 + $value->order->product->price * ($value->order->product->tax / 100);
		@endphp
	@endforeach
	<tr>
		<td colspan="2"></td>
		<td>Sub Total</td>
		<td>{{ $var1 }}</td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td>Impuestos</td>
		<td>{{ $var2 }}</td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<th>Total</th>
		<th>{{ $var1 + $var2 }}</th>
	</tr>
</table>