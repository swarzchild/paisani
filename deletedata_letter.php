<?php //ไฟล์นี้สำหรับลบข้อมูลจากตาราง letter
$id = $_GET['id'];
include('config.php'); 
$sql = "DELETE FROM letter WHERE id = :id";
$query = $dbcon->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
if ($query->rowCount() > 0) {
    echo "<script>alert('ลบข้อมูลเรียบร้อย'); window.location='showdata_letter.php';</script>";
} else {
    echo "<script>alert('มีบางอย่างผิดพลาด'); window.location='showdata_letter.php';</script>";
}
?>
