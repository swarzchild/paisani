<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <?php 
include('config.php');
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

$sql="INSERT INTO `letter`(`Sname`, `Rname`, `PS`, `PR`, `city`, `subcity`, `subsubcity`, `Hnumber`, `TU`, `Pcode` , `date`) VALUES 
('$Fnamesend $Lnamesend','$Fnamereci $Lnamereci','$Pnumsend','$Pnumreci','$cityreci','$UMreci','$TUMreci','$Hnumreci','$TUreci','$Preci','$date')";
$query = $dbcon->prepare($sql);
$result = $query->execute();
if ($result) {
    echo "<script>
    alert('เพิ่มข้อมูลเรียบร้อย');
    window.location='success.php';
    </script>";
} else {
    echo "<script>
    alert('มีบางอย่างผิดพลาด');
    window.location='paisani.html';
    </script>";
}
?>
    ?>
</body>
</html>