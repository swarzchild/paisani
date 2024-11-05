<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Show Data</title>
    <style>
        body {
            background-color: #f4f9fd;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .envelope-container {
    width: 80%;
    max-width: 600px;
    padding: 20px;
    border-radius: 8px;
    background-color: white;
}

.sender-info, .receiver-info {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 20px;
}

.sender-info {
    text-align: right;
}

.receiver-info {
    text-align: left;
}


        h3 {
            color: #0d6efd;
            font-size: 1.2rem;
        }

        .table {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <?php
    // รับข้อมูลจากฟอร์ม
    $Fnamesend = $_GET['Fnamesend']; 
    $Lnamesend = $_GET['Lnamesend'];
    $Pnumsend = $_GET['Pnumsend'];
    $Fnamereci = $_GET['Fnamereci'];
    $Lnamereci = $_GET['Lnamereci'];
    $Pnumreci = $_GET['Pnumreci'];
    $cityreci = $_GET['cityreci'];
    $UMreci = $_GET['UMreci'];
    $TUMreci = $_GET['TUMreci'];
    $Hnumreci = $_GET['Hnumreci'];
    $Preci = $_GET['Preci'];
    $TUreci = $_GET['TUreci'];
    $date = $_GET['date'];
    ?>
    
    <div class="envelope-container">
        <!-- ข้อมูลผู้ส่ง -->
        <div class="sender-info">
            <h3>ข้อมูลผู้ส่ง</h3>
            <table class="table table-sm">
                <tr>
                    <td><strong>ชื่อ-นามสกุล:</strong></td>
                    <td><?php echo $Fnamesend . " " . $Lnamesend; ?></td>
                </tr>
                <tr>
                    <td><strong>เบอร์ติดต่อ:</strong></td>
                    <td><?php echo $Pnumsend; ?></td>
            </table>
        </div>
        
        <!-- ข้อมูลผู้รับ -->
        <div class="receiver-info">
            <h3>ข้อมูลผู้รับ</h3>
            <table class="table table-sm">
                <tr>
                    <td><strong>ชื่อ-นามสกุล:</strong></td>
                    <td><?php echo $Fnamereci . " " . $Lnamereci; ?></td>
                </tr>
                <tr>
                    <td><strong>เบอร์ติดต่อ:</strong></td>
                    <td><?php echo $Pnumreci; ?></td>
                </tr>
                <tr>
                    <td><strong>ที่อยู่:</strong></td>
                    <td><?php echo $Hnumreci . ", " . $TUMreci . ", " . $UMreci . ", " . $cityreci; ?></td>
                </tr>
                <tr>
                    <td><strong>รหัสไปรษณีย์:</strong></td>
                    <td><?php echo $Preci; ?></td>
                </tr>
                <tr>
                    <td><strong>รายละเอียด:</strong></td>
                    <td><?php echo $TUreci; ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>