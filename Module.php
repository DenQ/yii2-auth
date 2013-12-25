<?php

namespace auth;


class Module extends \yii\base\Module
{
	public $controllerNamespace = 'auth\controllers';

    /**
     * @var int
     * @desc Remember Me Time (seconds), default = 2592000 (30 days)
     */
    public $rememberMeTime = 2592000; // 30 days

    /**
     * @var array
     * @desc User model relation from other models
     * @see http://www.yiiframework.com/doc/guide/database.arr
     */
    public $relations = array();

    public $tableMap = array(
        'User' => 'User',
        'UserStatus' => 'UserStatus',
        'ProfileFieldValue' => 'ProfileFieldValue',
        'ProfileField' => 'ProfileField',
        'ProfileFieldType' => 'ProfileFieldType',
    );

    public $layoutLogged = '//layouts/column2';
    public $layoutPathLogged;

    public $attemptsBeforeCaptcha = 3; // Unsuccessful Login Attempts before Captcha

    public $referralParam = 'ref';

	public $superAdmins = ['admin'];

	public function init()
	{
		parent::init();

		\Yii::$app->getI18n()->translations['auth.*'] = [
			'class' => 'yii\i18n\PhpMessageSource',
			'basePath' => __DIR__.'/messages',
		];
		$this->setAliases([
			'@auth' => __DIR__
		]);	}

    /**
     * Returns the module version number.
     * @return string the version.
     */
    public function getVersion()
    {
        return '1.0.0';
    }

}