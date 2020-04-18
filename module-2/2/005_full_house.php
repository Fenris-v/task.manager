<pre>
<?php
    // А теперь все вместе, массивы, операторы, циклы, условные конструкции. Почувствуйте себя программистом

    // 1. Забастовка курьеров.
    // Шел конец мая, на улице светило солнышко, никому не хотелось работать, а вот водички попить, никто не отказывается.
    // Сегодня 13 число - понедельник. Мы работаем в курьерской службе доставки питьевой воды, и нам в доставку 100 заказов, на последующие 10 дней (с 14 по 24).
    // Стоимость каждого заказа это случайное число от 100 до 5000 руб.
    // И все бы ничего, мы предвкушаем прибыли, но... Всегда есть какое-то но. Наши курьеры устроили забастовку, говорят: "НЕ будем работать в выходные".
    // Делать нечего, будем считать убытки.
    // Создайте, пожалуйста, нам массив с данными по заказам orders, он нам очень нужен для отчетности.
    // Для каждого заказа нам нужно знать сумму и дату его доставки. Какие товары в заказах, нам пока знать не надо, но потом может понадобится.
    $orders = [];

    // Посчитайте нам, пожалуйста, сколько мы могли бы заработать
    $profit = 0;
    // а еще, посчитайте, сколько мы не доставим заказов из-за этих лодырей
    $lossOrdersInWeekends = 0;
    // а еще, посчитайте, сколько мы потеряем денег
    $lossInWeekends = 0;
    // и покажите нам отчет, в виде строки "Заказов {} на сумму: {}. Из них профукано {} заказов на сумму: {}"


    // 2. Отчет для HR-ов
    // Вы хорошо потрудились, а вот мы не очень. Курьеры у нас не только отказываются работать по выходным, так еще и не могут доставить более 1 заказа в день.
    // А у нас работает всего только 3 курьера.
    $couriersCount = 3;
    // Выведите нам для начальства и HR строку: "Для того, чтобы доставить все заказы, минимальное количество курьеров: {}"
    // Только учтите, что мы все еще не можем ничего доставлять в выходные
    $minCouriers = 0;


    // 3. Отчет для начальства
    // Спасибо вам большое, но досталось нам от начальства крепко. Курьеров, то мы еще наймем, но где ж их в мае сыщешь, так что это будет уже поздно.
    // Начальство требует отчет, сколько мы профукаем еще, с учетом, что не можем добавить все, а клиенты у нас очень сердитые, и не хотят доставку в другой день.
    // Выведите нам для начальства и строку: "Заказов профукано из-за недостатка курьеров: {}"
    $lossOrdersBecauseFewCouriers = 0;


    // 4. Спасаемся как можем
    // Делать нечего, а еще начальство сказало: "если все заказы доставить не можем в какой-то день, то везите самые дорогие"
    // Мы знаем, что вы еще не проходили функции для сортировки, но тут без них не обойтись

    $lossBecauseFewCouriers = 0;
    // Выведите нам для начальства и строку: "Заказов профукано из-за недостатка курьеров {} на сумму: {}"


    // 5. Итоговый отчет
    // Меня, конечно, уволят, но вы, выведите пожалуйста итоговый отчет:
    // "Заказов {} на сумму: {}. Из них профукано в выходные {} заказов на сумму: {}. А также профукано из-за недостатка курьеров {} на сумму: {}"
    // "Итого заказов доставлено {} из {}, денег заработано {} из {}"

    for ($i = 0; $i < 100; $i++) {
        $orders['Заказ ' . ($i + 1)] =
            [
                'day' => rand(14, 24),
                'price' => rand(100, 5000)
            ];
    }

    foreach ($orders as $order) {
        $profit += $order['price'];
        if ($order['day'] == 18 || $order['day'] == 19) {
            $lossOrdersInWeekends++;
            $lossInWeekends += $order['price'];
        }
    }

    echo "Заказов " . count($orders) . " на сумму: $profit. Из них профукано $lossOrdersInWeekends заказов на сумму: $lossInWeekends <br />";

    $ordersInDay = [];
    foreach ($orders as $order) {
        $ordersInDay[$order['day']][] = $order['price'];
    }

    foreach ($ordersInDay as $day => $prices) {
        if ($day == 18 || $day == 19) {
            continue;
        }

        if (count($prices) > $minCouriers) {
            $minCouriers = count($prices);
        }
    }
    echo "Для того, чтобы доставить все заказы, минимальное количество курьеров: $minCouriers <br />";

    foreach ($ordersInDay as $day => $prices) {
        if ($day == 18 || $day == 19) {
            continue;
        }

        if ($couriersCount < count($prices)) {
            $lossOrdersBecauseFewCouriers += count($prices) - $couriersCount;
        }
    }
    echo "Заказов профукано из-за недостатка курьеров: $lossOrdersBecauseFewCouriers <br />";

    foreach ($ordersInDay as $day => $prices) {
        if ($day == 18 && $day == 19) {
            continue;
        }

        rsort($prices);
        for ($i = 3; $i < count($prices); $i++) {
            $lossBecauseFewCouriers += $prices[$i];
        }
    }
    echo "Заказов профукано из-за недостатка курьеров $lossOrdersBecauseFewCouriers на сумму: $lossBecauseFewCouriers <br />";

    $resultCount = count($orders) - $lossOrdersBecauseFewCouriers - $lossOrdersInWeekends;
    $resultProfit = $profit - $lossBecauseFewCouriers - $lossInWeekends;

    echo "Заказов " . count($orders) . " на сумму: $profit. Из них профукано в выходные $lossOrdersInWeekends на сумму: $lossInWeekends. Из них профукано в из-за недостатка курьеров $lossOrdersBecauseFewCouriers на сумму: $lossBecauseFewCouriers <br />";
    echo "Итого заказов доставлено $resultCount из " . count($orders) . ", денег заработано $resultProfit из $profit";
?>
</pre>
