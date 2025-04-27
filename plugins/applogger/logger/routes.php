<?php
namespace AppLogger\Logger\Classes\Routes;

use AppLogger\Logger\Models\Log;
use Illuminate\Support\Facades\Route;


// Route pre získanie všetkých logov
Route::get('/logs', function() {
    // Získať všetky logy z databázy
    $logs = Log::all();

    // Vrátiť logy ako JSON odpoveď
    return response()->json($logs);
});

// Route pre získanie logu podľa ID
Route::get('/logs/{id}', function($id) {
    // Získať log podľa ID z databázy
    $log = Log::findOrFail($id);

    // Skontrolovať, či log existuje
    if (!$log) {
        return response()->json(['message' => 'Log not found'], 404);
    }

    // Vrátiť log ako JSON odpoveď
    return response()->json($log);
});

// Route pre vytvorenie nového logu
Route::post('/logs', function() {
    $log = new Log();

    $data = request()->all();

    $log->fill($data);

    $log->save();

    return $log;
});
