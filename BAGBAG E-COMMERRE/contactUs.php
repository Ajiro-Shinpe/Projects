<?php
include 'header.php';
?>
        <section>
                <!-- Contact Section -->
                <div class="container p-5">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h2 style="font-size: 27px;" class="text-center mb-4">Contact Us</h2>
                            <p class="text-center" style="font-size: 16px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, magni minus necessitatibus qui dignissimos asperiores ipsum natus est? Qui velit aliquid dicta ducimus eius consectetur architecto dolores incidunt veniam sint, optio alias, repellendus, saepe ut dolor voluptate. Cum fugit repellendus laborum et quasi doloribus, ab magni tempore. Harum, sint reprehenderit!</p>
                            <p class="text-center" style="font-size: 16px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi distinctio vel cupiditate, eveniet, dicta sed incidunt eum vero accusantium quisquam commodi accusamus error natus exercitationem!</p>
                            <p class="text-center" style="font-size: 16px;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius ut laudantium ex? Praesentium, similique numquam! Quod voluptate reprehenderit eius omnis corporis? Fugit voluptatibus saepe vel voluptatum, nobis deserunt. Vel, hic.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="./img/virtual-assistant.png" class="img-fluid" alt="Contact Us Image">
                        </div>
                    </div>
                </div>
            
                <!-- Form Section --><div class="container py-5">
    <h2 class="text-white text-center fs-1 my-4 font-weight-BOLD">Fill This Form To Contact Us</h2>
    <form class="row g-3" action="submit_contact.php" method="post">
        <div class="form-floating col-md-6">
            <input type="text" class="form-control" name="full_name" id="floatingName" placeholder="Full Name">
            <label class="text-dark" for="floatingName">Full Name</label>
        </div>
        <div class="form-floating col-md-6">
            <input type="tel" class="form-control" name="phone_number" id="floatingPhone" placeholder="Phone Number">
            <label class="text-dark" for="floatingPhone">Phone Number</label>
        </div>
        <div class="form-floating col-md-6">
            <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com">
            <label class="text-dark" for="floatingEmail">Email address</label>
        </div>
        <div class="form-floating col-md-6">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label class="text-dark" for="floatingPassword">Password</label>
        </div>
        <div class="form-floating col-md-12">
            <input type="text" class="form-control" name="address" id="floatingAddress" placeholder="Address">
            <label class="text-dark" for="floatingAddress">Address</label>
        </div>
        <div class="form-floating col-md-12">
            <input type="text" class="form-control" name="address2" id="floatingAddress2" placeholder="2nd Address">
            <label class="text-dark" for="floatingAddress2">2nd Address</label>
        </div>
        <div class="form-floating col-md-4">
            <input type="text" class="form-control" name="city" id="floatingCity" placeholder="City">
            <label class="text-dark" for="floatingCity">City</label>
        </div>
        <div class="form-floating col-md-4">
            <input type="text" class="form-control" name="zip" id="floatingZip" placeholder="Zip">
            <label class="text-dark" for="floatingZip">Zip</label>
        </div>
        <div class="form-floating col-md-4">
            <input type="text" class="form-control" name="state" id="floatingState" placeholder="State">
            <label class="text-dark" for="floatingState">State</label>
        </div>
        <div class="form-floating col-md-12">
            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label class="text-dark" for="floatingTextarea2">Comment</label>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="agree" id="gridCheck">
                <label class="text-light" class="form-check-label" for="gridCheck">
                  Check me out
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </form>
</div>

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