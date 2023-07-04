<!-- SCRIPT PHP -->
<?php
    // IMPORTO "ARRAY.PHP"
    require __DIR__."/partials/array.php";

    // CONTROLLO CHE I VALORI DI GET NON SIANO Null
    if (isset($_GET['parking'])){

        // RECUPERO IL FILTRAGGIO SCELTO DALL'UTENTE
        $filter = $_GET['parking'];
        
        // CONTROLLO SE L'UTENTE HA SCELTO DI MOSTRARE A SCHERMO SOLO GLI HOTEL CON IL PARCHEGGIO DISPONIBILE
        if ($filter === "1"){

            // CREO UN ARRAY DOVE INSERIRE I FILTRAGGI
            $filteredArray = [];

            // CREO UN CICLO FOR_EACH CHE INSERISCE DENTRO FILTERED_ARRAY SOLTANTO GLI HOTEL CON IL PARCHEGGIO DISPONIBILE
            foreach($hotels as $hotel){

                // CONTROLLO SE L'HOTEL HA IL VALORE PARKING UGUALE A TRUE
                if($hotel['parking']){

                    // INSERISCO DENTRO L'ARRAY FILTRATO, L'ARRAY ASSOCIATIVO DELL'HOTEL
                    $filteredArray[] = $hotel;
                }
            }
            
            // SOVRASCRIVO L'ARRAY HOTELS CON IL CONTENUTO DEL FILTERED_ARRAY
            $hotels = $filteredArray;
        }

    }
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
                    <!-- Form Col -->
                    <div class="col-12 mt-5">
                        <!-- Form -->
                        <form action="index.php" method="GET" class="text-center">
                            <!-- Select Parking -->
                            <select name="parking" class="form-select mb-5">
                                <option value="0">Tutti gli hotel</option>
                                <option value="1">Hotel con parcheggio disponibile</option>
                            </select>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Ricerca</button>
                        </form>
                    </div>
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