@extends('layouts/template')
@section('content')

<div class="container">
    <p style="text-align:left; font-weight:700"><a href="{{ route('role.create') }}" >Придумать роли (может только супербосс)</a></p>
    <p style="text-align:left; font-weight:700"><a href="{{ route('boss.create') }}" >Придумать должности (может только супербосс)</a></p>
    <p style="text-align:left; font-weight:700"><a href="{{ route('inviteBoss.create') }}" >Пригласить сотрудника (может супербосс или сотрудники с соответствующей ролью в свой отдел.)</a></p>
<table>
    <tr><th>№</th><th>Имя</th><th>Фамилия</th><th>Email</th><th>Должность</th><th>Роль</th><th>Пол</th><th>Редактировать</th><th>Удалить</th></tr>

@php $n = 0; @endphp    
@foreach($listing as $y)
        <tr>
        <td style="width: 5%;">{{ $n += 1 }}</td>
        <td style="width: 10%;"><p>{{ $y->name }}</p></td>
        <td style="width: 15%;"><p>{{ $y->surname }}</p></td>
        <td style="width: 20%;"><p>{{ $y->email }}</p></td>
        <td style="width: 10%;"><p>{{ $y->boss()->first()->boss }}</p></td>
        <td style="width: 10%;">
@foreach($y->role as $x)
        <li>{{ $x->role }}</li>
@endforeach        
</td>
        <td style="width: 10%;"><p>{{ $y->sex->sex }}</p></td>
        <td style="width: 10%;"><a href="{{ route('edit', [$y->id]) }}" >Редактировать</a></td>
        <td style="width: 10%;">
<form action="{{ route('destroy', [$y->id]) }}" method="post">
{{ csrf_field() }}
{{ method_field('DELETE') }}
<p><input type="submit" value="Удалить"></p>
</form>        
        </td>
        </tr>        

@endforeach   
</table>
@if (!empty(Auth::user()))
{{ $listing->links() }}
@endif
</div>

@endsection