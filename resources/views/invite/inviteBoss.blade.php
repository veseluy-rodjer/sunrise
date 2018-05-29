@extends('layouts/template')
@section('content')

<br>
<br>
<br>
<br>
@if (count($errors) > 0)
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<form action="{{ route('inviteBoss.store') }}" method="post">
{{ csrf_field() }}
<p>Имя: <input type="text" name="name" required></p>
<p>Фамилия: <input type="text" name="surname" required></p>
<p>Email: <input type="email" name="email" required></p>
<p>Должность: <select name="boss" required>
    @foreach ($boss as $i)
    <option value="{{ $i->id }}">{{ $i->boss }}</option>
    @endforeach
</select></p>
<p>Роли: <select name="role[]" size="5" multiple required>
    @foreach ($role as $i)
    <option value="{{ $i->id }}">{{ $i->role }}</option>
    @endforeach
</select></p>
<p>Пол: <select size="2" name="sex" required>
    @foreach ($sex as $i)
    <option value="{{ $i->id }}">{{ $i->sex }}</option>
    @endforeach    
</select></p>
<p><input type="submit"></p>
</form>

@endsection
