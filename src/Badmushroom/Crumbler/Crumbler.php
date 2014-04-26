<?php

namespace badmushroom\Crumbler;

/**
 * 
 */
class Crumbler
{	
	/**
	 * 
	 */
	public function build($separator = '<span class="separator">/</span>')
	{ 
		$breadcrumbs = '<ul class="crumbler">';
		$loop = 1;
		
		foreach ($this->crumbs as $key => $value) {
			
			$counter = count($this->crumbs);
			
			if ($counter != $loop) {
				// Crumb
				$breadcrumbs .= '<li><a href="' . $value . '">' . $key . '</a>' . $separator . '</li>';
			} else {
				// Current/Active Crumb
				$breadcrumbs .= '<li class="active">' . $key . '</li>';
			}
			
			$loop++;
		}
		
		$breadcrumbs .= '</ul>';
		
		return $breadcrumbs;
		
	}
	
	/**
	 * 
	 */
	public function crumb($crumb, $link = '')
	{
		return $this->crumbs[$crumb] = $link;
	}
}