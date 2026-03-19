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
        <h3>Personalizza la ricerca</h3>
        <form action="./index.php">
            <label for="">Hotel con parcheggio</label>
            <input name="parking"
                   value="true"
                   type="checkbox">
            <button type="submit">Applica filtri</button>
        </form>
        <hr>
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
                $isParking = isset($_GET['parking']) ? (bool) $_GET['parking'] : false;


                // echo "isParking: $isParking <br>";
                
                if ($isParking) {
                    //echo "controllo !empty(isparking): " . !empty($isParking) . "[true]<br>";
                    $filterdHotels = array_filter($hotels, function ($elem) use ($isParking) {
                        return $elem["parking"] === $isParking;
                    });
                    //echo "var_dump(filterdHotels)[true]";
                    //var_dump($filterdHotels);
                } else {
                    //echo "controllo !empty(isparking): " . !empty($isParking) . "[false]<br>";
                    $filterdHotels = $hotels;
                    //echo "var_dump(filterdHotels)[false]";
                    //var_dump($filterdHotels);
                }

                foreach ($filterdHotels as $curHotel) {
                    echo "<tr>";
                    foreach ($curHotel as $key => $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>