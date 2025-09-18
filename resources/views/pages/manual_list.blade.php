<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    @if(isset($popularManuals) && $popularManuals->count() > 0)
        <h2>Top 5 populairste handleidingen</h2>
        <ul>
            @foreach ($popularManuals as $manual)
                <li>[{{ $manual->name }}]</li>
            @endforeach
        </ul>
    @endif

        @foreach ($manuals as $manual)

            @if ($manual->locally_available)
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                ({{$manual->filesize_human_readable}})
            @else
                <button><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a></button>
                ({{$manual->filesize_human_readable}})
                {{-- <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a> --}}
            @endif

            <br />
        @endforeach

</x-layouts.app>
