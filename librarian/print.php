<?php
require_once '../dbcon.php';
$result = mysqli_query($con,"SELECT * FROM `students`");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Student</title>
    <style type="text/css">
        body {
            margin: 0;
        }
        .print_area {
            width: 750px;
            height:1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }
        .header, .page-info {
            text-align: center;
        }
        .header h3
        {
            margin: 0;
        }
        .data-info{

        }
        .data-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-info table th,
        .data-info table td
        {
            border: 1px solid #555;
            padding: 4px;
            line-height: 1em;

        }
    </style>
</head>
<body onload="window.print()">
<?php
$sl = 1;
$page = 1;
$total = mysqli_num_rows($result);
$per_page = 25;
while ($row = mysqli_fetch_array($result)) {
    if($sl % $per_page == 1)
    {
        echo pagehader();
    }
    ?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $row['id'] ?></td>
        <td><?= $row['fname'] ?></td>
        <td><?= $row['lname'] ?></td>
        <td><?= $row['email'] ?></td>
    </tr>
    <?php
    if($sl % $per_page == 0 || $total == $per_page)
    {
        echo pagefooter($page ++ );
    }
    $sl++; } ?>

</body>
</html>











<?php
function pagehader(){
    $data = '
    <div class="print_area">
    <div class="header">
        <h3>Faz Group LTD</h3>
        <div class="data-info">
            <table>
                <tr>
                    <th>Si no</th>
                    <th>Student Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
    ';
    return $data;
}

function pagefooter($page){
    $data = '
    </table>
            <div class="page-info"> Page :- '.$page.'</div>
        </div>
    </div>
</div>
    ';
    return $data;
}
?>