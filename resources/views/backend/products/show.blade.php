<p><a href="{{ route('products.index') }}">Regresar</a></p>
@if($product->image)
	<p><b>Imagen: <img src="{{ $product->image }}" style="width: 50px"></b></p>
@endif
<p><b>Nombre: {{ $product->name }}</b></p>
<p><b>Descripcion: {{ $product->description }}</b></p>
<p><b>Precio: {{ $product->price }}</b></p>
<p><b>Impuesto: {{ $product->tax }} %</b></p>