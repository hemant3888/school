<?php

include '../../includes/config.php';

$department_id = $_POST['department_id'];

$query = mysqli_query($conn,"

SELECT * FROM course

WHERE depart_id = '$department_id'

ORDER BY course_name ASC

");

echo '<option value="">Select Course</option>';

while($row = mysqli_fetch_assoc($query))
{
?>

<option value="<?php echo $row['id']; ?>">

    <?php echo $row['course_name']; ?>

</option>

<?php } ?>