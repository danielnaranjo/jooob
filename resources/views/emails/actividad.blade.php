<h4>Actividad diaria: {{ $fecha }}</h4>

<p>
    Vacantes
</p>
<ul>
    @forelse ($trabajos as $trabajo)
    <li>
        {!! $trabajo->jobtitle !!} : {!! $trabajo->jobtitle !!}
    </li>
    @empty
    <li>No hay información disponible</li>
    @endforelse
</ul>

<p>
    Usuarios
</p>
<ul>
    @forelse ($candidatos as $candidato)
    <li>
        {!! $candidato->email !!} : {!! $candidato->name !!} : {!! $candidato->stack !!}
    </li>
    @empty
    <li>No hay información disponible</li>
    @endforelse
</ul>

<p>
    Metricas
</p>
<ul>
    @forelse ($metricas as $metrica)
    <li>
        {!! $metrica->job_id !!} : $metrica->user_id
    </li>
    @empty
    <li>No hay información disponible</li>
    @endforelse
</ul>

<p>
    Compañias
</p>
<ul>
    @forelse ($empresas as $empresa)
    <li>
        {!! $empresa->company !!} : {!! $empresa->email !!}:
    </li>
    @empty
    <li>No hay información disponible</li>
    @endforelse
</ul>
