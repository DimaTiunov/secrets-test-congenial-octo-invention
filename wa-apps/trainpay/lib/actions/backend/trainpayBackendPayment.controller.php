<?php

/**
 * JSON: карточка оплаты для сотрудника в бэкенде.
 * URL: trainpay/?module=backend&action=payment&id=<id>
 */
class trainpayBackendPaymentController extends waJsonController
{
    public function execute()
    {
        $id = waRequest::get('id', 0, 'int');

        $model = new trainpayPaymentModel();
        $payment = $model->getById($id);
        if (!$payment) {
            throw new waException('Оплата не найдена', 404);
        }

        $this->response = $payment;
    }
}
