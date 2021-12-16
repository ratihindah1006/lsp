<table border="1">
    @foreach ($unit as $u)
    <tr>
        <td width="1500px">Kode Unit : {{ $u->unit_code }}</td>
    </tr>

    <tr>
        <td>Judul Unit : {{ $u->unit_title }}</td>
    </tr>

    <tr>
        @foreach ($u->elements as $e)
        <td>Elemen : {{ $e->element_title }}<br>
            Kriteria Unjuk Kerja : <br>
            @foreach ($e->criterias as $c)
            <br>{{ $c->criteria_title }}
            @endforeach
        </td>

    </tr>
    @endforeach


    @endforeach
</table>