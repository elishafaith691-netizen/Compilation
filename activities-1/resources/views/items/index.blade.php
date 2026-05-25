@extends('layouts.app')

@section('content')
<h2>Student Records</h2>

<a href="/items/create" class="btn"> Add Student</a>

<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>

    @foreach($items as $item)
    <tr>
        <td>{{ $item['id'] }}</td>
        <td>{{ $item['student_name'] }}</td>
        <td>{{ $item['course'] }}</td>
        <td>
            <a href="/items/{{ $item['id'] }}" class="btn">View</a>
            <a href="/items/{{ $item['id'] }}/edit" class="btn">Edit</a>
            <a href="/items/{{ $item['id'] }}/delete" class="btn back">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection