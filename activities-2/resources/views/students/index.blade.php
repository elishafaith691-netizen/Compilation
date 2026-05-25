@extends('layouts.app')

@section('content')
<div class="container">
    <h1>📚 Student Information</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form method="GET" action="{{ route('students.index') }}" style="margin-bottom:15px;">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search students...">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>

        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>
                @if($student->image)
                    <img src="{{ asset('storage/'.$student->image) }}" width="50">
                @else
                    N/A
                @endif
            </td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->year_level }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->address }}</td>
            <td>
                <a href="{{ route('students.show', $student->id) }}">View</a>
                <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $students->withQueryString()->links() }}
</div>
@endsection