<h2>Producten van {{ $brand->name }} in categorie {{ $type }}</h2>
<ul>
@foreach($manuals as $manual)
    <li>{{ $manual->name }}</li>
@endforeach
</ul>