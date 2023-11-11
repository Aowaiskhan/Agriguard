<!DOCTYPE html>
<html lang="en">

<head>
    <title>Latest Insurance</title>
    <?php include 'header.html'; ?>
</head>

<body>
    <!-- Navigation bar (you can include your common header here) -->
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Latest Insurance</h1>
            </div>
        </div>

        <?php
        include 'include/db.php'; // Include your database connection file here

        // Retrieve categories that have policies
        $category_query = "SELECT c.id, c.name FROM category AS c
                            WHERE EXISTS (
                                SELECT 1
                                FROM policy_list AS p
                                WHERE p.category_id = c.id
                            )";
        $category_result = $conn->query($category_query);

        while ($category = $category_result->fetch_assoc()) {
            echo '<div class="row">';
            echo '<div class="col-12">';
            echo '<h3>' . $category['name'] . '</h3>';
            echo '</div>';

            // Retrieve latest 5 insurance records for each category
            $insurance_query = "SELECT i.id, i.policy_id, i.code, i.insurance_term, i.coverage, i.premium, i.details, i.terms_condition, i.status, i.created_at
                                FROM insurance_list AS i
                                JOIN policy_list AS p ON i.policy_id = p.id
                                WHERE p.category_id = " . $category['id'] . "
                                AND i.status = '1'
                                ORDER BY i.created_at DESC
                                LIMIT 5";
            $insurance_result = $conn->query($insurance_query);

            if ($insurance_result->num_rows > 0) {
                while ($row = $insurance_result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['insurance_term'] . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['code'] . '</h6>';
                    echo '<p class="card-text">' . $row['details'] . '</p>';
                    echo '<a href="insurance_detail.php?insurance_id=' . $row['id'] . '" class="btn btn-primary">View Insurance</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12">';
                echo '<p>No records found for this category.</p>';
                echo '</div>';
            }

            echo '</div>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <p class="py-5"></p>
    <?php include 'footer.html'; ?>
</body>

</html>
