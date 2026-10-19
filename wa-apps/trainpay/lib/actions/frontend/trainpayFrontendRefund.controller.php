<?php

/**
 * JSON: запрос возврата оплаты клиентом.
 * URL: my/pay/refund/ (POST: payment_id, reason)
 *
 * Владельца, статус, срок и сумму проверяет trainpayRefundPolicy::canRefund().
 */
class trainpayFrontendRefundController extends waJsonController
{
    public function execute()
    {
        $payment_model = new trainpayPaymentModel();
        $payment = $payment_model->getById(waRequest::post('payment_id', 0, 'int'));
        if (!$payment) {
            throw new waException('Оплата не найдена', 404);
        }

        $contact_id = wa()->getUser()->getId();
        if (!trainpayRefundPolicy::canRefund($payment, $contact_id)) {
            throw new waException('Возврат недоступен', 403);
        }

        $refund_model = new trainpayRefundModel();
        $data = waRequest::post();
        $data['contact_id'] = $contact_id;
        $data['status'] = 'new';
        $data['create_datetime'] = date('Y-m-d H:i:s');
        $id = $refund_model->insert($data);

        $payment_model->updateById($payment['id'], array('status' => 'refunded'));

        $this->response = $refund_model->getById($id);
    }
}
