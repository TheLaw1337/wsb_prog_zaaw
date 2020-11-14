<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController1;

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

// Route::get('/test', function () {
//     return view('test');
// });

Route::get('/test', function () {
    return ['name' => 'Janusz', 'surname' => 'Nowak'];
});

Route::get('/test', function () {
    return view('test', ['name' => 'Janusz', 'surname' => 'Kowalski']);
});

Route::get('/pages/{x}' , function ($x){
    $pages = [
        'about' => 'Strona WSB',
        'contact' => 'test@gmail.com, Poznań',
        'home' => 'Strona domowa'
    ];

    return $pages[$x];
});

Route::get('/address/{city}/{street}/{zipcode}', function(String $city, String $street, int $zipcode){
    $zipcode = substr($zipcode, 0, 2).'-'.substr($zipcode, 2, 3);
    echo <<<LABEL
        Kod pocztowy: $zipcode<br>
        Miasto: $city<br>
        Ulica: $street
        <hr>    
LABEL;
});

Route::get('/address/{city?}/{street?}/{zipcode?}', function(String $city = 'Brak danych', String $street = " - ", int $zipcode = null){
    $zipcode = substr($zipcode, 0, 2).'-'.substr($zipcode, 2, 3);
    echo <<<LABEL
        Kod pocztowy: $zipcode<br>
        Miasto: $city<br>
        Ulica: $street
        <hr>    
LABEL;
})->name('address');

Route::redirect('/adres/{city?}/{street?}/{zipcode?}', '/address/{city?}/{street?}/{zipcode?}');

Route::prefix('admin')->group(function(){
    Route::get('/home/{name}', function(String $name){
    echo "Witaj $name na stronie administracyjnej";
    });

        Route::get('/users', function(){
            echo "Użytkownicy systemu";
        });

    Route::redirect('/{name}', '/admin/home/{name}');
});

Route::get('/user/{name}/{age?}', function(String $name, int $age = null){
    echo "Imię: $name";
    if ($age != null) {
        echo "<br>Wiek: $age";
    }
})->where(['name' => '[A-Za-z]+', 'age' => '[0-9]+']);

Route::prefix('student')->group(function(){
    Route::get('/main/{name?}', function(String $name = ''){
    echo "<h1>Strona główna</h1><br>Witaj $name na stronie głównej";
    })->where(['name' => '[A-Za-z]+']);

    Route::get('/home/{name?}', function(String $name = ''){
    echo "<h1>Strona domowa</h1><br>Witaj $name na stronie domowej";
    })->where(['name' => '[A-Za-z]+']);

    Route::get('/wsb/{name?}', function(String $name = ''){
    echo "<h1>Strona WSB</h1><br>Witaj $name na stronie WSB";
    })->where(['name' => '[A-Za-z]+']);

    
});

Route::get('/', function () {
    return view('welcome' , ['name' => 'Anna', 'surname' => 'Nowak', 'city' => 'Poznań']);
});

Route::get('/loop', function () {
    //return view('loop');

    $car = [
        ['brand' => 'Ferrari', 'model' => 'F430', 'color' => 'red'],
        ['brand' => 'Fiat', 'model' => '126p', 'color' => 'white'],
        ['brand' => 'Porsche', 'model' => 'Panamera', 'color' => 'black']
    ];

    return view('loop', ['car' => $car]);
});

// 1) wyświetlenie formularza
Route::view('/userform', 'userform1');

// 2) wywołanie metody z kontrolera po wysłaniu formularza
Route::post('UserController', [UserController::class, 'account']);

Route::get('/user', function() {
    return view('user');
});
Route::post('UserController1', [UserController1::class, 'index']);

use App\Http\Controllers\WsbSite;
Route::get('/site', [WsbSite::class, 'index']);

//Kontroler, który wyświetli widok o nazwie: newcontroller (szablon, strony głównej), w pasku adresu użytkownik podaje swój wiek: 127.0.0.1:8000/wiek/20, wyświetl na stronie wiek użytkownika
use App\Http\Controllers\newcontroller;
Route::get('/page/{age}', [newcontroller::class, 'showAge']);

use App\Http\Controllers\HomeController;
Route::get('/home/{age?}', [HomeController::class, 'index']);

use App\Http\Controllers\PageController;
Route::get('/drives/{drive}', [PageController::class, 'show']);
Route::get('/drives', [PageController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/login');
})->name('logout');