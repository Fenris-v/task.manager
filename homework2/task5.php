<?php
error_reporting(E_ALL);

$length = 1000;
$city1 = rand(0, 1000);
$city1Radius = rand(10, 20);
$city2 = rand(0, 1000);
$city2Radius = rand(100, 200);

$cars = [];
for ($i = 0; $i < 10; $i++) {
    $cars[$i] = [
        'position' => rand(0, 1000)
    ];
}

foreach ($cars as $key => $car) {
    $whereCar = $car['position'];

    if (
        $whereCar < ($city1 + $city1Radius) &&
        $whereCar > ($city1 - $city1Radius) ||
        $whereCar < ($city2 + $city2Radius) &&
        $whereCar > ($city2 - $city2Radius)
    ) {
        echo "Машина " . ($key + 1) . " едет по городу на $whereCar км со скоростью не более 70 <br />";
    } else {
        echo "Машина " . ($key + 1) . " едет по шоссе на $whereCar со скоростью не более 90 <br />";
    }
}
