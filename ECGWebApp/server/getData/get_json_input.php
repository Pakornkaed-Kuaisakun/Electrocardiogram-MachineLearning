<?php 
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['dataID']) && isset($_GET['userID'])) {
        require_once('../connection/connection.php');

        $data_id = intval($_GET['dataID']);
        $user_id = intval($_GET['userID']); // Ensure the ID is an integer

        // Fetch the JSON input for the specified ID
        $query = $connection->prepare("SELECT * FROM `ekgproject`.`history` WHERE `ID` = ? AND `user_ID` = ?");
        $query->bind_param('ii', $data_id, $user_id);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data, JSON_PRETTY_PRINT);
        } else {
            echo 'No data found';
        }
        $query->close();
    } else {
        echo 'Cannot/GET';
    }

?>