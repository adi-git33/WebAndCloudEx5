<?php
include "db.php";

$bookId = $_GET["bookId"];
$query = 'SELECT * FROM dbShnkr23stud2.tbl_34_books where book_id="' . $bookId . '"';
$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("DB quary failed.");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQuary -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/book.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Adi Levi - Books </title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <header>
            <section>
                <a href="bookList.php" id="logo"></a>
            </section>
            <section>
                <img src="images/user.png" alt="profile">
            </section>
        </header>
        <section id="liner">
        </section>
        <main>
            <div id="bookPage">
                <div id="carouselExample" class="carousel slide carousel-fade">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php
                            echo '<img src="' . $row["cover_url"] . '" class="d-block w-100" alt="firstPic">';
                            ?>
                        </div>
                        <div class="carousel-item">
                            <?php
                                echo '<img src="' . $row["img_url"] . '" class="d-block w-100" alt="firstPic">'
                            ?>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <?php
                echo '<section>
                        <h1>' . $row["book_name"] . '</h1>
                        <h3>' . $row["author"] . ' (Author)</h3>
                        <p id="catInsert"></p>
                    </section>';
                ?>
                <?php
                mysqli_free_result($result);
                ?>
            </div>
        </main>
    </div>
</body>

</html>
<?php
mysqli_close($connection);
?>