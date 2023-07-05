<!-- SCRIPT PHP -->
<?php
    // IMPORTO "ARRAY.PHP"
    require __DIR__."/partials/vars.php";

    // CONTROLLO CHE I VALORI DI GET NON SIANO Null
    if (isset($_GET['parking']) && isset($_GET['vote'])){

        // RECUPERO IL FILTRAGGIO DEL PARCHEGGIO SCELTO DALL'UTENTE
        $filter = $_GET['parking'];

        // RECUPERO IL FILTRAGGIO PER VOTO SCELTO DALL'UTENTE
        $vote = $_GET['vote'];
        
        // CREO UN ARRAY DOVE INSERIRE I FILTRAGGI
        $filteredArray = [];

        // L'UTENTE HA UTILIZZATO SOLO IL FILTRAGGIO DEL PARCHEGGIO
        if ($filter === "1" && $vote === '' || $vote === 0){

            // CREO UN CICLO FOR_EACH CHE INSERISCE DENTRO FILTERED_ARRAY SOLTANTO GLI HOTEL CON IL PARCHEGGIO DISPONIBILE
            foreach($hotels as $hotel){

                // CONTROLLO SE L'HOTEL HA PARKING UGUALE A TRUE
                if($hotel['parking']){

                    // INSERISCO DENTRO L'ARRAY FILTRATO, L'ARRAY ASSOCIATIVO DELL'HOTEL
                    $filteredArray[] = $hotel;
                }
            }
            
            // SOVRASCRIVO L'ARRAY HOTELS CON IL CONTENUTO DEL FILTERED_ARRAY
            $hotels = $filteredArray;

        } else if($filter !== "1" && $vote !== '' && $vote !== 0){ // L'UTENTE HA UTILIZZATO SOLO IL FILTRAGGIO DEL VOTO

            // CREO UN CICLO FOR_EACH CHE INSERISCE DENTRO FILTERED_ARRAY SOLTANTO GLI HOTEL CHE HANNO UN VOTO MAGGIORE/UGUALE A QUELLO SCELTO DALL'UTENTE
            foreach($hotels as $hotel){

                // CONTROLLO SE L'HOTEL HA UN VOTO MAGGIORE/UGUALE A QUELLO SCELTO DALL'UTENTE
                if($hotel['vote'] >= $vote){

                    // INSERISCO DENTRO L'ARRAY FILTRATO, L'ARRAY ASSOCIATIVO DELL'HOTEL
                    $filteredArray[] = $hotel;
                }
            }
            
            // SOVRASCRIVO L'ARRAY HOTELS CON IL CONTENUTO DEL FILTERED_ARRAY
            $hotels = $filteredArray;

        } else if($filter === "1" && $vote !== '' && $vote !== 0){ // L'UTENTE HA UTILIZZATO ENTRAMBI I FILTRAGGI

            // CREO UN CICLO FOR_EACH CHE INSERISCE DENTRO FILTERED_ARRAY SOLTANTO GLI HOTEL CHE SODDISFANO ENTRAMBI I FILTRAGGI
            foreach($hotels as $hotel){

                // CONTROLLO SE L'HOTEL HA PARKING UGUALE A TRUE ED HA UN VOTO MAGGIORE/UGUALE A QUELLO SCELTO DALL'UTENTE
                if($hotel['parking'] && $hotel['vote'] >= $vote){

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
                            <!-- Select Parking Filter -->
                            <select name="parking" class="form-select">
                                <option value="0">Tutti gli hotel</option>
                                <option value="1">Hotel con parcheggio disponibile</option>
                            </select>
                            <!-- Input Vote Filter -->
                            <input name="vote" type="number" placeholder="Filtra gli hotel per voto minimo" class="form-control my-5">
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Ricerca</button>
                        </form>
                    </div>
                    <?php if(count($hotels) !== 0) { ?>
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
                    <?php } else { ?>
                        <h1 class="text-center my-5">Nessun hotel trovato</h1>
                    <?php } ?>
                </div>
            </div>
        </main>
        <!-- Fine Main -->
    </body>
</html>