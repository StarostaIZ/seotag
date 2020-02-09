<!doctype html>
<?php
require_once '../loader.php';
?>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Start</title>
</head>
<body>
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
        <form method="post" action="../post-seo-tags.php" id="form">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">
                        Lp.
                    </th>
                    <th scope="col">
                        Parametry
                    </th>
                    <th scope="col">
                        Nagłówek - tytuł
                    </th>
                    <th scope="col">
                        Nagłówek - opis
                    </th>
                    <th scope="col">
                        Kanoniczne?
                    </th>
                    <th scope="col">
                        Ciało - tytuł
                    </th>
                    <th scope="col">
                        Ciało - opis
                    </th>
                    <th scope="col">
                        Url
                    </th>

                </tr>
                </thead>
                <tbody>
				<?php
				if (isset($_SESSION['post'])): ?>
                    <script>
                        alert("Dane zapisane pomyślnie")
                    </script>
					<?php
					unset($_SESSION['post']);
				endif; ?>
				<?php

				$db = DatabaseConnSingleton::getInstance();
				foreach ($db->getAllSeoTags() as $key => $seoTag):?>
                    <tr>
                        <th scope="row">
							<?= $key + 1 ?>
                        </th>
                        <td>
                            <div class="form-group">
                                <label>
                                    <input class="form-control" required name="parameters_<?= $seoTag->id ?>"
                                           type="text"
                                           value="<?= $seoTag->parameters ?>">
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>
                                    <input class="form-control" required name="head_title_<?= $seoTag->id ?>"
                                           type="text"
                                           value="<?= $seoTag->getHeadTitle() ?>">
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>
                                    <input class="form-control" required name="head_description_<?= $seoTag->id ?>"
                                           type="text"
                                           value="<?= $seoTag->getHeadDescription() ?>">
                                </label>
                            </div>
                        </td>
                        <td>
                            <label>
                                <input name="set_canonical_<?= $seoTag->id ?>" type="checkbox"
                                       style="margin-left: 0" value="1" <?php if ($seoTag->set_canonical) echo "checked" ?>>
                            </label>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>
                                    <input class="form-control" required name="body_h1_<?= $seoTag->id ?>" type="text"
                                           value="<?= $seoTag->body_h1 ?>">
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>
                                <textarea class="form-control" required name="body_description_<?= $seoTag->id ?>"
                                          form="form"><?= $seoTag->body_description ?></textarea>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>
                                    <input class="form-control" required name="custom_url_<?= $seoTag->id ?>"
                                           type="text"
                                           value="<?= $seoTag->custom_url ?>">
                                </label>
                            </div>
                        </td>


                    </tr>
				<?php endforeach; ?>

                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" value="Zapisz">
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>