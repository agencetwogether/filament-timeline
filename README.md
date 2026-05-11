# Filament-timeline

Custom filament timeline for my personnal use

## Installation

You can install the package via composer:

```bash
composer require agencetwogether/filament-timeline
```

> [!IMPORTANT]
> If you have not set up a custom theme and are using Filament Panels follow the instructions in
> the [Filament Docs](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) first.

After setting up a custom theme add the plugin's views to your theme css file or your app's css file if using the
standalone packages.

```css
@source '../../../../vendor/agencetwogether/filament-timeline/resources/**/*.blade.php';
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-timeline-views"
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [Agence Twogether](https://github.com/agencetwogether)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
