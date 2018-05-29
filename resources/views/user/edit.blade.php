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
<form action="{{ route('update', [$user->id]) }}" method="post">
{{ csrf_field() }}
{{ method_field('PATCH') }}
<p>Имя: <input type="text" name="name" value="{{ $user->name }}" required></p>
<p>Фамилия: <input type="text" name="surname" value="{{ $user->surname }}" required></p>
<p>Должность: <select name="boss" value="{{ $user->boss()->first()->boss }}" required>
    @foreach ($boss as $i)
    <option @php if ($user->boss()->first()->boss == $i->boss) echo 'selected'; @endphp value="{{ $i->boss }}">{{ $i->boss }}</option>
    @endforeach
</select></p>
<p>Роль: <select name="role" value="{{ $user->role()->first()->role }}" required>
    @foreach ($role as $i)
    <option @php if ($user->role()->first()->role == $i->role) echo 'selected'; @endphp value="{{ $i->role }}">{{ $i->role }}</option>
    @endforeach
</select></p>
<p>Пол: <select size="2" name="sex" required>
    @foreach ($sex as $i)
    <option @php if ($user->sex->sex == $i->sex) echo 'selected'; @endphp value="{{ $i->sex }}">{{ $i->sex }}</option>
    @endforeach    
</select></p>
<p><input type="submit"></p>
</form>

@endsection
