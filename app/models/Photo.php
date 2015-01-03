<?php

class Photo extends Eloquent {
	protected $guarded = array('id');
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'photos';

		/**
		 * The attributes excluded from the model's JSON form.
		 *
		 * @var array
		 */
	}