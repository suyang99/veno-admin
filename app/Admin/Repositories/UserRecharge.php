<?php

namespace App\Admin\Repositories;

use App\Models\UserRecharge as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class UserRecharge extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
