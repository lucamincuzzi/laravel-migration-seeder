@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($trains as $train)
            <li>
                {{ $train->azienda }}
                {{ $train->codice_treno }}
                {{ $train->stazione_partenza }}
                {{ $train->stazione_partenza }}
                {{ $train->orario_partenza }}
                {{ $train->orario_arrivo }}
                {{ $train->cancellato }}
            </li>
        @endforeach
    </ul>
@endsection
