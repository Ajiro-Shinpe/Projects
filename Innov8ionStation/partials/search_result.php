<?php
// include '../partials/config.php';
include './header.php';
?>

<div class="container-fluid">
    <h2 class="text-white text-break text-center my-3">Search Result For " <em> <?= $_GET['search'] ?></em> " : </h2>
    <hr class="text-white">

    <?php
    $search = $_GET['search'];
    $query = "SELECT * FROM `threads` WHERE MATCH(threads_title , threads_desc) AGAINST('$search');";
    $result = mysqli_query($conn, $query);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $threads_id = $row['threads_id'];
        $user_id = $row['user_id'];
        $threads_title = $row['threads_title'];
        $threads_desc = $row['threads_desc'];
        $created_at = $row['created_at'];
        $sql_2 = "SELECT username FROM user WHERE user_id ='$user_id'";
        $run_2 = mysqli_query($conn, $sql_2);
        $row_2 = mysqli_fetch_assoc($run_2);
        $username_2 = $row_2['username'];
        $noResult = false;

        echo '
        <a class="text-decoration-none" href="../threads.php?threads_id=' . $threads_id . '">
        <div class="media border p-3 rounded my-3">
    
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="text-light fw-bold my-0 text-break fs-6"> <small> Posted by </small>: <b>' . $username_2 . '</b></h6>
                <h6 class="text-light my-0 text-break"> <small>' . $created_at . ' </small></h6>
            </div>
        <div class="media-body my-1 text-light">
            <h4 class="mt-0 text-white fw-bold "> ' . $threads_title . '</h4>
            <p>' . substr($threads_desc, 0, 150) . '...</p>
        </div>
    </div>
    </a>';
    }
    if ($noResult) {
        echo '<p class="text-center text-white border shadow py-2">No threads found in this category. Ask a question.</p>';
    }
    ?>
</div>
<?php
include './footer.php'
?>