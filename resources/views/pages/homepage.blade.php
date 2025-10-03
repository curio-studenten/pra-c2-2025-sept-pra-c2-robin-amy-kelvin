<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    @if($topManuals->count() > 0)
    <h2>Top 10 Handleidingen</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @foreach($topManuals as $manual)
                        <li>
                            <a href="/{{ $manual->brand->id }}/{{ $manual->brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">{{ $manual->brand->name }}: {{ $manual->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    {{-- Alfabetisch selectiemenu --}}
    <div class="alphabet-menu" style="margin-bottom: 20px;">
        @foreach(range('A', 'Z') as $letter)
            <a href="#brand-{{ $letter }}" style="margin-right: 8px;">{{ $letter }}</a>
        @endforeach
    </div>

    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @php
            // Groepeer alle merken per eerste letter
            $brandsByLetter = $brands->groupBy(function($brand) {
                return strtoupper(substr($brand->name, 0, 1));
            })->sortKeys();
            @endphp

            @foreach($brandsByLetter as $letter => $brandsChunk)
                <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-link text-decoration-none w-100 text-start"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $letter }}"
                                aria-expanded="false"
                                aria-controls="collapse-{{ $letter }}">
                            {{ $letter }}
                        </button>
                    </div>

                    <div id="collapse-{{ $letter }}" class="collapse">
                        <ul class="list-group list-group-flush">
                            @foreach($brandsChunk as $brand)
                                <li class="list-group-item">
                                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                                        {{ $brand->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                </div>
                <?php
                unset($header_first_letter);
                ?>
            @endforeach

        </div>


    </div>
   
</x-layouts.app>
