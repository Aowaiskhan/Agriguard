<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insurance Calculator</title>
    <?php include 'header.html'; ?>
</head>

<?php
include 'include/db.php';
// Initialize variables
$disaster_type = "";
$insurance_term = "";
$claim_amount = "";
$coverage = "";
$insurance_details = null; // Initialize insurance_details to null
$damage_amount = "";
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted data
    $insurance_id = $_POST['insurance_subcategory'];
    $disaster_type = "flood";

    //$damage_amount = floatval($_POST['damage_amount']); // Convert to float for calculations
   

    // Perform a database query to retrieve insurance details based on the selected policy
    $insurance_query = "SELECT code, insurance_term, coverage, premium FROM insurance_list WHERE id = " . $insurance_id;
    $insurance_result = $conn->query($insurance_query);

    if ($insurance_result->num_rows > 0) {
        $insurance_details = $insurance_result->fetch_assoc();
        $damage_amount = $insurance_details['premium'];
        // Calculate claim amount and coverage based on insurance details
        $coverage = calculateCoverage($insurance_details, $damage_amount);
        $claim_amount = calculateClaimAmount($insurance_details, $damage_amount);
        $insurance_term = $insurance_details['insurance_term'];
        
    }
}

function calculateClaimAmount($insurance_details, $damage_amount)
{
    // Extract relevant information from the insurance details
    $premium = floatval($insurance_details['premium']);
    $policy_coverage = floatval($insurance_details['coverage']);

    // Calculate the claim percentage (as a decimal)
    $claim_percentage = $damage_amount / $policy_coverage;

    // Calculate the claim amount based on the premium and claim percentage
    $claim_amount = $claim_percentage * $premium;

    return $claim_amount;
}

function calculateCoverage($insurance_details, $damage_amount)
{
    // Extract relevant information from the insurance details
    $policy_coverage = floatval($insurance_details['coverage']);

    // Calculate coverage percentage (as a decimal)
    $coverage_percentage = $policy_coverage / 100;

    // Calculate the coverage amount based on the damage amount
    $coverage = $coverage_percentage * $damage_amount;
    return $coverage;
}

?>

<body>
    <?php include 'nav.php'; ?>
    <?php include 'include/db.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Insurance Calculator</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="land_area">Land Area (in Hectare):</label>
                        <input type="text" class="form-control" name="land_area" id="land_area" required>
                    </div>

                    <div class="form-group">
                        <label for="insurance_category">Category</label>
                        <select class="form-control" name="insurance_category" id="insurance_category" required>
                            <?php
                            $category_query = "SELECT id, name FROM category";
                            $category_result = $conn->query($category_query);

                            while ($category = $category_result->fetch_assoc()) {
                                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="insurance_subcategory">Policy</label>
                        <select class="form-control" name="insurance_subcategory" id="insurance_subcategory" required>
                            <option value="">Select Policy</option>
                            <!-- Policy options will be populated dynamically using JavaScript -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="insurance_scheme">Scheme</label>
                        <select class="form-control" name="insurance_scheme" id="insurance_scheme" required>
                            <option value="">Select Scheme</option>
                            <!-- Scheme options will be populated dynamically using JavaScript -->
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Calculate</button>
                </form>
            </div>
        </div>

        <div id="results">
            <?php
            if ($insurance_details !== null) {
                echo "<p>Disaster Type: $disaster_type</p>";
                echo "<p>Insurance Policy: $insurance_term</p>";
                echo "<p>Claim Amount: $claim_amount</p>";
                echo "<p>Coverage: $coverage</p>";
            } else {
                echo "<p>Insurance ID not found or not selected. Please check the ID and try again.</p>";
            }
            ?>
        </div>
    </div>

    <p class="py-4"></p>
    <?php include 'footer.html'; ?>

    <script>
        // Function to update the policy (subcategory) dropdown based on the selected category
        function updatePolicyDropdown() {
            var category = document.getElementById("insurance_category").value;
            var policySelect = document.getElementById("insurance_subcategory");

            // Clear existing options
            policySelect.innerHTML = "<option value=''>Select Policy</option>";

            if (category !== "") {
                // Make an AJAX request to fetch policy options for the selected category
                // Replace 'your_fetch_policy_data.php' with the actual endpoint
                fetch('get-policy-data.php?category=' + category)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(policy => {
                            policySelect.options.add(new Option(policy.name, policy.id));
                        });
                    });
            }
        }

        // Function to update the scheme (insurance term) dropdown based on the selected policy
        function updateSchemeDropdown() {
            var policy = document.getElementById("insurance_subcategory").value;
            var schemeSelect = document.getElementById("insurance_scheme");

            // Clear existing options
            schemeSelect.innerHTML = "<option value=''>Select Scheme</option>";

            if (policy !== "") {
                // Make an AJAX request to fetch scheme options for the selected policy

                fetch('getInsuranceData.php?policy=' + policy)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(scheme => {
                            schemeSelect.options.add(new Option(scheme.insurance_term, scheme.id));
                        });
                    });
            }
        }

        // Attach event listeners to the category and policy dropdowns
        document.getElementById("insurance_category").addEventListener("change", updatePolicyDropdown);
        document.getElementById("insurance_subcategory").addEventListener("change", updateSchemeDropdown);
    </script>
</body>

</html>
