<?php

namespace Api;

use BaseController, Response, Article, ArticleRepository, View, Input;

class ArticleController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = ArticleRepository::buildQueryFromInput()->get()->toArray();
        return Response::json(compact('articles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = Validator::make(Input::all(), Article::$rules);

		if($v->fails()) {
			return Response::json(array(
				'message' => 'Input contains errors',
				'errors' => $v->messages(),
			));
		}

		Article::create(Input::all());

		return Response::json(array('message' => 'Article stored'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Article $article)
	{
        return Response::json($article->toArray());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Article $article)
	{
		$v = Validator::make(Input::all(), Article::$rules);

		if($v->fails()) {
			return Response::json(array(
				'message' => 'Input contains errors',
				'errors' => $v->messages(),
			));
		}

		$article->update(Input::all());

		return Response::json(array('message' => 'Article updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Article $article)
	{
		$article->delete();

		return Response::json(array('message' => 'Article deleted'));
	}

}
