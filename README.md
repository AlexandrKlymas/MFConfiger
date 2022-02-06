# MFConfigure
------------
Evolution CMS plugin MultiFields конфиг-менеджер

## Направление MultiFields на получение конфига из других источников

С помощью консольной команды создает TV и файл конфига который направлен на конфиг-менеджер.
Это позволяет использовать MultiFields фичи в других продуктах.
Конфиг-менеджеру передается имя TV параметра, возвращается конфиг.
Так предоставляется возможность вернуть конфиг с динамически изменёнными параметрами.

## Использование

### Установка
`php artisan package:installrequire klym/multifields-configure "*"` в **core/** каталоге

### Создание конфиг-менеджера
Наследуем MFCManager и переопределяем ему метод getConfig()
Метод getConfig() должен вернуть конфиг для MultiFields
Теперь через этот новый конфиг-менеджер Ваши пакеты или сервисы получают возможность контролировать конфиг MultiFields

### Команда для создания TV и конфига
`php artisan mfc:create {tv_name} {manager_class_name} {--js} {--f}` в **core/** каталоге

Аргументы: `{tv_name}` имя TV, `{manager_class_name}` название класса конфиг-менеджера

### Опции:

`{--js}` (необязателен) переключит в режим для MultiFieldsJS, по умолчанию работает для MultiFields.

`{--f}` (необязателен) принуждает перезаписать тип TV и конфиг если они существуют.

Пример: `php artisan mfc:create mysupertv \EvolutionCMS\MFConfigure\Managers\MFCManager --js --f`

## Зачем это?

Люблю ❤MultiFields.
Очень удобно используя MultiFields в админ панели задавать необходимые настройки для пакетов и сервисов.
Выполнив две команды получаем все блага MultiFields в своем коде.


# MFConfigure
------------
Evolution CMS plugin MultiFields config manager

## Directing MultiFields to get config from other sources

Using the console command creates a TV and a config file that is directed to the config manager.
This allows you to use the MultiFields feature in other products.
The name of the TV parameter is passed to the config manager, the config is returned.
So it is possible to return the config with dynamically changed parameters.

## Usage

### Installation
`php artisan package:installrequire klym/multifields-configure "*"` in **core/** directory

### Create a config manager
Inherit MFCManager and override its getConfig() method
The getConfig() method should return the config for MultiFields
Now through this new config manager your packages or services get the ability to control the MultiFields config

### Command to create TV and config
`php artisan mfc:create {tv_name} {manager_class_name} {--js} {--f}` in **core/** directory

Arguments: `{tv_name}` TV name, `{manager_class_name}` config manager class name

### Options:

`{--js}` (optional) will switch to MultiFieldsJS mode, works for MultiFields by default.

`{--f}` (optional) forces the TV type and config to be overwritten if they exist.

Example: `php artisan mfc:create mysupertv \EvolutionCMS\MFConfigure\Managers\MFCManager --js --f`

## Why is this?

I love ❤MultiFields.
It is very convenient to use MultiFields in the admin panel to set the necessary settings for packages and services.
After executing two commands, we get all the benefits of MultiFields in our code.