<?php
	
	//Unique Code
	function uniqueCode()
	{
		return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
	}