<?php

class Category extends Eloquent {
	protected $guarded = array('id');
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'categories';

		/**
		 * The attributes excluded from the model's JSON form.
		 *
		 * @var array
		 */
	}