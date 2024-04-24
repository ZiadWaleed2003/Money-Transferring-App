<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $bank_name = $_POST['name'] ?? '';
    $id = $_POST['id'] ?? '';


    // Check if form fields are empty
    if (!empty($bank_name) && !empty($id)) {
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
        $sql = "INSERT INTO bank (name, id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $bank_name, $id);

        if ($stmt->execute() === TRUE) {
        echo "<p>BANK ADDED SUCCESSFFULLY</p>";
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

