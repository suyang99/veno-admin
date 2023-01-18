<?php

namespace App\Admin\Repositories;

use App\Models\UserWithdraw as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class UserWithdraw extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
