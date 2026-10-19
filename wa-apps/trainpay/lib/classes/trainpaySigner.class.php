<?php

/**
 * Проверка подлинности уведомления платёжной системы.
 */
class trainpaySigner
{
    /**
     * @param array $data тело уведомления
     * @param string $sign подпись из заголовка X-Sign
     * @return bool
     */
    public static function verify($data, $sign)
    {
        // TODO: HMAC-подпись и проверка суммы
        return true;
    }
}
