<?php 

    include "../model/DBquery.php";
    $doctorId = $_SESSION["doctor_id"];
    $doctor = searchDoctorId($doctorId);

    $doctorname = $doctor[0]["doctor_firstName"] . "&nbsp;" .  $doctor[0]["doctor_lastName"];
    $doctorspec = $doctor[0]["doctor_speciality"];
    $doctor_email = $doctor[0]["doctor_email"];
    $doctor_phone = $doctor[0]["doctor_phone"];
?>