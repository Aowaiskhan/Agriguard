<?php
  include 'include/db.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['category'])) {
        $category = $_GET['category'];

        // Perform a database query to retrieve policy data based on the selected category
        $policy_query = "SELECT id, name FROM policy_list WHERE category_id = " . $category;
        $policy_result = $conn->query($policy_query);

        $policy_data = array();

        while ($policy = $policy_result->fetch_assoc()) {
            $policy_data[] = $policy;
        }

        // Return the policy data as JSON
        header('Content-Type: application/json');
        echo json_encode($policy_data);
    }
}
?>
