<?php

namespace badmushroom\Crumbler;

/**
 * Breadcrumb Builder for Laravel 4
 * 
 * @author Chris Sprague
 * @license MIT
 */
class Crumbler
{	
	/**
	 * Build Breadcrumb Trail
	 * 
	 * @param string $separator Seperator for crumbs
	 * @return string
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
	 * Add Breadcrumb Item
	 * 
	 * @param string $crumb Name of breadcrumb
	 * @param string $link URI associated with breadcrumb
	 * @return array
	 */
	public function crumb($crumb, $link = '')
	{
		return $this->crumbs[$crumb] = $link;
	}
}