<?php

class trainpayRightConfig extends waRightConfig
{
    public function init()
    {
        // Сотрудник может просматривать оплаты и выгрузку возвратов в бэкенде
        $this->addItem('view_payments', 'Просмотр оплат', 'checkbox');
    }
}
