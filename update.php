
<?php
require_once "config.php";

$id = $name = $price = "";
$name_err = $price_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_name;
    }

    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the price.";
    } else {
        $price = $input_price;
    }

    if (empty($name_err) && empty($price_err)) {
        $sql = "UPDATE footwears SET name=?, price=? WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sdi", $param_name, $param_price, $param_id);

            $param_name = $name;
            $param_price = $price;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                header("location: ../index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
} else {
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Footwear Record</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <header>
        <img src="../images/Lacoste-logo.jpeg" alt="Lacoste Logo" style="max-width: 200px; height: auto;">
        <h1>Lacoste</h1>
    </header>

    <section id="main">
        <div class="container">
            <h2>Update Footwear Record</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                    <span class="invalid-feedback"><?php echo $price_err; ?></span>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
        <p>&copy; 2024 Lacoste Web App</p>
        </div>
    </footer>
</body>
</html>
