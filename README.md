# Trainpay: оплаты тренингов и возвраты для Webasyst

Учебное приложение для собеседования: платёжка присылает уведомление об оплате, клиент в личном кабинете смотрит оплаты и просит возврат, сотрудник выгружает возвраты в CSV.

## Структура

```
wa-apps/trainpay/
├── lib/
│   ├── config/        app.php, db.php, routing.php, права, конфиг приложения
│   ├── models/        trainpayPaymentModel, trainpayRefundModel, trainpayAccessModel
│   ├── classes/       trainpaySigner, trainpayRefundPolicy
│   └── actions/
│       ├── frontend/  личный кабинет: список, карточка, возврат; приём уведомления платёжки
│       └── backend/   карточка оплаты и выгрузка возвратов для сотрудника
├── templates/         Smarty-шаблон «Мои оплаты»
└── js/trainpay.js     поиск, сортировка и возврат (jQuery)
```

## Маршруты

| URL | Обработчик |
|---|---|
| `my/pay/` | `trainpayFrontendMyPaymentsAction`, страница «Мои оплаты» |
| `my/pay/list/?q=&sort=` | `trainpayFrontendListController`, JSON-список оплат |
| `my/pay/<id>/` | `trainpayFrontendPaymentController`, JSON-карточка оплаты |
| `my/pay/refund/` | `trainpayFrontendRefundController`, запрос возврата (POST: `payment_id`, `reason`) |
| `pay/callback/` | `trainpayFrontendCallbackController`, уведомление платёжки (POST JSON, заголовок `X-Sign`) |

Бэкенд: `trainpay/?module=backend&action=payment&id=<id>`, `trainpay/?module=backend&action=export&q=`.

## Формат уведомления платёжки

```
POST pay/callback/
X-Sign: <hex HMAC-SHA256 от тела запроса>
{"payment_id": 1, "external_id": "ext-1001", "amount": "4990.00", "status": "paid"}
```

## Фреймворк

Исходники Webasyst: https://github.com/webasyst/webasyst-framework

## Задание

См. [TASK.md](TASK.md).
