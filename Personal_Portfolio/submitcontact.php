
<?php
  include "./config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<div class='alert alert-danger'>All fields are required!</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger'>Invalid email format!</div>";
    } else {
        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO `contact` (`name`, `email`, `subject`, `msg`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            echo '<script>
  window.alert("Message sent successfully!");
</script>';
            header('location:./contact.php');
        } else {
            echo '<script>
  window.alert("ERROR : Message failed to sent!");
</script>';
        }

        $stmt->close();
    }
}
?>
