# CakePHP Paginator with sortmaps

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Build Status](https://travis-ci.org/josbeir/cakephp-paginator-sortmap.svg?branch=master)](https://travis-ci.org/josbeir/cakephp-paginator-sortmap)

(WIP) This plugin is a modified version of the built in cakephp paginator. Instead of using ``sortWhitelist`` there's  now a ``sortMap`` option where you can define mappings of fields to sort.

This plugin was created as a proof of concept after some discussion on slack and in an old [ticket](https://github.com/cakephp/cakephp/issues/10028#issuecomment-272812357) on the main cake repo.

## Mapping sort => field

In its simplest form you can just use the sortMap to rename sort keys:

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

## Mapping multiple fields under one sort

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

So when sorting on ``foo`` the following order clause will be generated and passed to the the datasource object (where the direction is passed from the ``foo`` argument to both fields'

````
Article.name' => asc
Article.created' => asc
````

You could also assign fixed sort conditions to specific fields in your sortmap. These conditions will then be used instead of the direction passed from ``foo``.

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
## Legacy behavior

When only field names are provided it falls back to the default ``sortWhitelist`` behavior as before where names will be checked if they exist in the datasource and prefixed with their corresponding alias. 

_Only in this scenario prefixing is performed. When using mapping it is expected you take care of aliassing yourself._

```php
[
    'sortMap' => [
        'name',
        'created'
    ]
]
```
