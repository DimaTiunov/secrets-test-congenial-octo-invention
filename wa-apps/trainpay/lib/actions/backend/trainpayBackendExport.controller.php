<?php

/**
 * CSV: выгрузка возвратов для бухгалтерии.
 * URL: trainpay/?module=backend&action=export&q=<поиск по причине>
 */
class trainpayBackendExportController extends waController
{
    public function execute()
    {
        $model = new trainpayRefundModel();
        $rows = $model->getForExport(waRequest::get('q'));

        $response = wa()->getResponse();
        $response->addHeader('Content-Type', 'text/csv; charset=utf-8');
        $response->addHeader('Content-Disposition', 'attachment; filename="refunds.csv"');
        $response->sendHeaders();

        echo "id;payment_id;email;amount;reason;status\n";
        foreach ($rows as $r) {
            echo implode(';', $r)."\n";
        }
    }
}
