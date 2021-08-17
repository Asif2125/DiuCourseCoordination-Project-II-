<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
    if (isset($_POST['submit'])) {
        // get variables from the form
        $code = $_POST['code'];
        $title = $_POST['title'];
        $batch = $_POST['batch'];
        $students = $_POST['students'];
        $teacher = $_POST['teacher'];

        //write sql query

        $sql = "INSERT INTO `search`(`code`, `title`, `batch`, `students`, `teacher`) VALUES ('$code','$title','$batch','$students','$teacher')";

        // execute the query

        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "New record created successfully.";
        }else{
            echo "Error:". $sql . "<br>". $conn->error;
        }

        $conn->close();

    }



?>

<!DOCTYPE html>
<html>
<body>

<h2>Course Information</h2>

<form action="" method="POST">
  <fieldset>
    <legend>Your Course:</legend>
    Course Code:<br>
    <input type="text" name="code" required>
    <br>
    Course Title:<br>
    <input type="text" name="title" required>
    <br>
    Batch:<br>
    <input type="text" name="batch" required>
    <br>
    Student's Name:<br>
    <input type="text" name="students" required>
    <br>
    Teacher Name:<br>
    <input type="text" name="teacher" required>
    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>


<br>
<a href="logout.php">Logout</a>
</body>
</html>