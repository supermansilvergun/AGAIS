<?php

use App\Http\Controllers\Companies\BranchController;
use App\Http\Controllers\Companies\CompanyController;
use App\Http\Controllers\Currencies\CurrencyController;
use App\Http\Controllers\Documents\DocumentController;
use App\Http\Controllers\Dynamic_Dropdowns\DynamicDropdownController;
use App\Http\Controllers\Financial_Entities\BankController;
use App\Http\Controllers\Financial_Entities\PaymentGatewayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profiles\EmployeeController;
use App\Http\Controllers\Profiles\OwnerController;
use App\Http\Controllers\RecoverController;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\Territories\ContinentController;
use App\Http\Controllers\Territories\CountryController;
use App\Http\Controllers\Territories\MunicipalityController;
use App\Http\Controllers\Territories\ParishController;
use App\Http\Controllers\Territories\StateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Banks
Route::delete('/banks/purge/{id}', [BankController::class, 'purge'])
		->name('banks.purge');
		
Route::resource('/banks', BankController::class)
		->parameters(['bank' => 'bank'])
		->names('banks');

//Branch
Route::delete('/branches/purge/{id}', [BranchController::class, 'purge'])
		->name('branches.purge');
		
Route::resource('/branches', BranchController::class)
		->parameters(['branch' => 'branch'])
		->names('branches');

//Combox
Route::get('/states/combobox/{id}', [DynamicDropdownController::class, 'getStates']);
Route::get('/municipalities/combobox/{id}', [DynamicDropdownController::class, 'getMunicipalities']);
Route::get('/parishes/combobox/{id}', [DynamicDropdownController::class, 'getParishes']);

//Companies
Route::delete('/companies/purge/{id}', [CompanyController::class, 'purge'])
		->name('companies.purge');
		
Route::resource('/companies', CompanyController::class)
		->parameters(['company' => 'company'])
		->names('companies');

//Currency
Route::delete('/currencies/purge/{id}', [CurrencyController::class, 'purge'])
		->name('currencies.purge');
		
Route::resource('/currencies', CurrencyController::class)
		->parameters(['currency' => 'currency'])
		->names('currencies');

//Documents
Route::delete('/documents/purge/{id}', [DocumentController::class, 'purge'])
		->name('documents.purge');
		
Route::resource('/documents', DocumentController::class)
		->parameters(['document' => 'document'])
		->names('documents');

//Employees
Route::delete('/employees/purge/{id}', [EmployeeController::class, 'purge'])
		->name('employees.purge');

Route::resource('/employees', EmployeeController::class)
		->parameters(['employee' => 'employee'])
		->names('employees');

//Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Owners
Route::delete('/owners/purge/{id}', [OwnerController::class, 'purge'])
		->name('owners.purge');
		
Route::resource('/owners', OwnerController::class)
		->parameters(['owner' => 'owner'])
		->names('owners');

//Payment Gateway
Route::delete('/payment-gateway/purge/{id}', [PaymentGatewayController::class, 'purge'])
		->name('payment-gateway.purge');
		
Route::resource('/payment-gateway', PaymentGatewayController::class)
		->parameters(['payment' => 'payment'])
		->names('payment-gateway');

//Roles
Route::delete('/roles/purge/{id}', [RoleController::class, 'purge'])
		->name('roles.purge');

Route::resource('/roles', RoleController::class)
		->parameters(['role' => 'role'])
		->names('roles');

//Route to restore resource in storage
/*Route::get('/restoring/{id}', [RecoverController::class, 'restore'])
		->name('restore');*/

//Territories
//Continents
Route::delete('/continents/purge/{id}', [ContinentController::class, 'purge'])
		->name('continents.purge');

Route::resource('/continents', ContinentController::class)
		->parameters(['continent' => 'continent'])
		->names('continents');

//Countries
Route::delete('/countries/purge/{id}', [CountryController::class, 'purge'])
		->name('countries.purge');
		
Route::resource('/countries', CountryController::class)
		->parameters(['country' => 'country'])
		->names('countries');

//States
Route::delete('/states/purge/{id}', [StateController::class, 'purge'])
		->name('states.purge');
		
Route::resource('/states', StateController::class)
		->parameters(['state' => 'state'])
		->names('states');

//Municipalities
Route::delete('/municipalities/purge/{id}', [MunicipalityController::class, 'purge'])
		->name('municipalities.purge');
		
Route::resource('/municipalities', MunicipalityController::class)
		->parameters(['municipality' => 'municipality'])
		->names('municipalities');

//Parishes
Route::delete('/parishes/purge/{id}', [ParishController::class, 'purge'])
		->name('parishes.purge');
		
Route::resource('/parishes', ParishController::class)
		->parameters(['parish' => 'parish'])
		->names('parishes');

//Users
Route::delete('/users/purge/{id}', [UserController::class, 'purge'])
		->name('users.purge');

Route::resource('/users', UserController::class)
		->parameters(['user' => 'user'])
		->names('users');