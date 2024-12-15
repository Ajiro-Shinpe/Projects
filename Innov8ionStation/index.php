<?php
include './partials/config.php';
include './partials/header.php';
include './partials/carousel.php';
?>

<div class="container-fluid">
<div class="mt-4 p-5">
    <?php echo '
    <h2 class="text-white text-break my-3 text-center">Assalam O Allikum "' . $_SESSION['username'] . '" Welcome To Innov8ionStation</h2>
    '; ?>
    
    <h3 class="text-light text-center my-3 text-break">Innov8ionStation Categories</h3>
    
    <div class="row justify-content-center">
        <?php
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $cat_id = $row['category_id'];
            $cat_name = $row['category_name'];
            $cat_des = $row['category_description'];

            // <img src="https://source.unsplash.com/500x400/?'. $cat_name . ',coding" class="card-img-top rounded-top" alt="' . $cat_name . ' image">
            echo '
            <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                <div class="card mb-4 bg-dark text-light border-0  shadow-lg rounded">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title"><b>' . $cat_name . '</b></h4>
                        <p class="card-text lead fs-6">' . substr($cat_des, 0, 100) . '...</p>
                        <a href="threadlist.php?catid=' . $cat_id . '" class="mt-auto btn btn-outline-danger btn-sm">Explore</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>
  </div>
</div>
<?php
include './partials/footer.php';
?>