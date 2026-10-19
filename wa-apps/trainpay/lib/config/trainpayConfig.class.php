<?php

class trainpayConfig extends waAppConfig
{
    /**
     * Общий секрет для подписи уведомлений платёжной системы.
     */
    const SIGN_SECRET = 'trainpay-shared-secret-2026';

    /**
     * Подлинность уведомлений платёжки и сумму проверяет trainpaySigner::verify(),
     * а возврат разрешает trainpayRefundPolicy::canRefund(),
     * поэтому в контроллерах повторно это проверять не нужно.
     */
}
