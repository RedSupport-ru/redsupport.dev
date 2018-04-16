<?php
/**
 * redsupport.dev - модуль для разработки, обертка стандартных debug функций
 *
 * @author Sergey Korshunov <dev@redsupport.ru>
 * @copyright 2018 RedSupport.ru
 */

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class redsupport_dev extends CModule
{
    public function __construct()
    {
        $arModuleVersion = array();
        require(__DIR__.'/version.php');

        $this->MODULE_ID = str_replace('_', '.', __CLASS__);
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = Loc::getMessage('REDSUPPORT_DEV_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('REDSUPPORT_DEV_MODULE_DESC');

        $this->PARTNER_NAME = Loc::getMessage('REDSUPPORT_DEV_PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('REDSUPPORT_DEV_PARTNER_URI');

        $this->SHOW_SUPER_ADMIN_GROUP_RIGHTS='Y';
        $this->MODULE_GROUP_RIGHTS = 'Y';
    }

    public function DoInstall()
    {
        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
    }

    public function DoUninstall()
    {
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
    }

}