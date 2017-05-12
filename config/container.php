<?php
/**
 * Created by PhpStorm.
 * User: nlangloi10
 * Date: 5/12/17
 * Time: 11:24 AM
 */

\Yii::$container->set('yii\grid\ActionColumn', [
    'contentOptions' => [
        'style' => [
            'white-space' => 'nowrap',
            'width' => '70px',
            'text-align' => 'center',
        ]
    ],
]);

\Yii::$container->set('yii\grid\SerialColumn', [
    'contentOptions' => [
        'style' => [
            'width' => '20px',
        ]
    ],
]);