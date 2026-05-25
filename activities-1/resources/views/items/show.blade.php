@extends('layouts.app')

@section('content')
<h2>Student Details</h2>

<div class="card">
    <p><strong>ID:</strong> {{ $item['id'] }}</p>
    <p><strong>Name:</strong> {{ $item['student_name'] }}</p>
    <p><strong>Course:</strong> {{ $item['course'] }}</p>
    <p><strong>Year Level:</strong> {{ $item['year_level'] }}</p>
    <p><strong>GPA:</strong> {{ $item['gpa'] }}</p>
</div>

<br>
<a href="/items" class="btn back">⬅ Back</a>
@endsection