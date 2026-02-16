<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>

/* Google Font */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

.editBtn {
    background: #2563EB;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 6px;
    cursor: pointer;
    margin-right: 5px;
}

.editBtn:hover {
    background: #1D4ED8;
}

.deleteBtn {
    background: #DC2626;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 6px;
    cursor: pointer;
}

.deleteBtn:hover {
    background: #B91C1C;
}


body {
    background: #F3F4F6;
    display: flex;
}

/* Sidebar */
.sidebar {
    width: 220px;
    height: 100vh;
    background: #0F766E;
    padding-top: 30px;
    position: fixed;
}

.sidebar a {
    display: block;
    color: white;
    padding: 12px 20px;
    margin: 10px 15px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #14B8A6;
}

.sidebar a.active {
    background: white;
    color: #0F766E;
    font-weight: 600;
}

/* Main Content */
section {
    margin-left: 240px;
    padding: 30px;
    width: 100%;
}

h1 {
    margin-left: 240px;
    padding: 20px 30px;
    color: #111827;
}

/* Container Card */
.container {
    background: white;
    padding: 25px;
    margin-bottom: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.container:hover {
    transform: translateY(-3px);
}

/* Form Styling */
form div {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: 500;
    margin-bottom: 6px;
    color: #374151;
}

input {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #D1D5DB;
    transition: 0.3s;
}

input:focus {
    border-color: #0F766E;
    outline: none;
    box-shadow: 0 0 0 2px rgba(15,118,110,0.2);
}

/* Buttons */
button {
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: 500;
    margin-right: 8px;
    transition: 0.3s;
}

/* Save Button */
button:nth-child(1) {
    background: #0F766E;
    color: white;
}

button:nth-child(1):hover {
    background: #14B8A6;
}

/* Update Button */
button:nth-child(2) {
    background: #2563EB;
    color: white;
}

button:nth-child(2):hover {
    background: #1D4ED8;
}

/* Delete Button */
button:nth-child(3) {
    background: #DC2626;
    color: white;
}

button:nth-child(3):hover {
    background: #B91C1C;
}

/* Responsive */
@media (max-width: 768px) {
    body {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    h1, section {
        margin-left: 0;
    }
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

table th, table td {
    padding: 10px;
    border: 1px solid #E5E7EB;
}

table th {
    background: #0F766E;
    color: white;
}

table tr:nth-child(even) {
    background: #F9FAFB;
}

select {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #D1D5DB;
}
    </style>
</head>
<body>

   <div class="sidebar">
  <a href="#" onclick="showSection('students')">Students</a>
  <a href="#" onclick="showSection('lecturers')">Lecturers</a>
  <a href="#" onclick="showSection('courses')">Courses</a>
</div>


  <section id="students" class="content-section">
    <div class="container">
       <form action="{{ isset($student) ? url('/student/update/'.$student->id) : url('/studentsave') }}" method="POST">
@csrf

<div>
    <label>Student Name:</label>
    <input type="text" name="name" value="{{ $student->name ?? '' }}" required>
</div>

<div>
    <label>Email:</label>
    <input type="text" name="email" value="{{ $student->email ?? '' }}" required>
</div>

<div>
    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $student->phone ?? '' }}" required>
</div>

<div>
    <label>Batch:</label>
    <input type="text" name="batch" value="{{ $student->batch ?? '' }}" required>
</div>

<div>
    <button type="submit">
        {{ isset($student) ? 'Update' : 'Save' }}
    </button>
</div>
</form>

       <h3>Student List</h3>
<table>
  <thead>
    <tr>
       <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Batch</th>
      <th>Action button</th>
    </tr>
  </thead>
  <tbody id="studentTable">
    <tbody>
@foreach($students as $student)
<tr>
     <td>{{ $student->id }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>{{ $student->phone }}</td>
    <td>{{ $student->batch }}</td>
    <td>
        <a href="{{ url('/student/edit/'.$student->id) }}">
            <button type="button" class="editBtn">Edit</button>
        </a>

        <form action="{{ url('/student/delete/'.$student->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            <button type="submit" class="deleteBtn"
                onclick="return confirm('Are you sure?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

  </tbody>
</table>
    </div>
  </section>

  <section id="lecturers" class="content-section">
    <div class="container">
       <form action="{{ isset($lecturer) ? url('/lecturer/update/'.$lecturer->id) : url('/lecturersave') }}" method="POST">
    @csrf

    <div>
        <label>Lecturer Name:</label>
        <input type="text" name="name" value="{{ $lecturer->name ?? '' }}" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="text" name="email" value="{{ $lecturer->email ?? '' }}" required>
    </div>

    <div>
        <label>Specialization:</label>
        <input type="text" name="specialization" value="{{ $lecturer->specialization ?? '' }}" required>
    </div>

    <div>
        <button type="submit">
            {{ isset($lecturer) ? 'Update' : 'Save' }}
        </button>
    </div>
</form>
       <h3>Lecturers List</h3>
<table>
  <thead>
    <tr>
        <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Specialization</th>
      <th>Action button</th>
    </tr>
  </thead>
  <tbody id="lacturerTable">
@foreach($lecturers as $lecturer)
<tr>
    <td>{{ $lecturer->id }}</td>
    <td>{{ $lecturer->name }}</td>
    <td>{{ $lecturer->email }}</td>
    <td>{{ $lecturer->specialization }}</td>
    <td>
        <a href="{{ url('/lecturer/edit/'.$lecturer->id) }}">
    <button type="button" class="editBtn">Edit</button>
</a>

        <form action="{{ url('/lecturer/delete/'.$lecturer->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            <button type="submit" class="deleteBtn"
                onclick="return confirm('Are you sure?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@endforeach
  </tbody>
</table>

    </div>
  </section>

  <section id="courses" class="content-section">
    <div class="container">
       <form action="{{ isset($course) ? url('/course/update/'.$course->id) : url('/coursesave') }}" method="POST">
@csrf

<div>
    <label>Course Name:</label>
    <input type="text" name="course_name" value="{{ $course->course_name ?? '' }}" required>
</div>

<div>
    <label>Course Code:</label>
    <input type="text" name="course_code" value="{{ $course->course_code ?? '' }}" required>
</div>

<div>
    <label>Lecturer:</label>
    <select name="lecturer_id" required>
        <option value="">Select Lecturer</option>
        @foreach($lecturers as $lecturer)
            <option value="{{ $lecturer->id }}"
                {{ isset($course) && $course->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                {{ $lecturer->name }}
            </option>
        @endforeach
    </select>
</div>

<div>
    <button type="submit">
        {{ isset($course) ? 'Update' : 'Save' }}
    </button>
</div>

</form>

       <h3>Courses List</h3>
<table>
  <thead>
    <tr>
        <th>ID</th>
      <th>Course Name</th>
      <th>Course Code</th>
      <th>Lecturer</th>
      <th>Action button</th>
    </tr>
  </thead>
  <tbody>
@foreach($courses as $course)
<tr>
    <td>{{ $course->id }}</td>
    <td>{{ $course->course_name }}</td>
    <td>{{ $course->course_code }}</td>
    <td>{{ $course->lecturer->name ?? 'No Lecturer' }}</td>
    <td>
        <a href="{{ url('/course/edit/'.$course->id) }}">
            <button type="button" class="editBtn">Edit</button>
        </a>

        <form action="{{ url('/course/delete/'.$course->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            <button type="submit" class="deleteBtn"
                onclick="return confirm('Are you sure?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>

    </div>


  <script>

// Hide all sections first
function showSection(sectionId) {
    let sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.style.display = "none";
    });

    document.getElementById(sectionId).style.display = "block";
}

// Show students by default
showSection('students');

</script>

</body>
</html>
