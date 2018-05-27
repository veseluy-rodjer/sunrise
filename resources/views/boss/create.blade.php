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
<form action="{{ route('boss.store') }}" method="post">
{{ csrf_field() }}
<p>Введите название должности: <input type="text" name="boss" required></p>
<p><input type="submit"></p>
</form>

@endsection
