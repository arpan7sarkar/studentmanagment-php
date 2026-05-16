# Product Requirements Document (PRD): Student Management System Update

## 1. Objective
To enhance the existing Student Management System by implementing a role-based access control (RBAC) and a dummy authentication system. This will secure the platform and ensure that users only have access to features and data relevant to their specific roles.

## 2. Current State
The application currently functions as a flat system where all features (adding/editing/deleting students, teachers, courses, and grades) are accessible to anyone visiting the site. There is no authentication or authorization in place.

## 3. Proposed Features & Requirements

### 3.1 Dummy Login System
- **Requirement:** A basic login page must be implemented as the entry point to the application.
- **Functionality:** It does not require a fully secure backend authentication flow for this iteration. It should accept hardcoded/dummy credentials to verify user roles.
- **Credentials Setup:** The system must recognize three distinct user types with predefined dummy credentials:
  - **Admin:** (e.g., `admin` / `password`)
  - **Teacher:** (e.g., `teacher` / `password`)
  - **Student:** (e.g., `student` / `password`)

### 3.2 Role-Based Access Control (RBAC)
The application will restrict functionality and UI elements based on the logged-in user's role.

#### 3.2.1 Admin Role
- **Access Level:** Full Access.
- **Permissions:** Can perform all CRUD (Create, Read, Update, Delete) operations currently available in the system. This includes managing students, teachers, courses, and grades (the current state of the application).

#### 3.2.2 Teacher Role
- **Access Level:** Restricted / Operational.
- **Permissions:**
  - **Profile:** View their own profile information.
  - **Courses:** View the courses they are assigned to teach.
  - **Grades:** Add and update grades/results for students.
- **Restrictions:** Cannot add/delete other teachers, students, or create new courses.

#### 3.2.3 Student Role
- **Access Level:** Read-Only (Personal Data).
- **Permissions:**
  - **Profile:** View their own profile information.
  - **Courses:** View the courses they are currently enrolled in.
  - **Grades:** View their own grades/results.
- **Restrictions:** Cannot edit any data, view other students' data, or access teacher/admin functionalities.

## 4. User Stories
- **As an Admin**, I want to log in so that I can have full control over the system's data to manage the school's records.
- **As a Teacher**, I want to log in and see my courses so that I can easily enter grades for my students without accidentally modifying admin-level records.
- **As a Student**, I want to log in and see my personal grades and courses so that I can track my academic progress securely without seeing other students' data.

## 5. High-Level Implementation Steps
1. **Login Page:** Create a `login.php` UI.
2. **Session Management:** Implement PHP sessions to store the logged-in user's role upon successful entry of dummy credentials.
3. **UI Updates:** Modify the navigation menu to conditionally render links based on the active session role.
4. **Route Protection:** Add validation at the top of existing functional PHP scripts (e.g., `addCourse.php`, `deleteStudent.php`) to block access if the user's role does not permit it.
