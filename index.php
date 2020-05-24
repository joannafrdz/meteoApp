<?php
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=Mahebourg&lang=fr&units=metric&appid=51992ac6a87ea8f1fcff2523b1202857';

    $row = file_get_contents($url);

    $json = json_decode($row);

    // var_dump($json);

    $name = $json->name;

    $weather = $json->weather[0]->main;
    $desc = $json->weather[0]->description;

    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;

    $speed = $json->wind->speed;
    $deg = $json->wind->deg;
?>

<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Météo</title>
</head>
<body>
<div class="container">
    <h1>Météo du jour à <strong><?php echo $name; ?></strong></h1>
        <?php
            switch($weather)
            {
            case "Clear":
            ?>
            <div class="icon sunny">
                <div class="sun">
                    <div class="rays"></div>
                </div>
            </div>
            <?php
            break;

            case 'Drizzle':
            ?>
            <div class="icon sun-shower">
                <div class="cloud">
                    <div class="sun">
                        <div class="rays"></div>
                </div>
                    <div class="rain"></div>
            </div>
            <?php
            break;

            case "Rain":
            ?>
            <div class="icon rainy">
                <div class="cloud"></div>
                <div class="rain"></div>
            </div>
            <?php
            break;

            case "Clouds":
            ?>
            <div class="icon cloudy">
                <div class="cloud"></div>
                <div class="cloud"></div>
            </div>
            <?php
            break;

            case "Thunderstorm":
            ?>
            <div class="icon thunder-storme">
                <div class="cloud"></div>
                    <div class="lighting">
                        <div class="bolt"></div>
                        <div class="bolt"></div>
                </div>
            </div>
            <?php
            break;

            case "Snow":
            ?>
            <div class="icon flurries">
                <div class="cloud"></div>
                    <div class="snow">
                        <div class="flake"></div>
                        <div class="flake"></div>
                </div>
            </div>
            <?php
            break;
            }
        ?>
</div>

<div class="meteo_desc text-left">
    <h2>
        <?php echo $temp; ?> °C - Ressenti <?php echo $feel_like; ?> °C <br />
        <?php echo $speed; ?> Km/h - <?php echo $deg; ?> <br />
        <?php echo $desc; ?>
    </h2>
<div>


</body>
</html>