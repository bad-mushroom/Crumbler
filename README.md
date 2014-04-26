# Crumbler
---

Crumbler is a breadcrumb trail generator for Laravel 4.

# Install

Installation is done with composer. 

Add the following to the composer.json file in your Laravel 4 project.

	"require": {
		...
		"bad-mushroom/Crumbler": "dev-master"
	},

Next, update Composer:

    composer update

Now open `app/config/app.php` in your Laravel project to add the service provider:

	'providers' => array(
		...
		'Badmushroom\Crumbler\CrumblerServiceProvider',
	),

In the same file, add the facade alias:

	'aliases' => array(
		...
		'Crumbler' => 'Badmushroom\Crumbler\Facades\Crumbler'
	),

# Use

There are two methods that you'll use. 

To add a breadcrumb to your code use:

	Crumbler::crumb('Crumb Name', 'uri');

To generate the HTML for the crumb trail:

	Crumbler::build();

build() takes an optional string parameter for the breadcrumb separator. This can be a single character like '&gt;' or 
a a line of html like &lt;span class="myClass"&gt;::&lt;/span&gt;. The default is: &lt;span class="separator"&gt;/&lt;/span&gt;

As an example, in your controller file:


	// You can add some base breadcrumbs in your constructor.
	public function __construct()
	{
		Crumbler::crumb('1', 'one');
		Crumbler::crumb('2', 'two');
	}

	public function yourMethod()
	{	
		Crumbler::crumb('3', 'three');
		$crumbs = Crumbler::build();

		return View::make('yourView')->with('crumbs', $crumbs);
	}


The above example would output the following in your view:


	<ul class="crumbler">
		<li><a href="one">1</a><span class="separator">/</span></li>
		<li><a href="two">2</a><span class="separator">/</span></li>
		<li class="active">3</li>
	</ul>

The last breadcrumb element will be considered the "active" link. You'll also want to add your own css as necessary.

# License

http://opensource.org/licenses/MIT