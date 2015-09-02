<?php
// My common functions

	/**
	 * removes http:// or https:// from string
	 *
	 * @return string
	 */
	function hlp_trim_http($url) 
	{
	   $disallowed = array('http://', 'https://');
	   foreach($disallowed as $d) {
	      if(strpos($url, $d) === 0) {
	         return str_replace($d, '', $url);
	      }
	   }
	   return $url;
	}

	/**
	 * Truncates a string based on length, but truncates at the end of sentence.
	 *
	 * @return string
	 */
	function hlp_shorten($str, $length = 200)
	{
		if (strlen($str) < $length)
		{
			return strip_tags($str);
		}
		else
		{

			$pos = strpos($str, '.', $length);

			if($pos)
			{
				return substr(strip_tags($str), 0 , $pos+1 );
			}
			else
			{
				$pos = strpos($str, ' ', $length);
				return substr(strip_tags($str), 0, $pos+1); 
			}
	        
		}
		
	}

	function hlp_in_root_domain($request)
	{
		return ($request->root() == 'http://cdeo.ph' || $request->root() == 'https://cdeo.ph' || $request->root() == 'http://www.cdeo.ph' || $request->root() == 'https://www.cdeo.ph');
	}

	function hlp_get_images($images_string)
	{
		return explode(', ', $images_string);
	}

	function hlp_remove_empty_tags($html)
	{
		$pattern =  '~<(p|span)>(?>\s+| |(?R))*</\1>~'; 
		$html = preg_replace($pattern, '', $html);
		// remove empty a tags
		
		$pattern = "/<a[^>]*><\\/a[^>]*>/"; 
		$html = preg_replace($pattern, "", $html);

		return $html;


	}

	function hlp_get_user_email()
	{
		if (Auth::check())
		{
			return Auth::user()->email;
		}
	}
	




?>