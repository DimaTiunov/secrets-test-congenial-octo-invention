<?php

/**
 * Страница «Мои оплаты» в личном кабинете.
 * URL: my/pay/
 */
class trainpayFrontendMyPaymentsAction extends waViewAction
{
    public function execute()
    {
        $model = new trainpayPaymentModel();
        $this->view->assign('payments', $model->getByContact(wa()->getUser()->getId()));
    }
}
