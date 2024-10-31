<?php
include './db.php';
include './header.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
    exit;
}
?>
<div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!     <?php echo $_SESSION['username']?>
        </h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy. your password is
    </p>
</div>

</div>
<?php
include './footer.php';
?>
