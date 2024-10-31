<?php
session_start();
include 'db.php';
include 'header.php';
?>

<div class="container my-5">
    <h1 class="mb-4">Manage Contact Queries</h1>

    <?php
    // Fetch all contact queries
    $stmt = $conn->prepare("SELECT * FROM contact_us ORDER BY created_at DESC");
    $stmt->execute();
    $contacts = $stmt->get_result();
    ?>

    <?php if ($contacts->num_rows > 0): ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Comment</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($contact = $contacts->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contact['id']); ?></td>
                    <td><?php echo htmlspecialchars($contact['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($contact['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                    <td><?php echo htmlspecialchars($contact['address']); ?></td>
                    <td><?php echo htmlspecialchars($contact['city']); ?></td>
                    <td><?php echo htmlspecialchars($contact['state']); ?></td>
                    <td><?php echo htmlspecialchars($contact['comment']); ?></td>
                    <td><?php echo htmlspecialchars($contact['created_at']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p>No contact queries found.</p>
    <?php endif; ?>
</div>

<?php
include 'footer.php';
?>
