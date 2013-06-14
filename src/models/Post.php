<?php

class Post extends BaseModel {

	/**
	 * The attributes that are allowed to be ->fill()'d into a User
	 *
	 * @var array
	 */
	protected $fillable = array('parent_id', 'user_id', 'important', 'title', 'message');

	/**
	 * Tag relationship
	 *
	 */
	public function tags()
	{
		return $this->belongsToMany('Tag', $this->prefix.'post_tag');
	}

	/**
	 * Users relationship
	 *
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}
}
