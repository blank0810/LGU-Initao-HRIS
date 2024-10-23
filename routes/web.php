<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\FileController;

Route::get('/', [RouteController::class, 'getLogin']);

Route::get('/dashboard', [RouteController::class, 'getDashboard']);

Route::get('/employees', [RouteController::class, 'getEmployee']);

Route::get('/leave', [RouteController::class, 'getLeave']);

Route::get('/travel', [RouteController::class, 'getTravel']);

Route::get('/slip', [RouteController::class, 'getSlip']);

Route::get('/payroll', [RouteController::class, 'getPayroll']);

Route::post('/print-leave', [FileController::class, 'generatePdf']);

Route::get('/print-travel', [FileController::class, 'printTravel']);

Route::get('/print-slip', [FileController::class, 'printSlip']);

Route::get('/print-job-order-payslip', [FileController::class, 'printJobOrderPayslip']);

Route::get('/print-regular-payslip', [FileController::class, 'printRegularPayslip']);