<html>
    <?php
        // Header
        include(dirname(__FILE__).'/Shared/header.php');
    ?>

    <body>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9">
                    <form class="row g-3" action="Functions/addmoment.php" method="post">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Title</label>
                            <input type="text" class="form-control" id="Title" name="title">
                        </div>
                        <div class="col-md-6">
                            <label for="Dates" class="form-label">Dates</label>
                            <input type="text" class="form-control" id="Dates" name="dates">
                        </div>
                        <div class="col-12">
                            <label for="Description" class="form-label">Description</label>
                            <textarea class="form-control" id="Description" name="description"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Photo" class="form-label">Add Photo(s)</label>
                            <input class="form-control" type="file" id="Photo" name="photo[]" accept="image/*" multiple>
                        </div>
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-success">Add Me!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <?php
    // Footer
    include(dirname(__FILE__).'/Shared/footer.php');
    ?>
</html>