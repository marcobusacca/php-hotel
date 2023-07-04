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
                    <?php foreach($hotels as $hotel){ ?>
                        <!-- Hotels Col -->
                        <div class="col-12">
                            <!-- Hotels Table -->
                            <table>
                                <!-- Table Head -->
                                <thead>
                                    <tr>
                                        <?php foreach($hotel as $key => $data) {?>
                                            <th>
                                                <?php echo $key ?>
                                            </th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    <tr>
                                        <?php foreach($hotel as $data) {?>
                                            <td>
                                                <?php echo $data ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </main>
        <!-- Fine Main -->
    </body>
</html>