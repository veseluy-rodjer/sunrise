@extends('layouts/template')
@section('content')

<div class="container">
<table>
    <tr><th>№</th><th>Имя</th><th>Фамилия</th><th>Email</th></tr>

@php $n = 0; @endphp    
@foreach($listing as $y)
        <tr>
        <td style="width: 5%;">{{ $n += 1 }}</td>
        <td style="width: 10%;"><p>{{ $y->name }}</p></td>
        <td style="width: 15%;"><p>{{ $y->surname }}</p></td>
        <td style="width: 20%;"><p>{{ $y->email }}</p></td>
        </tr>        
@endforeach   
</table>

</div>

@endsection