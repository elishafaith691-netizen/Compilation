@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>

<form method="POST" action="/items/{{ $item['id'] }}/update">
    @csrf

    <input type="text" name="student_name" value="{{ $item['student_name'] }}"><br><br>
    <input type="text" name="course" value="{{ $item['course'] }}"><br><br>
    <input type="text" name="year_level" value="{{ $item['year_level'] }}"><br><br>
    <input type="text" name="gpa" value="{{ $item['gpa'] }}"><br><br>

    <button class="btn">Update</button>
</form>

<br>
<a href="/items" class="btn back">Back</a>
@endsection