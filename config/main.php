<?php

return [
'controllerMap' => [
	'elfinder' => [
		'class' => '\mihaildev\elfinder\PathController',
		'access' => ['admin'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
		'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
		'root' => [
			'baseUrl' => '', // /uploads
			'basePath' => '@storage', // site.lo/uploads
			'access' => ['read' => '*', 'write' => 'root'],
			'name' => ['category' => 'backend', 'message' => 'Category'], // Yii::t($category, $message)
			'driver' => 'LocalFileSystem',
			'options' => [
				'tmbSize' => '48',
				'acceptedName' => '/^[0-9a-z_\-.]+$/i', // i любой регистр только англ
				'imgLib' => 'gd'
			]
		]
	]
];