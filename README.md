# NovuPHP

## Notice!

Do not pick the master branch, its unstable and broken as its WIP.

Pick a release instead, those are stable!

###### Compability
![PHP5.x](https://img.shields.io/badge/PHP5.x-Incompatible-red)
![PHP7.0](https://img.shields.io/badge/PHP7.0-Compatible-green)
![PHP7.1](https://img.shields.io/badge/PHP7.1-Compatible-green)
![PHP7.2](https://img.shields.io/badge/PHP7.2-Compatible-green)
![PHP7.3](https://img.shields.io/badge/PHP7.3-Compatible-green)
![PHP7.4](https://img.shields.io/badge/PHP7.4-Compatible-green)
![PHP8.0](https://img.shields.io/badge/PHP8.0-Not%20Tested-yellow)

###### Info


[![GitHub issues](https://img.shields.io/github/issues/JRB-IT/NovuPHP.svg)](https://github.com/JRB-IT/NovuPHP/issues)

[![GitHub license](https://img.shields.io/github/license/JRB-IT/NovuPHP.svg)](https://github.com/JRB-IT/NovuPHP/blob/master/LICENSE)


## Installation

### Composer

1. `composer require jrb-it/novu-php`
2. include `vendor/autoload.php`
3. See Usage

## Usage

```php

$Novu  = new jrbit\novu\Client($sApiKey, $sApiUrl);

```

## Examples


#### Examples are in the `examples/` directory.




## Documentation


[Docs](https://steamphp.docs.justinback.com)


### Generating

Get apigen

```
./path_to_executeable "generate" "--source" "path_to_source" "--destination" "path_to_source/docs" "--title" "SteamPHP" "--charset" "UTF-8" "--exclude" "index.php" "--access-levels" "public" "--access-levels" "protected" "--php" "--tree" "--deprecated" "--todo" "--template-theme bootstrap"
```

## Feature Requests / Bug Reports


Feel free to make a [Pull Request](https://github.com/JustinBack/SteamPHP/compare) or [Open an Issue](https://github.com/JustinBack/SteamPHP/issues/new/choose)!