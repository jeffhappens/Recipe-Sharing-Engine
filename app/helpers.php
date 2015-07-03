<?php
	if ( ! function_exists('str_possessive')) {
		/**
		* Make a string possessive.
		*
		* @param  string  $string
		* @return string
		*/
		function str_possessive($string) {
			return $string.'\''.($string[strlen($string) - 1] != 's' ? 's' : '');
		}
	}