---
title: How to use package
description: How to use package
github: https://github.com/zaimealabs/heroicons/edit/main/docs
onThisArticle: true
sidebar: true
rightbar: true
---

# Heroicons Usage

[[TOC]]

## Usage

You can find a list of all icons and variants on the [Heroicons] website

**Available variants:**
- mini.solid
- micro.solid
- solid
- outline

```blade
<x-icon name="user" />
<x-icon name="user" solid />
<x-icon name="user" solid mini />
<x-icon name="user" variant="solid" />
<x-icon class="w-5 h-5 text-teal-600" name="user" />

<x-heroicons::outline.user />
<x-heroicons::solid.user />
<x-heroicons::mini.solid.user class="w-5 h-5" />
```

[TailwindLabs]:<https://github.com/tailwindlabs>
[Heroicons]:<https://heroicons.com>
