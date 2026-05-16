<?php

include('../../includes/config.php');

require '../../vendor/autoload.php';

use Dompdf\Dompdf;

$id = $_GET['id'];

$sql = "SELECT students.*,
        department.depart_name,
        course.course_name,
        center.center_name

        FROM students

        LEFT JOIN department
        ON department.id = students.depart_id

        LEFT JOIN course
        ON course.id = students.course_id

        LEFT JOIN center
        ON center.id = students.center_id

        WHERE students.id='$id'";

$query = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($query);

$html = '

<h2 style="text-align:center;color:orange;">
'.$row['center_name'].'
</h2>

<h3 style="text-align:center;">
Student Registration Slip
</h3>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>Registration No</th>
<td>'.$row['registration_no'].'</td>
</tr>

<tr>
<th>Student Name</th>
<td>'.$row['stu_name'].'</td>
</tr>

<tr>
<th>Department</th>
<td>'.$row['depart_name'].'</td>
</tr>

<tr>
<th>Course</th>
<td>'.$row['course_name'].'</td>
</tr>

<tr>
<th>Mobile</th>
<td>'.$row['mobile'].'</td>
</tr>

<tr>
<th>Email</th>
<td>'.$row['email'].'</td>
</tr>
<tr>
<th>Session</th>
<td>'.$row['session'].'</td>
</tr>

<tr>
<th>Address</th>
<td>'.$row['address'].'</td>
</tr>

<tr>
<th>Fees</th>
<td>'.$row['fees'].'</td>
</tr>

</table>

';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$file_name = time().'_'.$row['registration_no'].'.pdf';

$file_path = '../uploads/slips/'.$file_name;

file_put_contents($file_path, $dompdf->output());

$update = "UPDATE students
SET registration_slip='$file_name'
WHERE id='$id'";

mysqli_query($conn, $update);

header("Location: ../uploads/slips/".$file_name);

?>