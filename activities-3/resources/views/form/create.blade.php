<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="container">
        <h1> Course Registration</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <!-- All Errors -->
        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ url('/course-registration') }}" method="POST">
            @csrf

            <!-- Full Name -->
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}">
            @error('full_name')
                <span class="error">{{ $message }}</span>
            @enderror

            <!-- Email -->
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror

            <!-- Phone -->
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
            @error('phone')
                <span class="error">{{ $message }}</span>
            @enderror

            <!-- Course Dropdown -->
            <label for="course">Course</label>
            <select name="course" id="course">
                <option value="">Select a course</option>
                <option value="Web Development" {{ old('course') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                <option value="Data Science" {{ old('course') == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                <option value="Cybersecurity" {{ old('course') == 'Cybersecurity' ? 'selected' : '' }}>Cybersecurity</option>
            </select>
            @error('course')
                <span class="error">{{ $message }}</span>
            @enderror

            <!-- Level Dropdown -->
            <label for="level">Level</label>
            <select name="level" id="level">
                <option value="">Select level</option>
                <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
            </select>
            @error('level')
                <span class="error">{{ $message }}</span>
            @enderror

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>