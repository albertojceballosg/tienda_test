<table border="1">
	<tr>
		<th><a href="{{ route('dashboard.index') }}">Inicio</a></th>
	</tr>
	<tr>
		<th><a href="{{ route('products.index') }}">Productos</a></th>
	</tr>
	<tr>
		<th><a href="{{ route('invoices.index') }}">Facturas</a></th>
	</tr>
	<tr>
		<th>
			<a class="dropdown-item" href="{{ route('logout') }}"
			   onclick="event.preventDefault();
			                 document.getElementById('logout-form').submit();">
			    {{ __('Salir') }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
			    @csrf
			</form>
		</th>
	</tr>
</table>