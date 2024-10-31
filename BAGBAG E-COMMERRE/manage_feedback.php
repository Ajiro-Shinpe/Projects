<?php
session_start();
include 'db.php';
include 'header.php';
?>

<div class="container my-5">
    <h1 class="mb-4">Manage Feedback</h1>

    <?php
    // Fetch all feedback data
    $stmt = $conn->prepare("SELECT * FROM feedback ORDER BY created_at DESC");
    $stmt->execute();
    $feedbacks = $stmt->get_result();
    ?>

    <?php if ($feedbacks->num_rows > 0): ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Feedback</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($feedback = $feedbacks->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($feedback['id']); ?></td>
                    <td><?php echo htmlspecialchars($feedback['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($feedback['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($feedback['email']); ?></td>
                    <td><?php echo htmlspecialchars($feedback['password']); ?></td>
                    <td><?php echo htmlspecialchars($feedback['feedback']); ?></td>
                    <td><?php echo htmlspecialchars($feedback['created_at']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p>No feedback found.</p>
    <?php endif; ?>
</div>

<?php
include 'footer.php';
?>
