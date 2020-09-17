# Magento 2 Theme Main Color 

This module allows changing the main color of buttons through a command line.

## Comments

This module was tested with Magento 2.3.3.

## How to install

### Via composer

Edit `composer.json`

```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ozzytop/m2-theme-color"
        }
    ],
    "require": {
        "ozzytop/m2-theme-color": "dev-master"
    }
}
```

```
composer install
php bin/magento module:enable Ozzytop_ThemeColor
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

### Or Copy and paste

Download latest version from GitHub

Paste into `app/code/Ozzytop/ThemeColor` directory

```
php bin/magento module:enable Ozzytop_ThemeColor
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## Usage

To use the module you have to a Magento command with some parameters:

`php bin/magento ozzytop:color [hexadecimal color] [view store]`

For instance:

`php bin/magento ozzytop:color 000000 2`

You have to type the 2 parameters.


## Important

Clean cache after making a change