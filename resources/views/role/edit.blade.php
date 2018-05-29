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
<form action="{{ route('role.update', [$edit->id]) }}" method="post">
{{ csrf_field() }}
{{ method_field('PATCH') }}
<p>Введите название роли: <input type="text" name="role" value="{{ $edit->role }}" required></p>
<p><input type="submit"></p>
</form>

@endsection
