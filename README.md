Laravel package for Google Translate REST API
====================

[![Downloads Total](https://img.shields.io/packagist/dt/ddctd143/google-translate.svg)](https://packagist.org/packages/ddctd143/google-translate)

Package allows to work with [Google Translate API](https://cloud.google.com/translate/)

## Installation

Package can be installed using composer by adding to "require" object

```
"require": {
    "ddctd143/google-translate": "dev-master"
}
```

or from console:

```
composer require ddctd143/google-translate dev-master
```


## Configuration

You should publish config file to be able to add your Google API key.
To publish config you should do:

```
php artisan vendor:publish \
--provider="Dedicated\GoogleTranslate\GoogleTranslateProvider" --tag=config
```

After config is published, you will have it in `config\google-translate.php` of your Laravel project directory


You should change only one line:

```
    ...
    
    /**
     * Google key for authentication
     */
    'api_key' => 'YOUR-GOOGLE-API-KEY-GOES-HERE',
    
    ...

```


## Usage

To translate text with given source language and target language:


```
$translator = new Dedicated\GoogleTranslate\Translator;


$result = $translator->setSourceLang('en')
                     ->setTargetLang('ru')
                     ->translate('Hello World');
                           
dd($result); // "Привет мир"                           
```

<br>


By default language detection is turned on, so you can translate text without specifying source language.

This will make 2 requests to google API:

- First request will go to /detect URL and get source language name
- Second request will make actual translate request and give out result.


```
$translator = new Dedicated\GoogleTranslate\Translator;


$result = $translator->setTargetLang('ru')
                     ->translate('Hello World');
                           
dd($result); // "Привет мир"                           
```

You can also use function to only detect text's source language:


```

$result = $translator->detect('Hello World');

dd($result); // "en"

```


### License

This repository code is open-sourced software licensed under the MIT license
