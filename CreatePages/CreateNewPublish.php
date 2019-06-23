<?php
require '../phpScripts/db.php';
require '../Settings/config.php';
if (!R::testConnection())
    exit ('Нет соединения с базой данных');


$info = '';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
        $books = R::dispense('publish');
        $books->name = $_POST['publishName'];
        $books->address = $_POST['publishAddress'];
        $books->telephone = $_POST['tel'];
        $books->date = $_POST['date'];
        R::store($books);

        $info = "<div class=\"alert alert-success alert-dismissible\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  <strong>Success!</strong> Product was successfully added to store.
</div>";
        
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/MyCreateNewAuthorStyle.css">
    <title>CRUD Page</title>

</head>
<body class="background3" style="height: 140vh">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Create
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="CreateNewPublish.php">Publish</a>
                <a class="dropdown-item" href="CreateNewAuthor.php">Author</a>
                <a class="dropdown-item" href="CreateNewBook.php">Book</a>
                <a class="dropdown-item" href="CreateNewHeading.php">Heading</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Update
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../UpdatePages/Choose_Publish.php">Publish</a>
                <a class="dropdown-item" href="../UpdatePages/Choose_Author.php">Author</a>
                <a class="dropdown-item" href="../UpdatePages/Choose_Book.php">Book</a>
                <a class="dropdown-item" href="../UpdatePages/Choose_Heading.php">Heading</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Delete
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../DeletePages/Choose_Publish.php">Publish</a>
                <a class="dropdown-item" href="../DeletePages/Choose_Author.php">Author</a>
                <a class="dropdown-item" href="../DeletePages/Choose_Book.php">Book</a>
                <a class="dropdown-item" href="../DeletePages/Choose_Heading.php">Heading</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../MainPage.php">Go Back</a>
        </li>
    </ul>

</nav>

<div class="container" style="margin-top: 80px">
    <?php echo $info; $info = '';?>
    <h2 class="text-center text-light">Add publishing</h2>
    <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="row form-group">

            <div class="col-sm-6">
                <label for="publishName" class="text-light">Publisher Name:</label>
                <input value="" type="text" maxlength="50" name="publishName" class="form-control" id="publishName" placeholder="Publisher name" required>
            </div>
            <div class="col-sm-6">
                <label for="publishAddress" class="text-light">Publishing Address:</label>
                <input value="" type="text" maxlength="60" name="publishAddress" class="form-control" id="publishAddress" placeholder="Publishing address" required>
            </div>

        </div>

        <div class="row form-group">

            <div class="col-sm-6">
                <label for="tel" class="text-light">Publisher's phone:</label>
                <input value="" type="tel" name="tel" class="form-control" id="product" placeholder="Publisher's phone" required>
            </div>
            <div class="col-sm-6">
                <label for="date" class="text-light">Date Of Publishing:</label>
                <input value="" type="date" name="date" class="form-control" id="date" placeholder="Date of publishing" required>
            </div>

        </div>


        <hr>
        <div class="form-row justify-content-around form-group">
            <button type="reset" class="col-3 btn btn-danger" name="reset">Reset</button>
            <button type="submit" class="col-3 btn btn-success" name="add">Add</button>
        </div>

    </form>


</div>

<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-55px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>

</body>
</html>
