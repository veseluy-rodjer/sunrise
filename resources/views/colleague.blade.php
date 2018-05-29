@extends('layouts/template')
@section('content')

<div class="container">
    <p style="text-align:left; font-weight:700"><a href="{{ route('role.create') }}" >Придумать роли (может только супербосс)</a></p>
    <p style="text-align:left; font-weight:700"><a href="{{ route('boss.create') }}" >Придумать должность замов (может только супербосс)</a></p>
    <p style="text-align:right; font-weight:700"><a href="{{ route('inviteBoss.create') }}" >Пригласить зама</a></p>
    <p style="text-align:right; font-weight:700"><a href="{{ route('inviteRank.create') }}" >Пригласить сотрудника в свой отдел (может только зам.)</a></p>    
    <p style="text-align:center; font-weight:700"><a href="{{ route('rank.create') }}" >Придумать должности для остальных (может только супербосс)</a></p>

<table>
    <tr><th>№</th><th>Имя</th><th>Фамилия</th><th>Email</th><th>Должность</th><th>Роль</th><th>Пол</th><th>Редактировать</th><th>Удалить</th></tr>

@php $n = 0; @endphp    
@foreach($listing as $y)
        <tr>
        <td style="width: 5%;">{{ $n += 1 }}</td>
        <td style="width: 10%;"><p>{{ $y->name }}</p></td>
        <td style="width: 15%;"><p>{{ $y->surname }}</p></td>
        <td style="width: 20%;"><p>{{ $y->email }}</p></td>
        <td style="width: 10%;"><p>{{ $y->boss->boss }}
{{--
@php
if ($y->belong != 1) {
    echo $y->rank->rank;
}
else {
    echo $y->boss->boss;
}
@endphp
--}}
</p></td>
        <td style="width: 10%;"><p>
@php
    foreach($y->role as $x) {
        echo $x->role;
    }
@endphp        
        
        {{ $y->role }}</p></td>
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
{{ $listing->links() }}
</div>

@endsection