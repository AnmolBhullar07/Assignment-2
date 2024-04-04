<?php
require_once "config.php";

$id = $_GET["id"] ?? null;

if (!isset($id) || empty($id)) {
    header("location: error.php");
    exit();
}

$sql = "SELECT * FROM footwears WHERE id = ?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $param_id);
    $param_id = $id;
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $name = $row["name"];
            $price = $row["price"];
        } else {
            header("location: error.php");
            exit();
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
mysqli_stmt_close($stmt);
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Footwear Record</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<header>
    <img src="../images/Lacoste-logo.jpeg" alt="Lacoste Logo" style="max-width: 200px; height: auto;">
    <h1>Lacoste</h1>
</header>

<section id="main">
    <div class="container">
        <h2>View Footwear Record</h2>
        <div class="record">
            <div class="field">
                <label>Name:</label>
                <span><?php echo $name; ?></span>
            </div>
            <div class="field">
                <label>Price:</label>
                <span><?php echo $price; ?></span>
            </div>
        </div>
        <a href="../index.php" class="btn btn-primary">Back</a>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; 2024 Lacoste Web App</p>
    </div>
</footer>
</body>
</html>
