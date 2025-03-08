<?php declare(strict_types=1);

use App\Http\Api\Authentication;
use App\Http\Api\TemperatureManagement;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth',
], function (Router $router) {
    $router->post('issue-access-token', Authentication\IssueAccessToken\Controller::class);
    $router->delete('revoke-access-token', Authentication\RevokeAccessToken\Controller::class)->middleware('auth');
});

Route::group([
    'prefix' => 'temperatures',
    'middleware' => 'auth',
], function (Router $router) {
    $router->post('', TemperatureManagement\CreateTemperature\Controller::class);
    $router->get('', TemperatureManagement\ListTemperatures\Controller::class);
});
