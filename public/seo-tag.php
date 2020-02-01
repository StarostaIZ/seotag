<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Start</title>
</head>
<body>

<div class="container">
    <form method="post" action="#" id="form">
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
        </tr>
        </thead>
        <tbody>
            <?php

            include_once '../DatabaseConnSingleton.php';
            $db = DatabaseConnSingleton::getInstance();
            foreach ($db->getAllSeoTags() as $key => $seoTag):?>
                <tr>
                    <th scope="row">
                        <?= $key+1 ?>
                    </th>
                    <td>
                        <label>
                            <input name="parameters_<?=$seoTag->id ?>" type="text" value="<?= $seoTag->parameters?>">
                        </label>
                    </td>
                    <td>
                        <label>
                            <input name="head_title_<?=$seoTag->id ?>" type="text" value="<?= $seoTag->getHeadTitle()?>">
                        </label>
                    </td>
                    <td>
                        <label>
                            <input name="head_description_<?=$seoTag->id ?>" type="text" value="<?= $seoTag->getHeadDescription()?>">
                        </label>
                    </td>
                    <td>
                        <label>
                            <input name="canonical_<?=$seoTag->id ?>" type="checkbox" value="<?= $seoTag->set_canonical?>">
                        </label>
                    </td>
                    <td>
                        <label>
                            <input name="body_h1_<?=$seoTag->id ?>" type="text" value="<?= $seoTag->body_h1?>">
                        </label>
                    </td>
                    <td>
                        <label>
                            <textarea name="body_description_<?=$seoTag->id ?>" form="form"><?= $seoTag->parameters?></textarea>
                        </label>
                    </td>


                </tr>
            <?php endforeach;?>

        </tbody>
    </table>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>