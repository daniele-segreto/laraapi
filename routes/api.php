<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// UN'ALTRA POSSIBILITA' E' PRENDERE LA 'route::resource' di 'UsersController', IN 'web.php', E COPIARLA IN 'api.php':
Route::resource('users', UsersController::class);//->middleware('auth:sanctum')

// DIVERSO DAL VIDEO, SUL TUTORIAL E':
// Route::resource('users', UsersController::class)//->middleware('auth:api');

// con il ->middleware se facciamo ad esempio una chiamata 'http://127.0.0.1:8000/api/users', ci rimanda direttamete al login, questo perchè abbiamo la protezione dell' 'auth' (file che si trova nella cartella 'config')
// Per adesso non mettiamo una protezione (con ->middleware) perchè non stiamo ancora inviando 'json web token', quindi se andiamo per sempio su 'http://127.0.0.1:8000/api/users' vedremo la nostra lista di utentI (in formato json), invece che essere indirizzati al login.

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// DIVERSO DAL VIDEO, SUL TUTORIAL E':
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
