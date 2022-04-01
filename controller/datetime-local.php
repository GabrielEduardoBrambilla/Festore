<?php
include('../controller/verify_login.php');

if(isset($_POST['save_datetime']))
{
    $data = new DateTime($_POST['event_dt']);
    $data->format('d/m/Y H:i:s');
    $_SESSION['data'] =  $data->format('d/m/Y ');
    $_SESSION['time'] = $data->format('H:i:s ');
    header("Location: ../view/party_register_confirmation.php");
    exit();
}else
{
    $_SESSION['status'] = "Date Time Not Inserted";
    header("Location: party_date.php");
    exit();
}
?>