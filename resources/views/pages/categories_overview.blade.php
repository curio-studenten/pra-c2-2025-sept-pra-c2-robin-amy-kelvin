<x-layouts.app>
  
<h2>Alle Categorieën</h2>

<ul>
    @foreach($types as $typeItem)
    <li>
        <a href="{{ route('type.brands', $typeItem->type) }}">{{ $typeItem->type }}</a>
    </li>
    @endforeach
</ul>

</x-layouts.app>