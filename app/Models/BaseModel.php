<?php namespace App\Models;

/**
 * Class BaseModel
 *
 * @author Anuj Jaha er.anujjaha@gm
 */

use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Input, Schema, ReflectionClass;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\GeneralException;
use App\Models\UpdateLogger;

class BaseModel extends Model
{
    /**
     * Create the Model in Database.
     *
     * @param array $attributes
     * @return bool
     */
    public static function create(array $attributes = Array())
    {
        return parent::query()->create($attributes);
    }

    /**
     * Update the model in the database.
     *
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function update(array $attributes = [] , array $options = [])
    {
        return parent::update($attributes);
    }

    /**
     * Delete the model in the database.
     *
     * @return bool
     */
    public function delete()
    {
       return parent::delete();
    }
}
