<?php require_once("main-components/header.php") ?>
<?php require_once("main-components/side-navbar.php") ?>
<?php require_once("main-components/navbar.php") ?>


     <!-- Feedback Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6" >
                        <div class="bg-secondary rounded h-100 p-4">
                            <h2 class="mb-4">Feedback</h2>
                            <form>

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea" style="height: 150px;"></textarea>
                                    <label for="floatingTextarea">Comments</label>
                                </div>
                                <div class="mb-3">
                                </div>
                                    <input type="submit" name="Add" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Feedback end -->

        <?php require_once("main-components/footer.php") ?>