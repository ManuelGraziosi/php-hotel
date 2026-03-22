<?php

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
          crossorigin="anonymous">

    <title>php-hotel</title>
</head>

<body>
    <h1>Esercizio php-hotel</h1>

    <div class="container">
        <!-- Filter section -->
        <section>
            <h3 class="flex">Personalizza la ricerca</h3>
            <form action="">
                <div>
                    <label for="parking">Hotel con parcheggio</label>
                    <input name="parking"
                           value="true"
                           type="checkbox"
                           id="parking">
                </div>
                <div>
                    <label for="vote"> Voto:</label>
                    <input type="number"
                           name="vote"
                           id="vote"
                           min="1"
                           max="5">
                </div>
                <button type="submit">Applica filtri</button>
            </form>
            <hr>
        </section>

        <!-- Table section -->
        <section>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">parking</th>
                        <th scope="col">vote</th>
                        <th scope="col">distance_to_center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filtered_hotels = $hotels;

                    $is_parking_requested = isset($_GET['parking']) && $_GET['parking'] === 'true' ? true : false;
                    // echo "isParking: $is_parking_requested <br>";
                    if ($is_parking_requested) {
                        //echo "controllo !empty(isparking): " . !empty($is_parking_requested) . "[true]<br>";
                        $filtered_hotels = array_filter($filtered_hotels, function ($elem) use ($is_parking_requested) {
                            return $elem["parking"] === $is_parking_requested;
                        });
                        //echo "var_dump(filterdHotels)[true]";
                        //var_dump($filtered_hotels);
                    }

                    $min_vote = isset($_GET['vote']) ? (int) $_GET['vote'] : 0;
                    //echo "vote: $min_vote <br>";
                    if ($min_vote > 0) {

                        $filtered_hotels = array_filter($filtered_hotels, function ($elem) use ($min_vote) {
                            return $elem["vote"] >= $min_vote;
                        });
                        //echo "var_dump(filterdHotels)[true]";
                        //var_dump($filtered_hotels);
                    }

                    foreach ($filtered_hotels as $curHotel) {
                        echo "<tr>";
                        foreach ($curHotel as $key => $value) {
                            if ($key === "parking") {
                                $value = $value ? "Si" : "No";
                            }

                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>