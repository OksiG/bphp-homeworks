<?php
/**
 * Функция для рассчета суммы счета
 * @param $menu Количество позиций в меню
 * @param $b
 * @return string
 * @throws Exception
 */

function poschitatSchet($menu, $b)
{
    $numberBill = random_int(1000, 9999);
    $purch = "<div class=\"order322-line order322-title\">Счёт №$numberBill</div>";
    $amount = 0;

    foreach ($menu as $item) {
        $quantity = $b[$item->id];

        if ($quantity > 0) {
            $sumItem = $quantity * $item->price;
            $sum2 = number_format($item->price * $quantity,2);
            $costItem =  number_format($item->price,2);
            $purch .= "<div class=\"order322-line\"><div>$item->name</div><div>$quantity * $costItem ₽ = $sum2 ₽</div></div>";
            $amount += $sumItem;
        }
    }

    $se = (int)$b['service'];

    if ($amount > 0) {
        if ($se === 2) {
            $se1 = number_format($amount * 0.10,2);
            $purch .= "<div class=\"order322-line\"><div>Скидка 10% (самовывоз)</div><div>- $se1 ₽</div></div>";
            $amount = $amount - (float)$se1;
        } elseif ($se === 4) {
            $se1 = number_format($amount * 0.10,2);
            $purch .= "<div class=\"order322-line\"><div>Чаевые 10%</div><div>$se1 ₽</div></div>";
            $amount = $amount + (float)$se1;
        } elseif ($se === 1) {
            $se1 = number_format($amount * 0.10,2);
            $purch .= "<div class=\"order322-line\"><div>Доставка</div><div>200.00 ₽</div></div>";
            $amount = $amount + 200;
        }
    } else {
        $purch .= "<div class=\"order322-line\">Ничего не заказано</div>";
    }

    $amount = number_format($amount,2);
    $purch .= "<div class=\"order322-total\"><div>Итого: $amount ₽</div></div>";

    return $purch;
}
