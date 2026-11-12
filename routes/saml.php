<?php

use App\Http\Controllers\SamlController;
use Illuminate\Support\Facades\Route;

Route::prefix('saml')->name('saml.')->group(function () {
    Route::match(['get', 'post'],'/login', [SamlController::class, 'sso'])->name('sso');
    Route::match(['get', 'post'], '/acs', [SamlController::class, 'acs'])->name('acs');
    Route::get('/logout', [SamlController::class, 'slo'])->name('slo');
    Route::match(['get', 'post'], '/sls', [SamlController::class, 'sls'])->name('sls');
    Route::get('/metadata', [SamlController::class, 'metadata'])->name('metadata');
    Route::get('/attributes', [SamlController::class, 'attributes'])->name('attributes');
    Route::get('/logout-success', [SamlController::class, 'logoutSuccess'])->name('logout-success');
	Route::get('/iam-confirm', [SamlController::class, 'iamConfirm'])->name('iam.confirm');
	
});
