<?php
function getBlobClient() {
    require 'vendor/autoload.php';
    use MicrosoftAzure\Storage\Blob\BlobRestProxy;

    $connectionString = "DefaultEndpointsProtocol=https;AccountName=YOUR_ACCOUNT;AccountKey=YOUR_KEY;EndpointSuffix=core.windows.net";
    return BlobRestProxy::createBlobService($connectionString);
}

function blobDownload($container, $blobName) {
    try {
        $blobClient = getBlobClient();
        $result = $blobClient->getBlob($container, $blobName);
        return stream_get_contents($result->getContentStream());
    } catch (Exception $e) {
        return null;
    }
}

function blobUpload($container, $blobName, $content) {
    $blobClient = getBlobClient();
    $blobClient->createBlockBlob($container, $blobName, $content);
}
?>
