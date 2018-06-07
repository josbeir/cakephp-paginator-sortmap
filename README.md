# CakePHP Paginator with sortmaps

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Build Status](https://travis-ci.org/josbeir/cakephp-paginator-sortmap.svg?branch=master)](https://travis-ci.org/josbeir/cakephp-paginator-sortmap)

(WIP) This plugin is a modified version of the built in cakephp paginator. Instead of using ``sortWhitelist`` there's now an option ``sortMap``where you can define mappings of fields to sort.


In its simplest for you can just use the sortMap to rename sort keys

```php
[
    'sortMap' => [
        'foo' => 'bar'
    ]
]
```

Will result in sort order

```
[ 'bar' => 'asc' ]
```

A mapping can also consist of multiple sort fields grouped together:

```php
[
    'sortMap' => [
        'foo' => [
            'Article.name',
            'Article.created'
        ]
    ]
]
```

So when sorting on ``foo`` the following order clause will be passed to the datasource object (where the direction is passed from the ``foo`` argument)

````
Article.name' => asc
Article.created' => asc
````

You could also assign fixed sort conditions to specific fields in your sortmap. These conditions will then always be used.

```php
[
    'sortMap' => [
        'foo' => [
            'Article.name',
            'Article.created' => 'asc'
        ]
    ]
]
```

When only field names are provided it falls back to the default whitelist behavior as before where names will be checked if they exist in the datasource and prefixed with the corresponding alias.

```php
[
    'sortMap' => [
        'name',
        'created'
    ]
]
```
