<?php

class ArticleRepository
{
	/**
	 * @return Illuminate\Database\query\Builder;
	 */
	public static function buildQueryFromInput()
	{
		$q = Article::query();

		foreach(Input::all() as $key => $value) {

			switch($key) {

				case 'with':

					$with = explode(',', $value);

					foreach($with as $relation) {

						if(!in_array($relation, array('channel'))) {
							continue;
						}

						$q->with($relation);
					}
					break;


				case 'offset':
					$q->offset($value);
					break;

				case 'limit':
					$q->take($value);
					break;

			}
		}

		return $q;
	}

	/**
	 * @param $slug
	 * @return Article
	 */
	public static function findBySlug($slug)
	{
		return static::buildQueryFromInput()->whereSlug($slug)->firstOrFail();
	}
}