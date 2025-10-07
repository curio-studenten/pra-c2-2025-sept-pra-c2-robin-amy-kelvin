<h2>Types:</h2>
<ul>
    @foreach($types as $type)
    <li>
        <a href="{{ route('type.brands', $type->types) }}">{{ $type->types }}</a>
    </li>
    @endforeach
</ul>