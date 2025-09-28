<?php
include 'azure_blob.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vote = $_POST["vote"];
    $container = "evote-data";
    $file = "votes.json";

    $votes = blobDownload($container, $file);
    $list = $votes ? json_decode($votes, true) : [];

    $list[] = $vote;

    blobUpload($container, $file, json_encode($list));
    echo "Your vote has been recorded.<br><a href='index.html'>Home</a>";
}
?>
