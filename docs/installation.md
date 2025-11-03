---
title: How to install package
description: How to install package
github: https://github.com/zaimealabs/heroicons/edit/main/
---

# Heroicons

[[TOC]]

## Instalation

```json
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/zaimea/heroicons"
        }
    ]
```

```bash
composer require zaimea/heroicons
```

#### Publish (Optional)

```bash
php artisan vendor:publish --tag="heroicons.config"
```
```bash
php artisan vendor:publish --tag="heroicons.views"
```
