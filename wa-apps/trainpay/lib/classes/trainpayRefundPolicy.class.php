<?php

/**
 * Проверка: можно ли клиенту вернуть оплату.
 */
class trainpayRefundPolicy
{
    /**
     * @param array $payment
     * @param int $contact_id
     * @return bool
     */
    public static function canRefund($payment, $contact_id)
    {
        // TODO: владелец, статус, срок 14 дней, сумма
        return true;
    }
}
