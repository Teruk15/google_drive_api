<?php 
/**
 * google_drive_api/api.php
 * -------------------------------------------
 * This PHP script acts as a simple API endpoint to fetch file metadata
 * from a specific public Google Drive folder. It is intended for use with frontend 
 * applications (e.g., React) to dynamically retrieve and display a list of 
 * files (e.g. pdfs) hosted in Google Drive.
 *
 * Returned JSON format:
 * [
 *   {
 *     "name": "Example.pdf",
 *     "url": "https://drive.google.com/file/d/FILE_ID/preview"
 *   },
 *   ...
 * ]
 *
 * Note:
 * - You must replace `$apiKey` and `$driveFolderID` with your own credentials.
 * - This script only returns file `id` and `name`, and builds a preview URL accordingly.
*/


// Enables cross-origin-resource sharing (CORS)
header("Access-Control-Allow-Origin: *");

// To return as JSON format
header("Content-Type: application/json");

// USE YOUR OWN
$apiKey = "AIzaSyAoc41zT10AZQI-aVMsH4mEsXU1PlLgDuo";
$driveFolderID = "13adXtGbU3fNzPPfr-aHH-rPeb81BVPsj";

// Query Parameters
// q=`folderId`+in+parent: Finds all files in the specified order
// key=`apiKey`: Pass API key for the authentication
// fields=files(id,name): Requests only ID and file name
$url = "https://www.googleapis.com/drive/v3/files?q='". $driveFolderID . "'+in+parents&key=" . $apiKey . "&fields=files(id,name)";

$response = file_get_contents($url);
$data = json_decode($response, true);

$pdfs = [];

if (!empty($data['files'])) {
    foreach ($data['files'] as $pdf) {
        $pdfs[] = [
            'name' => $pdf['name'],
            'url' => "https://drive.google.com/file/d/" . $pdf['id'] . "/preview"
        ];
    }
}

echo json_encode($pdfs, JSON_UNESCAPED_SLASHES);

?>