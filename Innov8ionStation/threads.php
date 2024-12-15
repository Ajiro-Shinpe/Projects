<?php
include './partials/config.php';
include './partials/header.php';

$method = $_SERVER['REQUEST_METHOD'];
// echo '<p class="text-white">' . $method . '</p>';

?>


<div class="container-fluid px-5">
    <?php
    $id = $_GET['threads_id'];
    $query = "SELECT * FROM threads WHERE threads_id=$id";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $threads_id = $row['threads_id'];
        $user_id = $row['user_id'];
        $threads_title = $row['threads_title'];
        $threads_desc = $row['threads_desc'];
        $created_at = $row['created_at'];
        $sql_2 = "SELECT username FROM user WHERE user_id ='$user_id'";
        $run_2 = mysqli_query($conn,$sql_2);
        $row_2 = mysqli_fetch_assoc($run_2);
        $thread_by = $row_2['username'];
        echo '
    <div class="alert alert-dark my-3" role="alert">
        <h4 class="alert-heading">' . $threads_title . '</h4>
        <p>' . $threads_desc . '</p>
        <hr>
        <p class="mb-0"> <b>Thread By '. $thread_by .' </b>at ' . $created_at . '</p>
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
';
    }

    ?>

    <?php
    $showAlert = false;
    // Insert new thread
    if ($method == 'POST') {
        $user_id = $_POST['user_id'];
        $comment = $_POST['comment'];
        $comment = str_replace("<","&lt",$comment);
        $comment = str_replace(">","&gt",$comment);
        $threads_id = $id;
    $comment_by_id = $_POST['comment_by_id'];
        $sql = "INSERT INTO comments (comment,threads_id,comment_by_id,time) VALUES ('$comment', '$id', '$comment_by_id', current_timestamp())";
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
    <?php
$loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
        if($loggedin){
            echo '
            
    <h2 class="text-white my-3">Post Your Comment</h2>
    <form action"' . $_SERVER['REQUEST_URI'] . '" method="post">
        <div class="form-floating mb-3">
            <input type="hidden" name="comment_by_id" value="'.$_SESSION['user_id'] .'">
            <div class="form-floating">
                <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comment</label>
            </div>
            <button type="submit" class="btn btn-success my-2">Submit</button>
    </form>      
            ';
        }
        else{
            echo '
            <h2 class="text-white my-3">You need to be logged in to post a comment.</h2>
            ';
        }
    ?>

    <h2 class="text-white my-3">Discuss about <strong> <?= $threads_title ?> </strong> Questions ...</h2>

    <?php
    // $id = $_GET['catid'];
    $query = "SELECT * FROM comments WHERE threads_id='$id'";
    $result = mysqli_query($conn, $query);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $comment_id = $row['comment_id'];
        $comment = $row['comment'];
        $comment_by_user_id = $row['comment_by_id'];
        $created_at = $row['time'];
        $sql_2 = "SELECT username FROM user WHERE user_id ='$comment_by_user_id'";
        $run_2 = mysqli_query($conn,$sql_2);
        $row_2 = mysqli_fetch_assoc($run_2);
        $username_2 = $row_2['username'];
        $noResult = false;
        // <img class="mr-3 rounded-circle" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f38c90d8-ed04-4a1e-83b1-0c6b3c79e76e/d37suob-77de95c3-0dbe-456a-b15e-413e977a50d0.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2YzOGM5MGQ4LWVkMDQtNGExZS04M2IxLTBjNmIzYzc5ZTc2ZVwvZDM3c3VvYi03N2RlOTVjMy0wZGJlLTQ1NmEtYjE1ZS00MTNlOTc3YTUwZDAuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.ArLB4dVKNfkR8JM3Ew9meyCXAPtAywq-Cynx_NahCHU" width="40px" height="40px" alt="Generic placeholder image">
        echo '<div class="media border p-3 rounded my-3">
            <div class="media-body my-1 text-light">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-light font-weight-bold my-0 text-break"><small> Thread by : </small> '. $username_2 .'</h5>
                    <h6 class="text-light my-0 text-break"> <small>'. $created_at .' </small></h6>
                </div>
                <p class="text-light text-break">' . $comment . '</p>
            </div>
        </div>';
    }
    if ($noResult) {
        echo '<p class="text-center text-white border shadow py-2">No threads found in this category. Ask a question.</p>';
    }
    ?>


</div>
<?php
include './partials/footer.php'
?>