<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $Sname = $_POST['Sname'];
    $Rname = $_POST['Rname'];
    $PS = $_POST['PS'];
    $PR = $_POST['PR'];
    $city = $_POST['city'];
    $subcity = $_POST['subcity'];
    $subsubcity = $_POST['subsubcity'];
    $Hnumber = $_POST['Hnumber'];
    $TU = $_POST['TU'];
    $Pcode = $_POST['Pcode'];
    $date = $_POST['date'];

    $sql = "UPDATE letter SET Sname = :Sname, Rname = :Rname, PS = :PS, PR = :PR, city = :city, subcity = :subcity, subsubcity = :subsubcity, Hnumber = :Hnumber, TU = :TU, Pcode = :Pcode, date = :date WHERE id = :id";
    $query = $dbcon->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':Sname', $Sname);
    $query->bindParam(':Rname', $Rname);
    $query->bindParam(':PS', $PS, PDO::PARAM_INT);
    $query->bindParam(':PR', $PR, PDO::PARAM_INT);
    $query->bindParam(':city', $city);
    $query->bindParam(':subcity', $subcity);
    $query->bindParam(':subsubcity', $subsubcity);
    $query->bindParam(':Hnumber', $Hnumber, PDO::PARAM_INT);
    $query->bindParam(':TU', $TU);
    $query->bindParam(':Pcode', $Pcode, PDO::PARAM_INT);
    $query->bindParam(':date', $date);

    if ($query->execute()) {
        echo "<script>alert('Updated successfully'); window.location='showdata_letter.php';</script>";
    } else {
        echo "<script>alert('Failed to update data'); window.location='showdata_letter.php';</script>";
    }
}
?>
