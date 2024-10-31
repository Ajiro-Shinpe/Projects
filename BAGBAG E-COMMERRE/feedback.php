<?php
include 'header.php';
?>
<section>

        <div class="container-fluid">
            <div class="row p-5 ">
                <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-6 col-sm-6 col-xs-12 col-xxs-6 hero-text">
                    <h2 style="overflow: hidden;">FeedBack  </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet harum dolor iure, illum recusandae ipsam repudiandae nesciunt vitae cum aut! Tempore, perspiciatis nam ex rem sunt nobis, autem asperiores nulla qui iure molestias animi. Dolor fuga odio et quo recusandae praesentium deleniti quae officiis dolores blanditiis itaque iste, atque excepturi vel adipisci maxime eius in architecto aperiam assumenda laudantium cum error placeat dolorem? Quo est dolor odit quam corporis minus officiis. Asperiores error aspernatur vero ullam deleniti tempora, culpa ipsum quasi eveniet magnam eaque architecto aperiam corporis adipisci dolorem similique eum ut ducimus aut. Expedita amet doloribus dolorum maxime nulla tempore maiores in fugiat veritatis. Obcaecati praesentium numquam dignissimos modi natus expedita, quod vero quia tempora eos sequi iusto quidem consequatur dolorem. Nemo quis illum architecto, error consequuntur sed ducimus neque molestiae enim fugiat, blanditiis placeat fugit praesentium velit eos autem eum repudiandae natus corporis ab consectetur dolorem ipsum. Pariatur dignissimos ad soluta quod enim harum sunt nostrum tempora inventore repellendus fugiat reiciendis, eligendi architecto a delectus, vitae ducimus maxime aut quia laudantium nobis accusamus quam dicta! Officiis, eos saepe quaerat tempore deleniti eius vitae aperiam similique ratione aliquam? Quis tenetur eligendi corrupti ipsam distinctio? Ullam quaerat in a assumenda dolore est neque necessitatibus commodi! Praesentium, repellendus reiciendis dolores voluptatum, nam exercitationem porro consequuntur aliquid minus ad blanditiis nesciunt earum officiis numquam provident? Eveniet, officiis ipsum atque soluta illum suscipit totam id maxime deserunt? Maxime quia modi excepturi illum sequi doloribus nobis. Fugit quas dignissimos saepe quos officia, est dolore iste aut consequatur delectus earum repudiandae animi sit impedit, harum asperiores vel, quaerat ducimus cum necessitatibus enim. Veniam dolorem quis omnis ducimus odio? Laborum error voluptatem amet rem sunt possimus quaerat adipisci rerum! Possimus molestiae exercitationem ducimus id quidem enim veritatis expedita illum, dolore totam, deserunt aperiam laboriosam ad blanditiis.</p>
                </div>
                <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-6 col-sm-6 col-xs-12 col-xxs-6 hero-img">
                    <img src="./img/customer-feedback.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="container form-container">
    <h1 class="text-center my-4">Fill This Form & Give Us Your Feedback</h1>
    <form class="row g-3" action="submit_feedback.php" method="post">
        <div class="form-floating col-md-6">
            <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
            <label class="text-dark" for="full_name">Full Name</label>
        </div>
        <div class="form-floating col-md-6">
            <input type="tel" class="form-control" name="phone_number" placeholder="Phone Number" required>
            <label class="text-dark" for="phone_number">Phone Number</label>
        </div>
        <div class="form-floating mb-3 col-md-6">
            <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            <label class="text-dark" for="email">Email address</label>
        </div>
        <div class="form-floating col-md-6">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <label class="text-dark" for="password">Password</label>
        </div>
        <div class="form-floating">
            <textarea class="form-control" name="feedback" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label class="text-dark" for="feedback">Your Feedback</label>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="agree" id="gridCheck">
                <label class="text-light form-check-label" for="gridCheck">
                    keep me logged in
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </form>
</div>

        <!-- ---------------------asigment 4 -----------------------------  -->

                <!-- Explore Section -->
                <div class="container  py-5">
                    <div class="row explore-card shadow">
                        <div class="col-md-6">
                            <img src="./img/search-crowdfunder.png" class="img-fluid" alt="Explore Image">
                        </div>
                        <div class="col-md-6 d-flex flex-column justify-content-center">
                            <h2 style="font-size: 27px;" class="mb-4 text-center">Where Can You Find Us And Visit BAG-BAG Store</h2>
                            <p style="font-size: 16px;" class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates necessitatibus, cupiditate assumenda voluptatum velit quam eveniet deserunt dolore sit quos culpa libero vero saepe incidunt nostrum repudiandae qui?</p>
                            <p style="font-size: 16px;" class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum nam rerum enim sapiente facilis aspernatur in neque architecto, praesentium, alias, qui magnam omnis numquam ullam molestiae at eius adipisci sint!</p>
                            <p style="font-size: 16px;" class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo voluptatum quam et ex delectus inventore, similique fuga facere aliquam aliquid nam aperiam asperiores beatae nemo magnam distinctio consequuntur modi quasi.</p>
                            <div class="text-center">
                                <button type="button" class="btn btn-danger mx-2">Learn More</button>
                                <button type="button" class="btn btn-secondary mx-2">Explore</button>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <?php
include 'footer.php';
?>