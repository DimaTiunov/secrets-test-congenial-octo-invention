<?php

/**
 * JSON: список оплат клиента с поиском и сортировкой.
 * URL: my/pay/list/?q=&sort=
 */
class trainpayFrontendListController extends waJsonController
{
    public function execute()
    {
        $model = new trainpayPaymentModel();
        $payments = $model->getByContact(
            wa()->getUser()->getId(),
            waRequest::get('q'),
            waRequest::get('sort', 'id')
        );

        $refund_model = new trainpayRefundModel();
        foreach ($payments as &$p) {
            $p['refunds'] = count($refund_model->getByField('payment_id', $p['id'], true));
            $p['amount'] = round($p['amount'], 2);
        }
        unset($p);

        $this->response = $payments;
    }
}
