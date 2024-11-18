<?php //ไฟล์นี้สำหรับเปลี่ยนแปลงหรืออัพเดทข้อมูลในตาราง letter
include('config.php');
$id = $_GET['id'];
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

$sql = "UPDATE letter SET 
            Fnamesend = :Fnamesend, 
            Lnamesend = :Lnamesend, 
            Pnumsend = :Pnumsend, 
            Fnamereci = :Fnamereci, 
            Lnamereci = :Lnamereci, 
            Pnumreci = :Pnumreci, 
            cityreci = :cityreci, 
            UMreci = :UMreci, 
            TUMreci = :TUMreci, 
            Hnumreci = :Hnumreci, 
            Preci = :Preci, 
            TUreci = :TUreci, 
            date = :date 
        WHERE id = :id";
$query = $dbcon->prepare($sql);
$query->bindParam(':Fnamesend', $Fnamesend, PDO::PARAM_STR);
$query->bindParam(':Lnamesend', $Lnamesend, PDO::PARAM_STR);
$query->bindParam(':Pnumsend', $Pnumsend, PDO::PARAM_STR);
$query->bindParam(':Fnamereci', $Fnamereci, PDO::PARAM_STR);
$query->bindParam(':Lnamereci', $Lnamereci, PDO::PARAM_STR);
$query->bindParam(':Pnumreci', $Pnumreci, PDO::PARAM_STR);
$query->bindParam(':cityreci', $cityreci, PDO::PARAM_STR);
$query->bindParam(':UMreci', $UMreci, PDO::PARAM_STR);
$query->bindParam(':TUMreci', $TUMreci, PDO::PARAM_STR);
$query->bindParam(':Hnumreci', $Hnumreci, PDO::PARAM_STR);
$query->bindParam(':Preci', $Preci, PDO::PARAM_STR);
$query->bindParam(':TUreci', $TUreci, PDO::PARAM_STR);
$query->bindParam(':date', $date, PDO::PARAM_STR);
$query->bindParam(':id', $id, PDO::PARAM_INT);

$query->execute();
if ($query->rowCount() > 0) {
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อย'); window.location='showdata_letter.php';</script>";
} else {
    echo "<script>alert('มีบางอย่างผิดพลาด'); window.location='showdata_letter.php';</script>";
}
?>
