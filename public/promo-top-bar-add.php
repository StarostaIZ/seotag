<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Nowy tag</title>
</head>
<body>
<!--<div class="row">-->
<!--    <div class="col-2"></div>-->
<!--    <div class="col-8">-->
<!--        <h2>Dodaj tag</h2></div>-->
<!--</div>-->
<?php
session_start();
if (isset($_SESSION['post'])):
	if ($_SESSION['post']):?>
        <script>
            alert("Promocja dodana pomyślnie");
        </script>
	<?php else: ?>
        <script>
            alert("Dodawanie zakończone niepowodzeniem")
        </script>
	<?php
	endif;
	unset($_SESSION['post']);
endif; ?>
<div class="row">
    <div class="col-1">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Menu</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="seo-tag.php">Seo Tagi</a>
                </li>
                <li>
                    <a href="seo-tag-add.php">Dodaj tag</a>
                </li>
                <li>
                    <a href="promo-top-bar.php">Promocje</a>
                </li>
                <li>
                    <a href="promo-top-bar-add.php">Dodaj promo</a>
                </li>
            </ul>
        </nav>

    </div>
    <div class="col-11">
        <div class="container">
            <form action="../post-promo-add.php" method="post">
                <div class="form-group">
                    <label for="default">Domyślna
                    </label><br>
                    <input type="checkbox" class="form-check-input position-static" value="1" name="default"
                           style="margin-left: 0" id="default">
                </div>
                <div class="form-group">
                    <label for="start_at">Start</label>
                    <input required type="date" class="form-control" name="start_at" id="start_at">

                </div>
                <div class="form-group">
                    <label for="end_at">Koniec</label>
                    <input required type="date" class="form-control" name="end_at" id="end_at">

                </div>

                <div class="form-group">
                    <label for="description">Opis</label>
                    <input required type="text" class="form-control" name="description" id="description">

                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <textarea required class="form-control" name="link" id="link"></textarea>

                </div>
                <input type="submit" class="btn btn-primary" value="Zapisz">

            </form>
        </div>
    </div>
</div>
</body>
</html>