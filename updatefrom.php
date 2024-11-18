<?php
include('config.php');

// รับ ID จาก URL
$id = $_GET['id'];

// ดึงข้อมูลจากตาราง letter
$sql = "SELECT * FROM letter WHERE id = :id";
$query = $dbcon->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    echo "<script>alert('ไม่พบข้อมูล'); window.location='showdata_letter.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Form</title>
    <style>
        body {
            background-color: #f4f9fd;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
        }
        h2 {
            text-align: center;
            color: #0d6efd;
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ฟอร์มอัปเดตข้อมูลผู้ส่ง-ผู้รับ</h2>
        <form class="row g-3" action="updatedata_letter.php" method="post">
            <!-- ID ที่ไม่สามารถแก้ไขได้ -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id']); ?>">

            <h2>ข้อมูลผู้ส่ง</h2>
            <div class="mb-3">
                <label class="form-label">ชื่อผู้ส่ง</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="ชื่อ" aria-label="First name" name="Fnamesend" value="<?php echo htmlspecialchars($result['Fnamesend']); ?>" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="นามสกุล" aria-label="Last name" name="Lnamesend" value="<?php echo htmlspecialchars($result['Lnamesend']); ?>" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" name="Pnumsend" value="<?php echo htmlspecialchars($result['Pnumsend']); ?>" required>
            </div>
            
            <h2>ข้อมูลผู้รับ</h2>
            <div class="mb-3">
                <label class="form-label">ชื่อผู้รับ</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="ชื่อ" aria-label="First name" name="Fnamereci" value="<?php echo htmlspecialchars($result['Fnamereci']); ?>" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="นามสกุล" aria-label="Last name" name="Lnamereci" value="<?php echo htmlspecialchars($result['Lnamereci']); ?>" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" name="Pnumreci" value="<?php echo htmlspecialchars($result['Pnumreci']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">จังหวัด</label>
                <select class="form-select" name="cityreci" required onchange="updateDistricts()">
                    <option selected disabled value="">เลือกจังหวัด</option>
                    <option value="ratchaburi" <?php echo ($result['cityreci'] == 'ratchaburi') ? 'selected' : ''; ?>>ราชบุรี</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">อำเภอ/เขต</label>
                <select class="form-select" id="district" name="UMreci" required onchange="updateSubdistricts()">
                    <option selected disabled value="">เลือกอำเภอ/เขต</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">ตำบล</label>
                <select class="form-select" id="subdistrict" name="TUMreci" required>
                    <option selected disabled value="">เลือกตำบล</option>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="บ้านเลขที่" name="Hnumreci" value="<?php echo htmlspecialchars($result['Hnumreci']); ?>" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="Preci" value="<?php echo htmlspecialchars($result['Preci']); ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">รายละเอียดที่อยู่</label>
                <input type="text" class="form-control" name="TUreci" value="<?php echo htmlspecialchars($result['TUreci']); ?>" required>
            </div>
            <label>วันที่สั่ง</label>
            <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($result['date']); ?>" required>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
    <script>
        const districtsData = {
        ratchaburi: ["อำเภอเมืองราชบุรี", "อำเภอบ้านโป่ง", "อำเภอโพธาราม", "อำเภอดำเนินสะดวก"]
    };

    const subdistrictsData = {
        "อำเภอเมืองราชบุรี": ["ตำบลหน้าเมือง", "ตำบลเจดีย์หัก"],
        "อำเภอบ้านโป่ง": ["ตำบลบ้านโป่ง", "ตำบลหนองกบ"],
        "อำเภอโพธาราม": ["ตำบลคลองตาคต", "ตำบลบ้านฆ้อง"],
        "อำเภอดำเนินสะดวก": ["ตำบลดำเนินสะดวก", "ตำบลประสาทสิทธิ์"]
    };

    function updateDistricts() {
        const province = document.getElementById("province").value;
        const districtSelect = document.getElementById("district");
        districtSelect.innerHTML = '<option selected disabled value="">เลือกอำเภอ/เขต</option>';

        if (province && districtsData[province]) {
            districtsData[province].forEach(district => {
                const option = document.createElement("option");
                option.value = district;
                option.text = district;
                districtSelect.appendChild(option);
            });
        }
    }

    function updateSubdistricts() {
        const district = document.getElementById("district").value;
        const subdistrictSelect = document.getElementById("subdistrict");
        subdistrictSelect.innerHTML = '<option selected disabled value="">เลือกตำบล</option>';

        if (district && subdistrictsData[district]) {
            subdistrictsData[district].forEach(subdistrict => {
                const option = document.createElement("option");
                option.value = subdistrict;
                option.text = subdistrict;
                subdistrictSelect.appendChild(option);
            });
        }
    }
    </script>
</body>
</html>
