<?php

namespace App\Repositories\Backend\Product;

use App\Models\Product\Product;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

/**
 * Class EloquentProductRepository.
 */
class EloquentProductRepository extends BaseRepository
{
    /**
     * Product Model
     *
     * @var Object
     */
    public $model;

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new Product;
    }

    /**
     * Create Product
     *
     * @param array $input
     * @return mixed
     */
    public function create($input)
    {
        $input      = $this->prepareInputData($input, true);
        $isExist    = $this->isSKUExists(null, $input['sku']);

        if($isExist === 0)
        {
            $model = $this->model->create($input);
            
            if($model)
            {
               return $model;
            }
        }

        return false;
    }

    /**
     * Update Product
     *
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function update($id, $input)
    {
        $model = $this->model->find($id);

        if($model)
        {
            $isExist = $this->isSKUExists($id, $input['sku']);

            if($isExist === 0)
            {
                $input  = $this->prepareInputData($input);
                $status = $model->update($input);

                if($status)
                {
                   return $model;
                }
            }
        }
        
        return false;
    }

    /**
     * Is SKU Exists
     * 
     * @param int $id
     * @param string $sku
     * @return int
     */
    public function isSKUExists($id = null, $sku = null)
    {
        if($id)
        {
            return $this->model->where('id', '!=', $id)->where('sku', $sku)->count();
        }
        
        return $this->model->where('sku', $sku)->count();
    }

    /**
     * Prepare Input Data
     *
     * @param array $input
     * @return array
     */
    public function prepareInputData($input = array())
    {
        return $input;
    }

    /**
     * Get Table Fields
     *
     * @return array
     */
    public function getTableFields()
    {
        return [
            $this->model->getTable().'.*'
        ];
    }

    /**
     * Get For DataTable
     * 
     * @return array
     */
    public function getForDataTable()
    {
        return $this->model->select($this->getTableFields())->get();
    }

    /**
     * Delete Product
     * 
     * @param int $productId
     * @return bool
     */
    public function deleteProduct($productId = null)
    {
        $model = $this->model->find($productId);

        if(isset($model))
        {
            return $model->delete();
        }

        return false;
    }
}