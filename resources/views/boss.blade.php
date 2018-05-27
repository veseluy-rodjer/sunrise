@extends('layouts/template')
@section('content')

<div class="container">
    <p style="text-align:left; font-weight:700"><a href="{{ route('boss.create') }}" >Назначить себе замов (может только супербосс)</a></p>
<table>
    <tr><th>№</th><th>Должность</th><th>Редактировать</th><th>Удалить</th></tr>

@php $n = 0; @endphp    
@foreach($listing as $y)
        <tr>
        <td style="width: 5%;">{{ $n += 1 }}</td>
        <td style="width: 35%;"><p>{{ $y->boss }}</p></td>


        <td style="width: 30%;"><a href="{{ route('boss.edit', [$y->id]) }}" >Редактировать</a></td>
        <td style="width: 30%;">
<form action="{{ route('boss.destroy', [$y->id]) }}" method="post">
{{ csrf_field() }}
{{ method_field('DELETE') }}
<p><input type="submit" value="Удалить"></p>
</form>        
        </td>
        </tr>        

@endforeach
</table>

</div>

@endsection