<h2>Merken in categorie: {{ $type }}</h2>

<ul>
    @foreach($brands as $brand)

    <li>
        <a href="{{ route('type.brand.manuals', [$type, $brand->name]) }}">{{ $brand->name }}</a>
    </li>

    @endforeach
</ul>