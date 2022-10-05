# Industrial Attachment Management System
This is a web-based management system which is developed to solve the problem of dealing with a lot of paperwork, making errors during filling in the logbook, losing the 
logbook or submitting error prone reports on the logbook. It will enable students to do their attachments from wherever they want without considering distance and the 
supervisors will supervise students’ logbook from wherever they will be.  

As part of the school projects' requirements, it is created from scratch without any libraries or frameworks.

![2022-10-04 (2)](https://user-images.githubusercontent.com/60463223/193738755-389dd6eb-29a3-423e-9be5-089ea22a5f86.png)

# How To Use The System
The main users of the system are:
-	**School administrator** to add, edit and delete students’ and lecturers’ records.
-	**Lecturer** for viewing students’ logbooks, commenting on them and being able to know their attachment locations for the purpose of physical supervision.
-	**Student** to fill in their logbooks and submit their attachment reports.
-	**Industrial attachment trainer** to view students’ logbooks and comment on them.

### 1. School Admin
<table>
  <tr>
    <td>Users' General reports</td>
     <td>Assign lecturers to students</td>
     <td> AttachmentTrainers and their students</td>
  </tr>
  <tr>
    <td><img src="![2022-10-04 (8)](https://user-images.githubusercontent.com/60463223/193882223-abb98de3-fe1a-4735-a2d0-7587ca05897e.png)" width=300 height=480></td>
    <td><img src="" width=300 height=480></td>
    <td><img src="" width=300 height=480></td>
  </tr>
 </table>
 
 - The admin page provides a user interface for the attachment coordinator who is the acting admi nstrator, to update and manipulate the lecturers’, students’ and trainers’ information.
 - The admin has the privileges to add a new user credential to the system that will provide the user with a default password that is encrypted before being stored to the database for security purposes.
 - The admin is the one to assign a lecturer to a student for the lecturer to know the students he or she is supervising.
 - The admin can view reports within the interface such as students logbooks, and registered students per region. The admin can get to see whether students have been allocated lecturers for supervision and vice versa.

### 2. Student
<table>
  <tr>
    <td>Student Logbook</td>
     <td>Attachment Report</td>
     <td>Lecturer and Trainer Comments</td>
  </tr>
  <tr>
    <td><img src="![lecstdlist](https://user-images.githubusercontent.com/60463223/194081268-d08cdcc0-181b-4b60-b3ee-5ac8be12989b.png)" width=270 height=450></td>
    <td><img src="" width=270 height=450></td>
    <td><img src="" width=270 height=450></td>
  </tr>
 </table>
 
 Once you register as a student, you have the following privileges:
  - view your logbook and fill in
  - submit your attachment report after the attachment period is done
  - view your lecturers and trainers comments on the logbook
  
### 3. Lecturer
<table>
  <tr>
    <td>Assigned students</td>
    <td>View student logbook and add comments</td>
  </tr>
  <tr>
    <td><img src="![lecstdlist](https://user-images.githubusercontent.com/60463223/194081268-d08cdcc0-181b-4b60-b3ee-5ac8be12989b.png)" width=300 height=450></td>
    <td><img src="![alt text](https://github.com/meekkaran/attachment-system/blob/master/images/lecomment.png?raw=true)" width=300 height=450></td>
    
  </tr>
 </table>
 
 Once you register as a lecturer, you have the following privileges:
  - view your assigned students and their respective logbooks
  - add comments to the logbooks

### 4. Trainer
<table>
  <tr>
    <td>Add student admission number</td>
    <td>View students details</td>
    <td>View student logbook and add comments</td>
  </tr>
  <tr>
    <td><img src="![traineraddadmno](https://user-images.githubusercontent.com/60463223/193850784-2e3f6936-9132-4ef2-848f-afa6842be737.png)" width=300 height=450></td>
    <td><img src="" width=300 height=450></td>
    <td><img src="" width=300 height=450></td>
  </tr>
 </table>
 
 Once you register as a trainer, you have the following privileges:
  - Add the student registration number to access their logbook
  - View students details
  - View student logbook and add comments

## Database
Used MySQL and PHPMyAdmin for the database 
  > Database name: dbsupervise
  > Username: karan
  > Password: Karanmeek@21

![db (2)](https://user-images.githubusercontent.com/60463223/193844592-4cf6b9f7-9777-4405-8f43-c12b424a7a4d.png)


## Contributions
 Pull requests are welcome.
  










