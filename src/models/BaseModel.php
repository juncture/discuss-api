<?php namespace Juncture\DiscussApi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class BaseModel extends Model {

	public $prefix = '';

	public function __construct()
	{
		$this->prefix = Config::get('discuss-api::table_prefix');

		// Set the table name based on the calling class
		$class = str_replace('Juncture\\DiscussApi\\', '', get_class($this));
		$this->table = $this->prefix.strtolower(str_plural($class));
	}

	/**
	 * Like find() but throws an exception when not found
	 *
	 * @param  integer $id Numeric ID of resource to find
	 * @return Collection
	 */
	public static function findById($id)
	{
		$tag = static::find($id);

		if (!$tag)
		{
			throw new NotFoundException('Could not find resource');
		}

		return $tag;
	}

	/**
	 * Convert the model instance to an array
	 *
	 * @return array
	 */
	public function toArray()
	{
		$data = parent::toArray();

		if (!$this->created_at instanceof DateTime)
		{
			return $data;
		}

		$data['id'] = (int) $data['id'];
		$data['created_at'] = $this->fromDateTime($this->created_at);
		$data['updated_at'] = $this->fromDateTime($this->updated_at);

		return $data;
	}
}
