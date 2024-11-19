<?php
include('config.php');

$sql = "SELECT * FROM letter";
$query = $dbcon->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Show Data</title>
</head>
<body>
    <div class="container mt-5">
        <h2>ข้อมูลผู้ส่ง-ผู้รับ</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อผู้ส่ง</th>
                    <th>ชื่อผู้รับ</th>
                    <th>เบอร์ผู้ส่ง</th>
                    <th>เบอร์ผู้รับ</th>
                    <th>จังหวัด</th>
                    <th>อำเภอ</th>
                    <th>ตำบล</th>
                    <th>บ้านเลขที่</th>
                    <th>รายละเอียดที่อยู่</th>
                    <th>รหัสไปรษณีย์</th>
                    <th>วันที่สั่ง</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['Sname']); ?></td>
                        <td><?php echo htmlspecialchars($row['Rname']); ?></td>
                        <td><?php echo htmlspecialchars($row['PS']); ?></td>
                        <td><?php echo htmlspecialchars($row['PR']); ?></td>
                        <td><?php echo htmlspecialchars($row['city']); ?></td>
                        <td><?php echo htmlspecialchars($row['subcity']); ?></td>
                        <td><?php echo htmlspecialchars($row['subsubcity']); ?></td>
                        <td><?php echo htmlspecialchars($row['Hnumber']); ?></td>
                        <td><?php echo htmlspecialchars($row['TU']); ?></td>
                        <td><?php echo htmlspecialchars($row['Pcode']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td>
                            <a href="updateform_letter.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_letter.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
