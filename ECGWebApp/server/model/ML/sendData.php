<?php
if (isset($_POST['ecg-data'])) {
    // Get the input data from the form
    $inputData = trim($_POST['ecg-data']);

    if (!isset($_SESSION['ID']) && !isset($_SESSION['token'])) {
        $error = "LOGIN";
    } else {

        // Define the API URL
        $apiUrl = 'http://127.0.0.1:5000/predict';

        // Prepare the data to send to the API
        $postData = json_encode(['input' => $inputData]);

        // Initialize a cURL session
        $ch = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postData)
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        // Execute the cURL request and capture the response
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close the cURL session
        curl_close($ch);

        $result = json_decode($response, true);

        // Check if the response is valid
        if ($httpCode === 200 && $result) {
            $ID = $_SESSION['ID'];
            $currentTimestamp = date("Y-m-d H:i:s");
            $predicted = $result['prediction'] * 100;
 
            $insert_stmt = $connection->prepare("INSERT INTO `ekgproject`.`history` (`user_ID`, `timestamp`, `input`, `result`) VALUES (?, ?, ?, ?);");
            $insert_stmt->bind_param('isss', $ID, $currentTimestamp, $inputData, $predicted);
            $insert_stmt->execute();
            
            if($insert_stmt) {
                $ECG_statusMessage_predicted = $predicted;
            } else {
                $ECG_statusMessage_error = 'Somethings was wrong.';
            }
            $insert_stmt->close();

            

        } else {
            if(isset($result)) {
                $ECG_statusMessage_error = $result['error'];
            } else {
                $ECG_statusMessage_error = 'Server connect fail. Maybe server was closed.';
            }
        }
    }
}

?>