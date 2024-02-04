<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use PhpParser\Node\Expr\Throw_;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // Handler arror database connection
    // public function render($request, Throwable $exception)
    // {
    //     if($exception instanceof QueryException && $request->expectsJson()) {
    //         return response()->json(['error' => 'Database error'], 500);
    //     }

    //     if ($exception instanceof QueryException) {
    //         // Tangani kesalahan koneksi database di sini
    //         Log::error('Kesalahan koneksi database: ' . $exception->getMessage());
    //         // Tampilkan pesan umum kepada pengguna
    //         return response()->view('errors.500', [], 500);
    //     }

    //     return parent::render($request, $exception);
    // }
}