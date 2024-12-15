<?php
include './partials/config.php';
include './partials/header.php';
$method = $_SERVER['REQUEST_METHOD'];
// echo '<p class="text-white">' . $method . '</p>';
?>


<div class="container-fluid px-5">
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM categories WHERE category_id='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_id = $row['category_id'];
        $cat_name = $row['category_name'];
        $cat_des = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    // Insert new thread
    if ($method == 'POST') {
        $user_id = $_POST['user_id'];
        $threads_title = $_POST['threads_title'];
        $threads_title = str_replace("<", "&lt", $threads_title);
        $threads_title = str_replace(">", "&gt", $threads_title);
        $threads_desc = $_POST['threads_desc'];
        $threads_desc = str_replace("<", "&lt", $threads_desc);
        $threads_desc = str_replace(">", "&gt", $threads_desc);
        $threads_cat_id = $id;
        $sql = "INSERT INTO `threads` (`threads_title`, `threads_desc`, `threads_cat_id`, `user_id`, `created_at`) VALUES ('$threads_title', '$threads_desc', '$id', '$user_id', current_Timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = "Your Thread has been posted.";
    }
    if ($showAlert) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                ' . $showAlert . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    ?>
    <div class="alert alert-dark my-3" role="alert">
        <h4 class="alert-heading">Welcome To <?= $cat_name ?> Forum</h4>
        <p><?= $cat_des ?></p>
        <hr>
        <p class="mb-0">General Rules
        <ol>
            <li>Respectful: Treat others with kindness, professionalism, and respect.</li>
            <li>No spamming: Avoid posting repetitive or irrelevant content.</li>
            <li>Stay on topic: Keep discussions relevant to the thread or category.</li>
        </ol>
        Content Guidelines
        <ol>
            <li>No illegal or harmful activities</li>
            <li>No sharing of malicious files or links</li>
            <li>No copyright infringement</li>
        </ol>
        User Behavior
        <ol>
            <li>One account per user</li>
            <li>No harassment or stalking</li>
        </ol>
        </p>
    </div>

    <div class="container">

        <?php
        $loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
        if ($loggedin) {
            echo '
         
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                    <input type="hidden" name="user_id" value="' . $_SESSION['user_id'] . '">
            <div class="form-floating mb-3">
                <input type="text" name="threads_title" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Theard Title</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="threads_desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Thread Description</label>
            </div>
            <button type="submit" class="btn btn-success my-2">Submit</button>
        </form> 
        ';
        } else {
            echo '<h1 class ="text-white"> You are not logged In! To post a Thread please logIn First. </h1>';
        }
        ?>
    </div>

    <div class="container">
        <h2 class="text-white my-3">Browse <?= $cat_name ?> Questions ...</h2>

        <?php
        // $id = $_GET['catid'];
        $query = "SELECT * FROM threads WHERE threads_cat_id='$id'";
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
            // <div class="img-container">
            // <img class="mr-3 rounded-circle" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f38c90d8-ed04-4a1e-83b1-0c6b3c79e76e/d37suob-77de95c3-0dbe-456a-b15e-413e977a50d0.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2YzOGM5MGQ4LWVkMDQtNGExZS04M2IxLTBjNmIzYzc5ZTc2ZVwvZDM3c3VvYi03N2RlOTVjMy0wZGJlLTQ1NmEtYjE1ZS00MTNlOTc3YTUwZDAuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.ArLB4dVKNfkR8JM3Ew9meyCXAPtAywq-Cynx_NahCHU" width="40px" height="40px" alt="Generic placeholder image">
            // </div>

            echo '
            <a class="text-decoration-none" href="threads.php?threads_id=' . $threads_id . '">
            <div class="media border p-3 rounded my-3">
        
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="text-white font-weight-bold my-0 text-break fs-6"> <small> Thread by </small>: <b>' . $username_2 . '</b></h6>
                    <h6 class="text-light my-0 text-break"> <small>' . $created_at . ' </small></h6>
                </div>

            <div class="media-body my-1 text-light">
                <h4 class="mt-0 text-white "> ' . $threads_title . '</h4>
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
</div>
<?php
include './partials/footer.php'
?>