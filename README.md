# redsupport.dev - модуль Bitrix

- Обертка для стандартных debug функций
- Обертка функции var_dump()


Пример:
------

1) Загрузить в /local/modules/

2) Установить в админке

3) Для использования подключить в init.php

\Bitrix\Main\Loader::includeModule('redsupport.dev');

// Можно указать проверку текущего пользователя при вызове методов
RedSupport\Dev\F::$checkUserID = 'ID пользователя';

// пример вызова
RedSupport\Dev\F::var_dump($data);