@extends('layout.app')
@section('content')
    <h1>Backoffice</h1>
    <a class="btn- btn success" href="{{ route('exportpdf') }}">Export pdf</a>
    @if($routes->count()>0)
    <table border="1">
        <tr>
            <th>Nom du route</th>
            <th>Depart </th>
            <th>Arrive </th>
            <th>Distance</th>
            <th>Action</th>
        </tr>
        <tr>
            @foreach ($routes as $route)
                <td>{{ $route->nomroute }}</td>
                <td>{{ $route->villedep }}</td>
                <td>{{ $route->villearrive }}</td>
                <td>{{ $route->distance }}</td>
                <td><a href="{{ route('portion.showportion',['idroute' => $route->idroute]) }}">Portion</a></td>
            @endforeach
        </tr>
    </table>
    @else
        <span>Aucun</span>
    @endif
@endsection