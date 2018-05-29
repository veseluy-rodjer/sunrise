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
    <option @php if ($user->boss()->first()->boss == $i->boss) echo 'selected'; @endphp value="{{ $i->id }}">{{ $i->boss }}</option>
    @endforeach
</select></p>
<p>Изменить роли: <select name="role[]" value="{{ $user->role()->first()->role }}" size="5" multiple required>
    @foreach ($role as $i)
    <option @php if (!empty($user->role()->find($i->id))) echo 'selected'; @endphp value="{{ $i->id }}">{{ $i->role }}</option>
    @endforeach
</select></p>
<p>Пол: <select size="2" name="sex" required>
    @foreach ($sex as $i)
    <option @php if ($user->sex->sex == $i->sex) echo 'selected'; @endphp value="{{ $i->id }}">{{ $i->sex }}</option>
    @endforeach    
</select></p>
<p><input type="submit"></p>
</form>

@endsection
