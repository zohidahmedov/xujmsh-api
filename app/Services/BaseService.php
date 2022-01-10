<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Builder;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseService
{
    /**
     * @var
     */
    protected $repo;
    /**
     * @var
     */
    protected $listRelation;
    /**
     * @var
     */
    protected $showRelation;
    /**
     * @var
     */
    protected $attributes;
    /**
     * @var
     */
    protected $sort_fields;

    /**
     * @var
     */
    protected $filter_fields;

    /**
     * @param array $params
     * @return mixed
     */
    public function get(array $params)
    {
        $perPage = $params['per_page'] ?? 20;
        $query = $this->repo->getQuery();
        $query = $this->relation($query, $this->listRelation);
        $query = $this->filter($query, $this->filter_fields, $params);
        $query = $this->sort($query, $params, $this->sort_fields);
        $query = $this->select($query, $this->attributes);
        return $this->repo->getPaginate($query, $perPage);
    }

    /**
     * @param Builder $query
     * @param null $relation
     * @return Builder
     */
    public function relation(Builder $query, $relation = null) : Builder
    {
        if ($relation) {
            $query->with($relation);
        }
        return $query;
    }

    /**
     * @param Builder $query
     * @param null $attributes
     * @return Builder
     */
    public function select(Builder $query, $attributes = null) : Builder
    {
        if ($attributes) {
            $query->select($attributes);
        }
        return $query;
    }


    /**
     * @param Builder $query
     * @param $filter_fields
     * @param $params
     * @return Builder
     */
    public function filter(Builder $query, $filter_fields, $params) : Builder
    {
        foreach ($filter_fields as $key => $item) {
            if (array_key_exists($key, $params)) {
                if ($item['type'] == 'string')
                    $query->where($key, 'ilike', '%' . $params[$key] . '%');
                if ($item['type'] == 'number')
                    $query->where($key, $params[$key]);
                if ($params[$key] and $item['type'] == 'json') {
                    if ($item['search'] == 'string')
                        $query->where('data->' . $key . '', 'ilike', $params[$key]);
                    if ($item['search'] == 'number')
                        $query->where('data->' . $key . '', $params[$key]);
                }
            }
        }
        return $query;
    }

    /**
     * @param $query
     * @param array $params
     * @return Builder
     */
    public function sort($query, array $params, $sort_fields = null): Builder
    {
        $key = 'id';
        $order = 'desc';
        if (isset($sort_fields) and isset($sort_fields['sort_key'])) {
            $key = $sort_fields['sort_key'];
            $order = $sort_fields['sort_type'];
        }
        if (isset($params['sort_key'])) {
            $key = $params['sort_key'];
            $order = $params['sort_type'];
        }
        $query->orderBy($key, $order);

        return $query;
    }

    /**
     * @param $params
     * @return mixed
     */
    public function create($params)
    {
        return $this->repo->store($params);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $model = $this->repo->getById($id);
        if($this->showRelation && count($this->showRelation)) {
            foreach ($this->showRelation as $relation) {
                $model->$relation;
            }
        }
        return $model;
    }

    /**
     * @param $params
     * @param $id
     * @return mixed
     */
    public function update($params, $id)
    {
        return $this->repo->update($params, $id);

    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->repo->destroy($id);
    }
}
