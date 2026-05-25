<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="sidebar">
    <h2></h2>
    <a href="{{ route('students.index') }}"> Dashboard</a>
    <a href="{{ route('students.create') }}"> Add Student</a>
</div>

<div class="main-content">
    <div class="container">
        <h1> Edit Student</h1>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Name:</label>
            <input type="text" name="name" value="{{ $student->name }}" required>

            <label>Course:</label>
            <input type="text" name="course" value="{{ $student->course }}" required>

            <label>Year Level:</label>
            <input type="number" name="year_level" value="{{ $student->year_level }}" required>

            <label>Email:</label>
            <input type="email" name="email" value="{{ $student->email }}" required>

            <label>Address:</label>
            <input type="text" name="address" value="{{ $student->address }}" required>

            <button type="submit"> Update Student</button>
        </form>

        <br>
        <a href="{{ route('students.index') }}">⬅ Back to List</a>
    </div>
</div>

</body>
</html>