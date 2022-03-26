<?php
// Check if GET and firstname set
if (isset($_GET['firstname'])) {
    // Start cookie session
    session_start();
    // Set variable to GET input
    $firstname = htmlspecialchars(filter_input(INPUT_GET, 'firstname'));
    // Set cookie to GET value
    $_SESSION["firstname"] = $firstname;
}
// Display header
include("../view/nav.php");
?>

    <section class="container" id="register">
        <!-- If $firstname is set, display thank you message else reg form -->
        <?php if (isset($firstname)) { ?>
            <div class="alert alert-success mt-5" role="alert">
                <strong>Your account has been created successfully <?php echo $firstname ?>!</strong>
                <p><a href="index.php" class="alert-link">Return to Home</a></p>
            </div>
        <?php }  else { ?>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="GET" action="" id="registration-form">
                                <h5 class="card-title">Zippy Used Auto Login</h5>
                                <div class="mx-auto" id="reg-input">
                                    <div class="row">
                                        <div class="col-12" id="reg-row">
                                            <div id="reg-input">
                                                <input class="form-control" type="text" name="firstname" placeholder="Enter First Name">
                                            </div>

                                            <button class="btn btn-sm btn-block btn-primary my-2" type="submit">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>

    <!-- Display footer -->
<?php include("../view/footer.php") ?>