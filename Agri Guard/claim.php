<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insurance Claim</title>
</head>

<body>
    <h1>Insurance Claim</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the submitted data
        $insurance_id = $_POST['insurance_id'];
        $disaster_type = $_POST['disaster_type'];
        $damage_amount = floatval($_POST['damage_amount']); // Convert to float for calculations

        //  Implement code to fetch insurance details based on the insurance ID
        // Replace this with your database query to retrieve insurance details
        $insurance_details = 400;

        if ($insurance_details !== null) {
            // Calculate claim amount and coverage based on insurance details
            $coverage = calculateCoverage($insurance_details, $damage_amount);
            $claim_amount = calculateClaimAmount($insurance_details, $damage_amount);

            echo "<p>Disaster Type: $disaster_type</p>";
            echo "<p>Insurance Policy: {$insurance_details['insurance_term']}</p>";
            echo "<p>Claim Amount: $claim_amount</p>";
            echo "<p>Coverage: $coverage</p>";
        } else {
            echo "<p>Insurance ID $insurance_id not found. Please check the ID and try again.</p>";
        }
    }

    function calculateClaimAmount($insurance_details, $damage_amount) {
        // Extract relevant information from the insurance details
        $premium = floatval($insurance_details['premium']);
        $policy_coverage = floatval($insurance_details['coverage']);
    
        // Calculate the claim percentage (as a decimal)
        $claim_percentage = $damage_amount / $policy_coverage;
    
        // Calculate the claim amount based on the premium and claim percentage
        $claim_amount = $claim_percentage * $premium;
    
        return $claim_amount;
    }
    
    function calculateCoverage($insurance_details, $damage_amount) {
        // Extract relevant information from the insurance details
        $policy_coverage = floatval($insurance_details['coverage']);
    
        // Calculate coverage percentage (as a decimal)
        $coverage_percentage = $policy_coverage / 100;
    
        // Calculate the coverage amount based on the damage amount
        $coverage = $coverage_percentage * $damage_amount;
    
        return $coverage;
    }
    
    ?>

    <a href="claim.php">Go Back</a>
</body>

</html>
