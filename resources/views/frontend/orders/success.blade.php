<a class="dropdown-item" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
    {{ __('Salir') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<p>Su order fue realizada con exito</p>
<p><a href="{{ route('inicio') }}">Regresar</a></p>