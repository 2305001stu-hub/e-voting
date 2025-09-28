<?php
include 'azure_blob.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $candidate = $_POST["candidate"];
    $container = "evote-data";
    $file = "candidates.json";

    $candidates = blobDownload($container, $file);
    $list = $candidates ? json_decode($candidates, true) : [];

    if (!in_array($candidate, $list)) {
        $list[] = $candidate;
    }

    blobUpload($container, $file, json_encode($list));
    echo "Candidate added successfully.<br><a href='teachers.html'>Back</a>";
}
?>

