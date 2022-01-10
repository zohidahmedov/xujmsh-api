<?php


namespace App\Services;


use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;

class UserService extends BaseService
{

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
        $this->filter_fields = ['name' => ['type' => 'string'], 'login' => ['type' => 'string'], 'status' => ['type' => 'number']];
        $this->listRelation = [];
    }


}
