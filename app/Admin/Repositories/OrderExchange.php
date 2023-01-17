<?php

namespace App\Admin\Repositories;

use App\Models\OrderExchange as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class OrderExchange extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

}
