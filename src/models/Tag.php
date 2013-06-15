<?php namespace Juncture\DiscussApi;

class Tag extends BaseModel {

	/**
	 * The attributes that are allowed to be ->fill()'d into a User
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'class');

	public $timestamps = false;

	/**
	 * Post relationship
	 *
	 */
	public function posts()
	{
		return $this->belongsToMany('Juncture\DiscussApi\Post', $this->prefix.'post_tag');
	}
}
