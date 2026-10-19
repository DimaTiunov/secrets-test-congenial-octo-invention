<?php

class trainpayPaymentModel extends waModel
{
    protected $table = 'trainpay_payment';

    /**
     * Оплаты клиента с поиском по названию тренинга и сортировкой.
     *
     * @param int $contact_id
     * @param string $search
     * @param string $sort поле сортировки
     * @return array
     */
    public function getByContact($contact_id, $search = '', $sort = 'id')
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE contact_id = ".(int) $contact_id;

        if ($search) {
            $sql .= " AND title LIKE '%".$search."%'";
        }

        $sql .= " ORDER BY ".$sort." DESC";

        return $this->query($sql)->fetchAll();
    }

    /**
     * Оплата по внешнему идентификатору платёжной системы.
     *
     * @param string $external_id
     * @return array|null
     */
    public function getByExternalId($external_id)
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE external_id = '".$external_id."'";

        return $this->query($sql)->fetchAssoc();
    }
}
