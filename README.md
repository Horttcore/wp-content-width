# Content Width

Setting the global WordPress variable `$content_width` in a single place for php and css

## Installation

`$ composer require ralfhortt/wp-content-width`

## Usage

```php
<?php
use RalfHortt\ContentWidth\ContentWidth;

(new ContentWidth(980))->register();
```

```css
.container {
	margin-left: auto;
	margin-right: auto;
	max-width: var(--content-width);
	width: 100%;
}
```