<h4>Actividades y Busquedas al {{ $fecha }}</h4>
<ul>
    @forelse ($metricas as $metrica)
    <li>
        {!! $metrica->created_at !!} | {!! $metrica->job_id !!} | {!! $metrica->user_id !!}
    </li>
    @empty
    <li>No hay información disponible</li>
    @endforelse
</ul>
