<?php namespace Juncture\DiscussApi;

class Tag extends BaseModel {

	/**
	 * The attributes that are allowed to be ->fill()'d into a User
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'class');

	/**
	 * Post relationship
	 *
	 */
	public function posts()
	{
		return $this->belongsToMany('Post', $this->prefix.'post_tag');
	}
}
