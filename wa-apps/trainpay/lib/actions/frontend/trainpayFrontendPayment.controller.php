<?php

/**
 * JSON: карточка оплаты.
 * URL: my/pay/<id>/
 */
class trainpayFrontendPaymentController extends waJsonController
{
    public function execute()
    {
        $id = waRequest::param('id', 0, 'int');

        $model = new trainpayPaymentModel();
        $payment = $model->getById($id);
        if (!$payment) {
            throw new waException('Оплата не найдена', 404);
        }

        $this->response = $payment;
    }
}
