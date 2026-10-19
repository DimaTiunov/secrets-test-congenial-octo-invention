<?php

class trainpayRefundModel extends waModel
{
    protected $table = 'trainpay_refund';

    /**
     * Возвраты для выгрузки сотрудником: с почтой клиента и поиском по причине.
     *
     * @param string $search
     * @return array
     */
    public function getForExport($search = '')
    {
        $sql = "SELECT r.id, r.payment_id, p.contact_email, r.amount, r.reason, r.status
                FROM {$this->table} r
                JOIN trainpay_payment p ON p.id = r.payment_id";

        if ($search) {
            $sql .= " WHERE r.reason LIKE '%".$search."%'";
        }

        $sql .= " ORDER BY r.id DESC";

        return $this->query($sql)->fetchAll();
    }
}
