<?php
include 'config.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=contact_enquiry.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "S.No\tName\tMobile\tEmail\tMessage\tAddress\tCreated Date\n";

$sql = "SELECT * FROM enquiry ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$a = 1;

while ($row = mysqli_fetch_assoc($result)) {

    echo $a . "\t";
    echo $row['name'] . "\t";
    echo $row['mobile'] . "\t";
    echo $row['email'] . "\t";
    echo $row['subject'] . "\t";

    echo str_replace("\n", " ", $row['message']) . "\t";
    
    echo $row['created'] . "\n";

    $a++;
}

exit;
?>