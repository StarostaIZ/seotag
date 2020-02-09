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
            alert("Seo tag dodany pomyślnie");
        </script>
	<?php else: ?>
        <script>
            alert("Dodawanie zakończone niepowodzeniem, podane parametry już istnieją")
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
            <form action="../post-seo-tag-add.php" method="post">
                <div class="form-group">
                    <label for="parameters">Parametry</label>
                    <input required type="text" class="form-control" name="parameters" id="parameters">

                </div>
                <div class="form-group">
                    <label for="head_title">Nagłówek - tytuł</label>
                    <input required type="text" class="form-control" name="head_title" id="head_title">

                </div>
                <div class="form-group">
                    <label for="head_description">Nagłówek - opis</label>
                    <input required type="text" class="form-control" name="head_description" id="head_description">

                </div>
                <div class="form-group">
                    <label for="set_canonical"> Kanoniczny
                    </label><br>
                    <input type="checkbox" class="form-check-input position-static" name="set_canonical"
                           style="margin-left: 0" id="set_canonical">

                </div>
                <div class="form-group">
                    <label for="body_h1">Ciało - tytuł</label>
                    <input required type="text" class="form-control" name="body_h1" id="body_h1">

                </div>
                <div class="form-group">
                    <label for="body_description">Ciało - opis</label>
                    <textarea required class="form-control" name="body_description" id="body_description"></textarea>

                </div>
                <div class="form-group">
                    <label for="custom_url">Url</label>
                    <input required type="text" class="form-control" name="custom_url" id="custom_url">

                </div>
                <input type="submit" class="btn btn-primary" value="Zapisz">

            </form>
        </div>
    </div>
</div>
</body>
</html>