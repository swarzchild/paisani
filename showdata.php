<a href="form_add_letter.php"><h2>Add Letter</h2></a>
<?php //ไฟล์นี้สำหรับแสดงข้อมูลในตาราง letter
include('config.php');
$sql = "SELECT * FROM letter";
$query = $dbcon->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>
          <th>Fnamesend</th>
          <th>Lnamesend</th>
          <th>Pnumsend</th>
          <th>Fnamereci</th>
          <th>Lnamereci</th>
          <th>Pnumreci</th>
          <th>Cityreci</th>
          <th>UMreci</th>
          <th>TUMreci</th>
          <th>Hnumreci</th>
          <th>Preci</th>
          <th>TUreci</th>
          <th>Date</th>
          <th colspan='2'>ฟังก์ชั่น</th>";
    foreach($result as $res) {
        echo "<tr>";
        echo "<td>" . $res->id . "</td>";
        echo "<td>" . $res->Fnamesend . "</td>";
        echo "<td>" . $res->Lnamesend . "</td>";
        echo "<td>" . $res->Pnumsend . "</td>";
        echo "<td>" . $res->Fnamereci . "</td>";
        echo "<td>" . $res->Lnamereci . "</td>";
        echo "<td>" . $res->Pnumreci . "</td>";
        echo "<td>" . $res->cityreci . "</td>";
        echo "<td>" . $res->UMreci . "</td>";
        echo "<td>" . $res->TUMreci . "</td>";
        echo "<td>" . $res->Hnumreci . "</td>";
        echo "<td>" . $res->Preci . "</td>";
        echo "<td>" . $res->TUreci . "</td>";
        echo "<td>" . $res->date . "</td>";
        echo "<td> <a href='deletedata_letter.php?id=$res->id'>ลบซะ</a></td>";
        echo "<td> <a href='updatefrom.php?id=$res->id'>Update</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
