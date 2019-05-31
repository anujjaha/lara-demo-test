<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Repositories\Backend\Product\EloquentProductRepository;

class ProductsController extends Controller
{
	/**
	 * Product Repository
	 *
	 * @var object
	 */
	public $repository;

	/**
	 * Construct
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->repository = new EloquentProductRepository;
	}

	/**
	 * List Products
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	    return view('backend.product.list');
	}

	/**
	 * Create Product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
	    return view('backend.product.create');
	}

	/**
	 * Store Product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$status = $this->repository->create($request->all());

		if($status)
		{
			return redirect()->route('products.index')->withFlashSuccess([
				'succes' => true,
				'message' => 'Product Created Successfully'
			]);
		}

		return redirect()->route('products.index')->withFlashDanger([
			'succes' 	=> false,
			'message' 	=> 'Unable to Create Product'
		]);
	}

	/**
	 * Edit Product
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
       	$product = $this->repository->findOrThrowException($id);

       	return view('backend.product.edit')->with([
            'product' 		=> $product,
        ]);
    }

    /**
     * Update Product
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
    	$status = $this->repository->update($id, $request->all());

    	if($status)
    	{
    		return redirect()->route('products.index')->withFlashSuccess([
    			'succes' => true,
    			'message' => 'Product Created Successfully'
    		]);
    	}

    	return redirect()->route('products.index')->withFlashDanger([
    		'succes' 	=> false,
    		'message' 	=> 'Unable to Create Product'
    	]);
    }

	/**
	 * Get Table Data
	 * 
	 * @param Request $request
	 * @return JSON
	 */
	public function getTableData(Request $request)
	{
		return \DataTables::of($this->repository->getForDataTable())
			->escapeColumns(['id', 'sort'])
            ->addColumn('action', function ($item) {
                return '<a href="'. route('products.edit', ['id' => $item->id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a><a href="javascript:void(0);" class="btn btn-xs btn-danger delete-product" data-id="'. $item->id .'">Delete</a>';
            })
			->make(true);
	}

	/**
	 * Delete Product
     *
     * @return JSON
     */
    public function delete(Request $request)
    {
    	$status = $this->repository->deleteProduct($request->get('productId'));

    	if($status)
    	{
    		return json_encode([
    			'status' => true,
    			'message' => 'Product Delete Successfully!'
    		]);
    	}

    	return json_encode([
    		'status' 	=> false,
    		'message' 	=> 'Unable to Delete Product!'
    	]);
    }
}