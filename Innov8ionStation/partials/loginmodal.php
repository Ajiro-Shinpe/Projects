<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Please Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/iforum/partials/handlelogin.php" method="post">
                <div class="form-floating mb-3">
                        <!-- <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required> -->
                        <input type="text" name="username" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                        <label for="floatingEmail">username </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">login</button>
                </div>
            </form>
        </div>
    </div>
</div>