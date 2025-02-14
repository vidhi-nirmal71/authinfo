<?php
    use Illuminate\Support\Facades\Route;
    use Itpathsolutions\Authinfo\Http\Controllers\AuthDetailsController;

    Route::get('/login-logs', [AuthDetailsController::class, 'index'])->name('login.logs');
    Route::get('/login-logs/fetch', [AuthDetailsController::class, 'fetchData'])->name('login.logs.fetch');
?>