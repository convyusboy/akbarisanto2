<?php

class Post extends Eloquent {
	protected $guarded = array('id');
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'posts';

		/**
		 * The attributes excluded from the model's JSON form.
		 *
		 * @var array
		 */
	}