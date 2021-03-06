<?php

use Boyhagemann\Form\FormBuilder;

class ArticleController extends BaseController {

	protected $fb;

	/**
	 * @param FormBuilder $fb
	 */
	public function __construct(FormBuilder $fb)
	{
		$this->fb = $fb;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::with(array('channel', 'user'))->get();
        return View::make('article.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$fb = $this->fb;
		$fb->text('title')->label('Title')->required();
		$fb->text('key')->label('Key');
		$fb->textarea('markdown')->label('Body')->required();
		$fb->route('article.store');
		$form = $fb->build();

        return View::make('article.create', compact('form'));
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
			return Redirect::route('article.create')->withError('Input contains errors');
		}

		// First try to find an existing article with the same key. If an article is found,
		// then we can update this article.
		if(Input::get('key') && ($article = ArticleRepository::findByKey(Input::get('key')))) {
			return $this->update($article);
		}

		// This is a new article. Save it with the validated input data
		$article = Article::create(Input::all());

		return Redirect::route('article.show', $article->slug)->withSuccess('Article created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Article $article)
	{
		return View::make('article.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Article $article)
	{
		$fb = $this->fb;
		$fb->text('title')->label('Title')->required();
		$fb->textarea('markdown')->label('Body')->required();
		$fb->model($article);
		$fb->route('article.update', $article->slug);
		$fb->method('put');
		$form = $fb->build();

        return View::make('article.edit', compact('article', 'form'));
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
			return Redirect::route('article.edit')->withError('Input contains errors');
		}

		$article->update(Input::all());

		return Redirect::route('article.show', $article->slug)->withSuccess('Article updated');
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

		return Redirect::route('article.index')->withSuccess('Article deleted');
	}

}
