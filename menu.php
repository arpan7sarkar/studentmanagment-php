<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>
<div id='cssmenu'>
    <ul>
        <li><a href='index.php'><span>Home</span></a></li>
        
        <?php if ($role === 'admin' || $role === 'student'): ?>
        <li class='active has-sub'><a href='getStudent.php'><span>Students</span></a>
            <ul>
                <li><a href='getStudent.php'><span>Show students</span></a></li>
                <?php if ($role === 'admin'): ?>
                <li><a href='addStudent.php'><span>Add Student</span></a></li>
                <li><a href='updateStudent.php'><span>Update Student</span></a></li>
                <li><a href='deleteStudent.php'><span>Delete Student</span></a></li>
                <?php endif; ?>
                <li><a href='showGrades.php'><span>Student Grades</span></a></li>
                <?php if ($role === 'admin'): ?>
                <li><a href='addGrade.php'><span>Add Grades</span></a></li>
                <li><a href='updateGrade.php'><span>Update Grades</span></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        
        <?php if ($role === 'admin' || $role === 'teacher'): ?>
        <li class='active has-sub'><a href='getTeacher.php'><span>Teachers</span></a>
            <ul>
                <li><a href='getTeacher.php'><span>Show Teachers</span></a></li>
                <?php if ($role === 'admin'): ?>
                <li><a href='addTeacher.php'><span>Add Teacher</span></a></li>
                <li><a href='updateTeacher.php'><span>Update Teacher</span></a></li>
                <li><a href='deleteTeacher.php'><span>Delete Teacher</span></a></li>
                <?php endif; ?>
                <?php if ($role === 'teacher'): ?>
                <li><a href='showGrades.php'><span>Student Grades</span></a></li>
                <li><a href='addGrade.php'><span>Add Grades</span></a></li>
                <li><a href='updateGrade.php'><span>Update Grades</span></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        
        <li class='active has-sub'><a href='getCourse.php'><span>Courses</span></a>
            <ul>
                <li><a href='getCourse.php'><span>Show Courses</span></a></li>
                <?php if ($role === 'admin' || $role === 'teacher'): ?>
                <li><a href='getTeaches.php'><span>Courses Teachers</span></a></li>
                <?php endif; ?>
                <?php if ($role === 'admin'): ?>
                <li><a href='addCourse.php'><span>Add Course</span></a></li>
                <li><a href='updateCourse.php'><span>Update Course</span></a></li>
                <li><a href='deleteCourse.php'><span>Delete Course</span></a></li>
                <li><a href='bestWorst.php'><span>Best/Worst grades</span></a></li>
                <?php endif; ?>
            </ul>
        </li>
        
        <li style="float:right"><a href='logout.php'><span>Logout (<?php echo ucfirst($role); ?>)</span></a></li>
    </ul>
</div>
