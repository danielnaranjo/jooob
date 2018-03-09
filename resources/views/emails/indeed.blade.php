<h4>Actividad diaria: {{ $fecha }}</h4>
<p>
    Vacantes
</p>
<ul>
    @forelse ($trabajos as $trabajo)
    <li>
        {!! $trabajo[0] !!}
    </li>
    @empty
    <li>No hay información disponible</li>
    @endforelse
</ul>
