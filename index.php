<!-- SCRIPT PHP -->
<?php
    // ARRAY HOTELS
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];
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
        <title>php-hotel</title>
    </head>
    <body>
        <!-- Main -->
        <main>
            <!-- Main Container -->
            <div class="container">
                <!-- Main Row -->
                <div class="row">
                    <!-- Hotels Col -->
                    <div class="col-12">
                        <!-- Hotels Table -->
                        <table class="table">
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
                                            <?php echo $hotel['parking'] ?>
                                        </td>
                                        <td>
                                            <?php echo $hotel['vote'] ?>
                                        </td>
                                        <td>
                                            <?php echo $hotel['distance_to_center'] ?>
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