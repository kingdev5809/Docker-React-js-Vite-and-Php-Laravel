<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class BaseRepository
 * @package App\Repository
 */
abstract class BaseRepository
{
    /**
     * @var Model
     */
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function all(array $columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * @param $id
     * @param array $relationships
     * @param array $withCount
     * @return mixed
     */
    public function findById($id, $relationships = [], $withCount = [], $addSelect = [])
    {
        if (empty($relationships)) {
            return $this->model->findOrFail($id);
        }

        return $this->model->addSelect($addSelect)->with($relationships)->withCount($withCount)->findOrFail($id);
    }

    /**
     * @return Model
     */
    abstract public function create(): Model;

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        $model = $this->create();

        $model->fill($data);
        $model->save();

        return $model;
    }

    public function update($model, array $data): Model
    {
        if (!is_object($model)) {
            $model = $this->findById($model);
        }

        $model->fill($data);
        $model->save();

        return $model;
    }

    public function delete($model): bool
    {
        if (!is_object($model)) {
            $model = $this->findById($model);
        }

        return $model->delete();
    }

    /**
     *
     * Dynamic findBy function
     *
     * @param $column
     * @param $value
     * @param false $multiple
     * @param array $select
     * @param array $scopes
     * @return mixed
     */
    public function findBy($column, $value, $multiple = false, $select = [], $scopes = [])
    {
        if (is_array($value)) {
            $model = $this->model->whereIn($column, $value);
        } else {
            $model = $this->model->where($column, $value);
        }

        $model->addSelect($select);

        if ($scopes) {
            foreach ($scopes as $scope) {
                $model->{$scope}();
            }
        }

        if ($multiple) {
            return $model->get();
        }

        return $model->first();
    }

    /**
     * For searching in json column
     *
     * @param $value
     * @return string
     */
    public function parseOrderBy($value)
    {
        $exploded = explode('->', $value);

        foreach ($exploded as &$item) {
            if (ctype_upper($item)) {
                continue;
            }

            $item = Str::snake($item);
        }

        return implode("->", $exploded);
    }
}
