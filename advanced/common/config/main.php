<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                ),
        ],
        'paypal'=> [
		    'class'        => 'marciocamello\Paypal',
    		'clientId'     => 'you_client_id',
    		'clientSecret' => 'you_client_secret',
	    	'isProduction' => false,
     		// This is config file for the PayPal system
     		'config'       => [
         		'http.ConnectionTimeOut' => 30,
         		'http.Retry'             => 1,
         		//'mode'                   => \marciocamello\Paypal::MODE_SANDBOX, 
         		// development (sandbox) or production (live) mode
         		'log.LogEnabled'         => YII_DEBUG ? 1 : 0,
         		'log.FileName'           => '@runtime/logs/paypal.log',
        		//'log.LogLevel'           => '\marciocamello\Paypal::LOG_LEVEL_FINE',
    		]
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
