<?php
namespace AppLogger\Logger\Classes\Routes;

use AppLogger\Logger\Models\Log;
use Illuminate\Support\Facades\Route;

// Route pre získanie všetkých logov
Route::get('/logs', function() {
    $logs = Log::all();
    return $logs;
});

// Route pre získanie logu podľa ID
Route::get('/logs/{id}', function($id) {
    $log = Log::findOrFail($id);
    return $log;
});

// Route pre vytvorenie nového logu
Route::post('/logs', function() {
    $log = new Log();
    $data = post();
    $log->fill($data);

    $arrivalTimestamp = strtotime($data['arrival']);
    $currentTime = date('H:i:s');
    $isLate = $arrivalTimestamp > strtotime($currentTime . ' 08:00:00');
    $log->late = $isLate;

    $log->save();

    return response()->json([
        'log' => $log,
        'is_late' => $log->late
    ]);
});
