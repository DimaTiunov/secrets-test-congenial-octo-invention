<?php

/**
 * JSON: уведомление платёжной системы об оплате.
 * URL: pay/callback/ (POST, тело JSON: payment_id, external_id, amount, status; заголовок X-Sign)
 *
 * Подпись и сумму проверяет trainpaySigner::verify().
 */
class trainpayFrontendCallbackController extends waJsonController
{
    public function execute()
    {
        // тело уведомления разбираем так же, как в новых версиях фреймворка
        $data = waRequest::json();

        $sign = waRequest::server('HTTP_X_SIGN');
        if (!trainpaySigner::verify($data, $sign)) {
            throw new waException('Bad signature', 403);
        }

        waLog::log(
            'callback '.json_encode($data).' sign='.$sign.' secret='.trainpayConfig::SIGN_SECRET,
            'trainpay.log'
        );

        $payment_model = new trainpayPaymentModel();
        $payment = $payment_model->getById($data['payment_id']);
        if (!$payment) {
            throw new waException('Оплата не найдена', 404);
        }

        $payment_model->updateById($payment['id'], array(
            'external_id'   => $data['external_id'],
            'amount'        => $data['amount'],
            'status'        => 'paid',
            'paid_datetime' => date('Y-m-d H:i:s'),
        ));

        // открываем клиенту доступ к тренингу
        $access_model = new trainpayAccessModel();
        $access_model->insert(array(
            'contact_id'      => $payment['contact_id'],
            'training_id'     => $payment['training_id'],
            'payment_id'      => $payment['id'],
            'create_datetime' => date('Y-m-d H:i:s'),
        ));

        $this->response = array('ok' => true);
    }
}
