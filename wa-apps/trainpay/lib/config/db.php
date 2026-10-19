<?php

return array(
    'trainpay_payment' => array(
        'id'              => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'contact_id'      => array('int', 11, 'null' => 0),
        'contact_email'   => array('varchar', 255, 'null' => 0, 'default' => ''),
        'training_id'     => array('int', 11, 'null' => 0),
        'title'           => array('varchar', 255, 'null' => 0, 'default' => ''),
        'external_id'     => array('varchar', 64, 'null' => 0, 'default' => ''),
        'amount'          => array('decimal', "15,2", 'null' => 0, 'default' => '0.00'),
        'status'          => array('varchar', 16, 'null' => 0, 'default' => 'new'),
        'paid_datetime'   => array('datetime'),
        'create_datetime' => array('datetime', 'null' => 0),
        ':keys'           => array(
            'PRIMARY'     => 'id',
            'contact_id'  => 'contact_id',
            'external_id' => 'external_id',
        ),
    ),
    'trainpay_refund' => array(
        'id'              => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'payment_id'      => array('int', 11, 'null' => 0),
        'contact_id'      => array('int', 11, 'null' => 0),
        'amount'          => array('decimal', "15,2", 'null' => 0, 'default' => '0.00'),
        'reason'          => array('varchar', 255, 'null' => 0, 'default' => ''),
        'status'          => array('varchar', 16, 'null' => 0, 'default' => 'new'),
        'create_datetime' => array('datetime', 'null' => 0),
        ':keys'           => array(
            'PRIMARY'    => 'id',
            'payment_id' => 'payment_id',
        ),
    ),
    'trainpay_access' => array(
        'id'              => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'contact_id'      => array('int', 11, 'null' => 0),
        'training_id'     => array('int', 11, 'null' => 0),
        'payment_id'      => array('int', 11, 'null' => 0),
        'create_datetime' => array('datetime', 'null' => 0),
        ':keys'           => array(
            'PRIMARY'    => 'id',
            'contact_id' => 'contact_id',
        ),
    ),
);
