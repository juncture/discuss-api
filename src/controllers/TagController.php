<?php namespace Juncture\DiscussApi;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class TagController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Tag::with('posts')->get();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tag = new Tag(Input::all());

		if (!$tag->save())
		{
			App::abort(500, 'Failed to save tag');
		}

		return Response::json($tag->toArray(), 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Tag::findById($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tag = Tag::findById($id);
		$tag->fill(Input::all());

		if (!$tag->save())
		{
			App::abort(500, 'Failed to update tag');
		}

		return $tag;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tag = Tag::find($id);
		$tag->delete();

		return Response::make(null, 204);
	}

}
