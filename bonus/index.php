<!-- SCRIPT PHP -->
<?php
    // IMPORTO "ARRAY.PHP"
    require __DIR__."/partials/array.php";
?>

<!-- TEMPLATE HTML -->
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CDN CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- Head Title -->
        <title>php-hotel-bonus</title>
    </head>
    <body>
        <!-- Main -->
        <main>
            <!-- Main Container -->
            <div class="container">
                <!-- Main Row -->
                <div class="row">
                    <!-- Hotels Col -->
                    <div class="col-12 my-5">
                        <!-- Hotels Table -->
                        <table class="table table-light table-bordered table-hover">
                            <!-- Table Head -->
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrizione</th>
                                    <th>Parcheggio</th>
                                    <th>Voto</th>
                                    <th>Distanza dal centro</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                <?php foreach($hotels as $hotel) {?>
                                    <tr>
                                        <td>
                                            <?php echo $hotel['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $hotel['description'] ?>
                                        </td>
                                        <td>
                                            <?php echo ($hotel['parking']) ? 'Disponibile' : 'Non disponibile' ?>
                                        </td>
                                        <td>
                                            <?php echo $hotel['vote'] ?>
                                        </td>
                                        <td>
                                            <?php echo $hotel['distance_to_center']." km " ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- Fine Main -->
    </body>
</html>