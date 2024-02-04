<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = $_POST['property_id'];
    $rent_paid = $_POST['rent_paid'];
    $rent_amount = $_POST['rent_amount'];

    $tenant_nid = $_POST['tenant_nid'];
    $owner_nid = $_POST['owner_nid'];

    $rent_due = $rent_amount - $rent_paid;

    $currentDate = new DateTime();
    $dueDate = $currentDate->add(new DateInterval('P1M'));
    $formattedDueDate = $dueDate->format('Y-m-d');

    require_once '../../include/db.inc.php';

    $sql = "INSERT INTO rent (property_id, rent_paid, rent_due, tenant_nid, homeowner_nid)
            VALUES ('$property_id', '$rent_paid', '$rent_due', '$tenant_nid', '$owner_nid')";

    if ($conn->query($sql) === TRUE) {
        $updateDueDate = "UPDATE room SET due_date='$formattedDueDate' WHERE property_id='$property_id'";
        $conn->query($updateDueDate);
        $conn->close();
        header("Location: rent.php?payment_success=1");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
