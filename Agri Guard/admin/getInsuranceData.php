<?php
  include 'include/db.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['policy'])) {
        $policy = $_GET['policy'];

        // Perform a database query to retrieve scheme data based on the selected policy
        $scheme_query = "SELECT id, insurance_term FROM insurance_list WHERE policy_id = " . $policy;
        $scheme_result = $conn->query($scheme_query);

        $scheme_data = array();

        while ($scheme = $scheme_result->fetch_assoc()) {
            $scheme_data[] = $scheme;
        }

        // Return the scheme data as JSON
        header('Content-Type: application/json');
        echo json_encode($scheme_data);
    }
}
?>
