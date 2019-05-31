<?php namespace App\Models\Product\Traits\Relationship;

trait Relationship
{
	/**
	 * Relationship Mapping for Account
	 * @return mixed
	 */
	public function category()
	{
	    //return $this->belongsTo(Category::class, 'category_id');
	}
}