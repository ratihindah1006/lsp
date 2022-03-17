@extends('layout.main')

@section('container')
<div class="card-body">
    @foreach ($unit as $u)
    @php
    $r = 1;
    @endphp
    <br>
    <table style="min-width: 100%" border="3" class="my-text">

        <tr>
            <th width="1500px">Kode Unit : {{ $u->unit_code }}</th>
        </tr>

        <tr>
            <th>Judul Unit : {{ $u->unit_title }}</th>
        </tr>

        <tr>
            @foreach ($u->elements as $element)
            <td>
                <b>Element : {{ $element->element_title }}</b><br>
                <b>Kriteria unjuk kerja: </b><br>
                <ul>
                    @foreach ($element->criterias as $criteria)
                    <li>{{ $r.'.'.$loop->iteration.' '.$criteria->criteria_title }}</li>
                    @endforeach
                </ul>
                @php
                $r++;
                @endphp
            </td>

        </tr>
        @endforeach
    </table>
    @endforeach
</div>
@endsection