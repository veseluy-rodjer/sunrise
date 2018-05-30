@extends('layouts/template')
@section('content')

<div class="container">
<table>
    <tr><th>№</th><th>Имя</th><th>Фамилия</th><th>Email</th><th>Удалить</th></tr>

@php $n = 0; @endphp    
@foreach($listing as $y)
        <tr>
        <td style="text-align: center; width: 10%;">{{ $n += 1 }}</td>
        <td style="width: 20%;"><p>{{ $y->name }}</p></td>
        <td style="width: 25%;"><p>{{ $y->surname }}</p></td>
        <td style="width: 25%;"><p>{{ $y->email }}</p></td>
        <td style="text-align: center; width: 20%;">
<form action="{{ route('inviteBoss.destroy', [$y->id]) }}" method="post">
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