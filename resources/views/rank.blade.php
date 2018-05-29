@extends('layouts/template')
@section('content')

<div class="container">
    <p style="text-align:left; font-weight:700"><a href="{{ route('rank.create') }}" >Придумать должность</a></p>
<table>
    <tr><th>№</th><th>Должность</th><th>Редактировать</th><th>Удалить</th></tr>

@php $n = 0; @endphp    
@foreach($listing as $y)
        <tr>
        <td style="width: 5%;">{{ $n += 1 }}</td>
        <td style="width: 35%;"><p>{{ $y->rank }}</p></td>


        <td style="width: 30%;"><a href="{{ route('rank.edit', [$y->id]) }}" >Редактировать</a></td>
        <td style="width: 30%;">
<form action="{{ route('rank.destroy', [$y->id]) }}" method="post">
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