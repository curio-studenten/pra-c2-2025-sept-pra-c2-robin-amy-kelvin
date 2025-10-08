<x-layouts.app>

<h2>Producten van {{ $brand->name }} in categorie {{ $type }}</h2>

<ul>
    @foreach($manuals as $manual)
    <div style="display: flex; justify-content: space-between; align-items: center;">

        <li>{{ $manual->name }}</li>
        <a href="/{{ $manual->brand->id }}/{{ $manual->brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">Download manual</a>

    </div>
       
    @endforeach
</ul>


</x-layouts.app>

