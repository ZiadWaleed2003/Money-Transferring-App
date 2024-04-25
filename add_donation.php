<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $donation_name = $_POST['name'] ?? '';
    $acct_no = $_POST['account_number'] ?? '';


    // Check if form fields are empty
    if (!empty($donation_name) && !empty($acct_no)) {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "moneyapp";

        // Create connection
        $conn = mysqli_connect($host, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute SQL statement
        $sql = "INSERT INTO donations (name, account_number) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $donation_name, $acct_no);

        if ($stmt->execute() === TRUE) {
        echo "<p>DONATION ADDED SUCCESSFFULLY</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "<p>please fill all the forms</p>";
    }
}
?>

