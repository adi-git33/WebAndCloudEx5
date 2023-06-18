<?php
include "db.php";

$query = 'SELECT * FROM dbShnkr23stud2.tbl_34_books ORDER BY "book_id"';
$result = mysqli_query($connection, $query);

if (!$result) {
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
    <script src="js/booklist.js"></script>
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
            <section id="selectSec">
            </section>
            <section>
                <img src="images/user.png" alt="profile">
            </section>
        </header>
        <section id="liner">
        </section>
        <main>
            <div>
                <h1>Book List</h1>
                <ul id="flexList">
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li class="bookFlex" data-id="' .$row["book_id"] . '">
                                <div class="book">
                                        <a href="book.php?bookId=' . $row["book_id"] . '"><img src="' . $row["cover_url"] . '" alt="' . $row["book_name"] . '"></a>
                                </div>
                                <div class="title">
                                    <h3><a href="book.php?bookId=' . $row["book_id"] . '">' . $row["book_name"] . '</a></h3>
                                    <h5><a href="book.php?bookId=' . $row["book_id"] . '">' . $row["author"] . '</a></h5>
                                </div>
                            </li>';
                    }
                    ?>
                    <?php
                    mysqli_free_result($result);
                    ?>
                </ul>
            </div>
        </main>
    </div>
</body>

</html>
<?php
mysqli_close($connection);
?>