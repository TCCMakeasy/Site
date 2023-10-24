<?php
// Check if the denuncia ID is set
if(isset($_POST['id'])) {
    // Get the denuncia ID from the POST request
    $id = $_POST['id'];

    // Connect to the database
    require_once('../../conexao.php');

    // Check if the connection was successful
    if(!$sql) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement to delete the denuncia
    $request = "DELETE FROM alerta WHERE id_alerta = $id";

    // Execute the SQL statement
    if(mysqli_query($sql, $request)) {
        // Denuncia was deleted successfully
        echo "Denuncia deleted successfully.";
    } else {
        // Error deleting the denuncia
        echo "Error deleting denuncia: " . mysqli_error($sql);
    }

    // Close the database connection
    mysqli_close($sql);
} else {
    // Denuncia ID was not set
    echo "Denuncia ID not set.";
}
