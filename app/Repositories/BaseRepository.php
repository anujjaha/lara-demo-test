<?php

namespace App\Repositories;

/**
 * Class BaseRepository.
 */
class BaseRepository
{
    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->query()->get();
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->query()->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->query()->find($id);
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return call_user_func(static::MODEL.'::query');
    }

    /**
     * Find Or Throw Exception
     *
     * @param $id
     * @param array $relations
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id, $relations = array())
    {
        $model = $this->model->find($id);
            
        if(isset($model))
        {
            return $model;
        }

        return false;
    }
}