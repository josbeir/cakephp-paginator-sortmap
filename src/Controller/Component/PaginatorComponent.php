<?php
namespace Josbeir\Paginator\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\Controller\Component\PaginatorComponent as BasePaginatorComponent;
use Josbeir\Paginator\Datasource\Paginator;

class PaginatorComponent extends BasePaginatorComponent
{
    /**
     * {@inheritDoc}
     */
    public function __construct(ComponentRegistry $registry, array $config = [])
    {
        parent::__construct($registry, $config);

        if (!isset($config['paginator'])) {
            $this->_paginator = new Paginator();
        }
    }
}
