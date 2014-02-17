<?php

class Channel extends Eloquent
{
	protected $table = 'channel';

	protected $guarded = array();

	public static $rules = array();

	public static $sluggable = array(
		'build_from' => 'title',
		'save_to'    => 'slug',
	);
}
