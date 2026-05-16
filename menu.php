<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>
<div id='cssmenu'>
    <ul>
        <li><a href='index.php'><span>Dashboard</span></a></li>
        
        <?php if ($role === 'admin' || $role === 'student'): ?>
        <li class='active has-sub'><a href='getStudent.php'><span>Student Records</span></a>
            <ul>
                <li><a href='getStudent.php'><span>View Directory</span></a></li>
                <?php if ($role === 'admin'): ?>
                <li><a href='addStudent.php'><span>Register Student</span></a></li>
                <li><a href='updateStudent.php'><span>Update Information</span></a></li>
                <li><a href='deleteStudent.php'><span>Remove Record</span></a></li>
                <?php endif; ?>
                <li><a href='showGrades.php'><span>Academic Results</span></a></li>
                <?php if ($role === 'admin'): ?>
                <li><a href='addGrade.php'><span>Assign Grades</span></a></li>
                <li><a href='updateGrade.php'><span>Edit Grade Records</span></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        
        <?php if ($role === 'admin' || $role === 'teacher'): ?>
        <li class='active has-sub'><a href='getTeacher.php'><span>Faculty Portal</span></a>
            <ul>
                <li><a href='getTeacher.php'><span>Faculty Directory</span></a></li>
                <?php if ($role === 'admin'): ?>
                <li><a href='addTeacher.php'><span>Hire Faculty</span></a></li>
                <li><a href='updateTeacher.php'><span>Manage Profile</span></a></li>
                <li><a href='deleteTeacher.php'><span>Terminate Record</span></a></li>
                <?php endif; ?>
                <?php if ($role === 'teacher'): ?>
                <li><a href='showGrades.php'><span>Class Gradebook</span></a></li>
                <li><a href='addGrade.php'><span>Post New Grades</span></a></li>
                <li><a href='updateGrade.php'><span>Review Results</span></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        
        <li class='active has-sub'><a href='getCourse.php'><span>Curriculum</span></a>
            <ul>
                <li><a href='getCourse.php'><span>Course Catalog</span></a></li>
                <?php if ($role === 'admin' || $role === 'teacher'): ?>
                <li><a href='getTeaches.php'><span>Teaching Assignments</span></a></li>
                <?php endif; ?>
                <?php if ($role === 'admin'): ?>
                <li><a href='addCourse.php'><span>Create Course</span></a></li>
                <li><a href='updateCourse.php'><span>Modify Course</span></a></li>
                <li><a href='deleteCourse.php'><span>Archive Course</span></a></li>
                <li><a href='bestWorst.php'><span>Performance Analytics</span></a></li>
                <?php endif; ?>
            </ul>
        </li>
        
        <li style="float:right"><a href='logout.php'><span>Sign Out (<?php echo ucfirst($role); ?>)</span></a></li>
    </ul>
</div>
