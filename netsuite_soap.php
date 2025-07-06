<?php
function upload_to_netsuite($filePath, $config) {
    $fileName = basename($filePath);
    $fileContent = file_get_contents($filePath);
    $base64File = base64_encode($fileContent);

    $wsdl = "https://webservices.netsuite.com/wsdl/v2023_1_0/netsuite.wsdl";
    $client = new SoapClient($wsdl, ['trace' => 1]);

    $headers = [
        "Authorization: NLAuth nlauth_account={$config['account']}, nlauth_consumer_key={$config['consumer_key']}, nlauth_token={$config['token_id']}, nlauth_signature={$config['token_secret']}"
    ];

    $fileRecord = [
        "name" => $fileName,
        "folder" => ["internalId" => $config['ns_folder_id']],
        "content" => $base64File,
        "contentType" => mime_content_type($filePath),
        "attachFrom" => "_computer",
        "description" => "Auto-uploaded from PHP app"
    ];

    $params = ["record" => ["platformCore:File" => $fileRecord]];
    try {
        $res = $client->__soapCall("add", [$params]);
        echo "File uploaded successfully.";
    } catch (Exception $e) {
        echo "SOAP Error: " . $e->getMessage();
    }
}
