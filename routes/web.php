<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});



// $router->post('/register', 'UserController@registration');
// $router->post('/logauth', 'UserController@logAuth');

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
   // Matches "/api/register
   $router->post('register', 'UserController@register');
   $router->post('logauth', 'UserController@logAuth');

   /*Dashboard*/
   

   
   /*
		Route List
		A. Dashboard
			1. Register
			2. Log In
			3. Sales (Daily, Weekly, Yearly)
			4. Machine Sales
			5. Client Trade
		B. POS
			1. GET - List of Machines
			2. GET - List of Services
			3. GET - list of items
			4. POST - List of Transaction
				i. Reload based on Search user
			5. POST - Add to Cart
				i. Auto Compute
			6. POST - Checkout
			7. POST - Add discount
		C. Sales
			1. GET - Transaction
				i. Filter based on
					a. Personel (Cashier)
					b. Customer
					c. Date
			2. POST - Update Transaction
			3. POST - Update Status
		D. Members
			1. GET - All Members
			2. GET - Member based on filter
			3. GET - Status
			4. GET - Membership/WalkIn
			5. POST - Update/Delete
		E. Service
			1. GET - All Services
			2. POST - Uupdate
			3. POST - Delete
			4. POST - Add New
		F. Invetory
			1. GET - All Items
			2. POST - Update
			3. POST - Reorder
			4. POST - Add new
			5. POST - Deleted
			6. Additional *** NOtification for Reorder point
		G. Reports
			1. GET - sales (daily, weekly, monthly)
			2. GET - Machine Sales
			3. GET - Service sales
			4. GET - Items Sold
			5. GET - Customer (Walk in vs Memeber)
		H. Settings
			1. Add New User
			2. Add Discount Type
			3. Add Membership Type
			4. Add Machine (Machine Type)
   */
});	