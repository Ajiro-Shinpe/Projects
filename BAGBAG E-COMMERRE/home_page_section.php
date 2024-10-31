
<section>
    <div class="popular-bags">
        <h2 class="overflow-hidden">Explore Bag-Bag Categories..</h2>
        <p class="overflow-hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam temporibus nemo commodi. Consectetur earum doloremque error nam.</p>
        <div class="row">
        <?php
include 'db.php'; // Ensure this file contains your database connection code

// Fetch categories from the database
$sql = "SELECT id, name, image FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $category_id = $row['id'];
        $name = htmlspecialchars($row['name']);
        $image = htmlspecialchars($row['image']);

        // Add directory to the image path if necessary
        $image_path = 'images/' . $image;

        echo '<div class="category-card col-12 col-sm-6 col-md-4 col-lg-3 mb-4">'; // 4 columns per row on large screens, adjust for smaller screens
        echo '<a href="category.php?category_id=' . $category_id . '" class="card bg-white">';
        echo '<div class="img-box">';
        echo '<img class="img-fluid" src="' . $image_path . '" alt="' . $name . '">';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title text-dark mt-3">' . $name . '</h5>';
        echo '</div>';
        echo '</a>';
        echo '</div>'; // End of the column
    }
} else {
    echo "<p>No categories found!</p>";
}

$conn->close();
?>
        </div> <!-- End of row -->
    </div>

        <!-- ---------------------asigment 4 -----------------------------  -->
        <div class="container-fluid">
            <div class="row hero-container p-5">
                <div class="col-lg-6 col-md-12 hero-text">
                    <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi distinctio vel cupiditate, eveniet,
                        dicta sed incidunt eum vero accusantium quisquam commodi accusamus error natus exercitationem!
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, magni minus necessitatibus
                        qui dignissimos asperiores ipsum natus est? Qui velit aliquid dicta ducimus eius consectetur
                        architecto dolores incidunt veniam sint.</p>
                    <p>Cum fugit repellendus laborum et quasi doloribus, ab magni tempore. Harum, sint reprehenderit!
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius ut laudantium ex? Praesentium,
                        similique numquam! Quod voluptate reprehenderit eius omnis corporis? Fugit voluptatibus saepe
                        vel voluptatum, nobis deserunt. Vel, hic.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, non praesentium! Veritatis, culpa in
                        accusamus consequatur architecto, aliquam ex consectetur ipsa cupiditate quas saepe sed delectus
                        beatae non quaerat facere? Quod tempora dolor nesciunt error voluptas sed aperiam rerum iusto
                        eius dolore. Iure error, doloribus atque consequatur molestiae magnam suscipit voluptatem
                        temporibus fugit incidunt numquam quis deleniti animi nostrum, explicabo rerum sit illo unde
                        dolor. Inventore qui iste magnam architecto quo dolore voluptatem eos aliquid impedit ipsam
                        molestiae quam dicta vel fugit sint, maiores nesciunt porro placeat rerum voluptatibus? Placeat,
                        error dolorem obcaecati repellendus eius reiciendis eaque voluptatem eligendi consequuntur!</p>
                </div>
                <div class="col-lg-6 col-md-12 hero-img">
                    <img src="images/ladieshandbag-removebg-preview.png" class="img-fluid" alt="Ladies Handbag">
                </div>
            </div>
        </div>

        <div class="explore-card-container container-fluid">
            <div class="explore-card row align-items-center">
                <div class="modal-card-img col-12 col-md-6">
                    <img src="img/modal-bg.jpg" class="img-fluid" alt="High-quality bags">
                </div>
                <div class="modal-card-content col-12 col-md-6">
                    <h2 class="overflow-hidden">Explore Bag-Bag for High-Quality Bags with Premium Materials</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates necessitatibus, cupiditate
                        assumenda voluptatum velit quam eveniet deserunt dolore sit quos culpa libero vero saepe
                        incidunt.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum nam rerum enim sapiente facilis
                        aspernatur in neque architecto praesentium alias qui magnam omnis numquam ullam molestiae at
                        eius adipisci sint!</p>
                    <div class="text-center">
                        <button type="button" class="btn btn-danger">Learn More</button>
                        <button type="button" class="btn btn-secondary">Explore</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="parent-services-container">
            <div class="services-container container-fluid">
                <div class="services-content">
                    <div class="service-icon"><i class="bi bi-truck"></i></div>
                    <h2>Express Delivery in 24h</h2>
                    <p>Experience fast and reliable delivery within 24 hours. We ensure your package arrives on time and
                        in perfect condition.</p>
                    <a href="#">Read More</a>
                </div>
                <div class="services-content">
                    <div class="service-icon"><i class="bi bi-bookmark-check-fill"></i></div>
                    <h2>Discount Coupons Every Month</h2>
                    <p>Take advantage of our monthly discount coupons and enjoy savings on your favorite products. Check
                        back often for new offers!</p>
                    <a href="#">Read More</a>
                </div>
                <div class="services-content">
                    <div class="service-icon"><i class="bi bi-box-seam"></i></div>
                    <h2>Check Package Before You Pay</h2>
                    <p>Enjoy peace of mind with our package check service. Verify your order before payment to ensure
                        satisfaction.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
    </section>
