@extends('layouts/template')
@section('content')

<div class="container">
    <p style="text-align:left; font-weight:700"><a href="{{ route('role.create') }}" >Придумать роль</a></p>
<table>
    <tr><th>№</th><th>Роль</th><th>Редактировать</th><th>Удалить</th></tr>

@php $n = 0; @endphp    
@foreach($listing as $y)
        <tr>
        <td style="width: 5%;">{{ $n += 1 }}</td>
        <td style="width: 35%;"><p>{{ $y->role }}</p></td>


        <td style="width: 30%;"><a href="{{ route('role.edit', [$y->id]) }}" >Редактировать</a></td>
        <td style="width: 30%;">
<form action="{{ route('role.destroy', [$y->id]) }}" method="post">
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