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
<form action="{{ route('role.store') }}" method="post">
{{ csrf_field() }}
<p>Введите название роли: <input type="text" name="role" required></p>
<p><input type="submit"></p>
</form>

@endsection
