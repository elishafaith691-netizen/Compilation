@extends('layouts.app')

@section('content')
<h2>Add Student</h2>

<form method="POST" action="/items/store">
    @csrf

    <input type="text" name="student_name" placeholder="Name" required><br><br>
    <input type="text" name="course" placeholder="Course" required><br><br>
    <input type="text" name="year_level" placeholder="Year Level" required><br><br>
    <input type="text" name="gpa" placeholder="GPA" required><br><br>

    <button class="btn">Save</button>
</form>

<br>
<a href="/items" class="btn back">Back</a>
@endsection