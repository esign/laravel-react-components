# Use react components within laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/esign/laravel-react-components.svg?style=flat-square)](https://packagist.org/packages/esign/laravel-react-components)
[![Total Downloads](https://img.shields.io/packagist/dt/esign/laravel-react-components.svg?style=flat-square)](https://packagist.org/packages/esign/laravel-react-components)
![GitHub Actions](https://github.com/esign/laravel-react-components/actions/workflows/main.yml/badge.svg)

This packages allows you to register react components within your laravel application.

## Installation

You can install the package via composer:

```bash
composer require esign/laravel-react-components
```

The package will automatically register a service provider.

## Usage
To register the container for a react component a `@reactComponent` directive has been included. Props may be passed as the second parameter:
```blade
@reactComponent('article-card')
@reactComponent('article-card', ['article' => $article])
```

To register the components in your frontend build, you may use the `registerReactComponents` function included in this package. This can be published using the following command:
```bash
php artisan react-components:install
```

The file will be copied to `resources/assets/js/utils/registerReactComponents.js` but may be moved to any other location.

```javascript
import { ArticleCard } from "./Components/ArticleCard";
import { registerReactComponents } from "./utils/registerReactComponents";

registerReactComponents({
    'article-card': ArticleCard,
});
```


### Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
