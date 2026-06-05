<?php

include '../includes/config.php';

if(!isset($_GET['id']))
{
    die("Student ID Missing");
}

$id = mysqli_real_escape_string(
    $conn,
    $_GET['id']
);

$query = mysqli_query($conn, "

SELECT

students.*,

course.course_name,

center.center_name

FROM students

LEFT JOIN course
ON students.course_id = course.id

LEFT JOIN center
ON students.center_id = center.id

WHERE students.id='$id'

");

if(mysqli_num_rows($query) == 0)
{
    die("Student Not Found");
}

$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>
        Print ID Card
    </title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            font-family:Arial, sans-serif;

            background:#f2f2f2;

            padding:30px;

        }

        /* ID CARD */

        .id-card{

            width:700px;
   font-family: 'Times New Roman', serif;
            height:430px;

            background:#fff;

            border-radius:20px;

            overflow:hidden;

            border:3px solid #3d81cf;

            margin:auto;

            position:relative;

        }

        /* HEADER */

        .header{

            background:#3d81cf;

            height:90px;

            padding:10px 20px;

        }

        .logo{

            width:80px;

            float:left;

        }

        .logo img{

            width:70px;

            height:70px;

            object-fit:contain;

        }

        .school-name{

            margin-left:90px;

            text-align:center;

            padding-top:12px;

        }

        .school-name h2{

            color:#fff;

            font-size:24px;

            white-space:nowrap;

            font-family:'Trebuchet MS', sans-serif;

        }

        /* CONTENT */

        .content{

            padding:20px;

        }

        /* PHOTO */

        .photo{

            width:160px;

            height:190px;

            border:2px solid #3d81cf;

            border-radius:20px;

            overflow:hidden;

            float:left;

        }

        .photo img{

            width:100%;

            height:100%;

            object-fit:cover;

        }

        /* DETAILS */

        .details{

            margin-left:190px;

        }

        .adm{

            text-align:left;

            font-size:18px;

            font-weight:bold;

            margin-bottom:  5px;

        }

        table{

            width:100%;

            border-collapse:collapse;

        }

        table td{

            padding:5px 0;

            font-size:16px;

        }

        .label{

            width:120px;

            color:#3d81cf;

            font-weight:bold;

        }

        .colon{

            width:20px;

            font-weight:bold;

        }

        /* FOOTER */

        .footer11{

            position:absolute;

            bottom:0;

            left:0;

            width:100%;

            height:55px;

            background:#3d81cf;

            text-align:center;

            line-height:55px;

            color:#fff;

            font-size:26px;

            font-family:'Trebuchet MS', sans-serif;

        }

        /* PRINT */

        @media print{

            body{

                background:none;

                padding:0;

            }

            .print-btn{

                display:none;

            }

        }

        /* BUTTON */

        .print-btn{

            display:block;

            margin:20px auto;

            padding:12px 25px;

            background:#3d81cf;

            color:#fff;

            border:none;

            border-radius:5px;

            font-size:18px;

            cursor:pointer;

        }

    </style>

</head>

<body>

<!-- PRINT BUTTON -->

<button
    class="print-btn"
    onclick="window.print()">

    Print ID Card

</button>

<!-- ID CARD -->

<div class="id-card">

    <!-- HEADER -->

    <div class="header">

        <!-- LOGO -->

        <div class="logo">

            <img src="assets/logo/logo1.jpeg">

        </div>

        <!-- INSTITUTE NAME -->

        <div class="school-name">

            <h2>

                The Galaxy Institute of Information Technology

            </h2>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="content">

        <!-- PHOTO -->

        <div class="photo">

            <img
                src="../center/uploads/students/<?php echo $row['photo']; ?>">

        </div>

        <!-- DETAILS -->

        <div class="details">

            <div class="adm">

                Enroll No :
                <?php echo $row['enroll_no']; ?>

            </div>

            <table>

                <tr>

                    <td class="label">
                        Name
                    </td>

                    <td class="colon">
                        :
                    </td>

                    <td>
                        <?php echo $row['stu_name']; ?>
                    </td>

                </tr>

                <tr>

                    <td class="label">
                        Course
                    </td>

                    <td class="colon">
                        :
                    </td>

                    <td>
                        <?php echo $row['course_name']; ?>
                    </td>

                </tr>
                <tr>

                    <td class="label">
                        Father Name
                    </td>

                    <td class="colon">
                        :
                    </td>

                    <td>
                        <?php echo $row['father_name']; ?>
                    </td>

                </tr>


                <tr>

                    <td class="label">
                        DOB
                    </td>

                    <td class="colon">
                        :
                    </td>

                    <td>
                        <?php echo date(
                            'd/m/Y',
                            strtotime($row['dob'])
                        ); ?>
                    </td>

                </tr>

                <tr>

                    <td class="label">
                        Mobile No.
                    </td>

                    <td class="colon">
                        :
                    </td>

                    <td>
                        <?php echo $row['mobile']; ?>
                    </td>

                </tr>
                <tr>

                    <td class="label">
                        Session
                    </td>

                    <td class="colon">
                        :
                    </td>

                    <td>
                        <?php echo $row['session']; ?>
                    </td>

                </tr>

                <!-- <tr>

                    <td class="label">
                        Center
                    </td>

                    <td class="colon">
                        :
                    </td>

                    <td>
                        <?php echo $row['center_name']; ?>
                    </td>

                </tr> -->

            </table>

        </div>

    </div>

    <!-- FOOTER -->

    <div class="footer11">

        <h5>Center - <?php echo $row['center_name']; ?></h5>

    </div>

</div>

</body>

</html>