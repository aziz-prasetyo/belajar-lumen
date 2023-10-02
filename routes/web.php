<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'penjualan'], function () use ($router) {
    $router->get('/', function () {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mendapatkan semua data penjualan.',
            'data' => array(
                array(
                    'id' => '7XtY2wZa',
                    'nomor' => 'SALE-3fQx',
                    'customer' => 'Eka Jaya'
                ),
                array(
                    'id' => 'Z6mP9rLs',
                    'nomor' => 'SALE-v8nT',
                    'customer' => 'Gita Darma'
                ),
                array(
                    'id' => 'q3Wn5yRz',
                    'nomor' => 'SALE-1XcK',
                    'customer' => 'Indra Adi'
                ),
                array(
                    'id' => '4sF8mNpQ',
                    'nomor' => 'SALE-j7Lw',
                    'customer' => 'Joko Irawan'
                ),
                array(
                    'id' => 'R2y7LwX9',
                    'nomor' => 'SALE-W6pZ',
                    'customer' => 'Ahmad Gunawan'
                ),
                array(
                    'id' => 'n8T3fQxK',
                    'nomor' => 'SALE-mNpQ',
                    'customer' => 'Budi Hari'
                ),
                array(
                    'id' => 'j7Lw1XcZ',
                    'nomor' => 'SALE-yRzT',
                    'customer' => 'Citra Fitri'
                ),
                array(
                    'id' => 'W6pZv8nS',
                    'nomor' => 'SALE-2wZa',
                    'customer' => 'Dewi Cahya'
                ),
                array(
                    'id' => 'mNpQ3fQx',
                    'nomor' => 'SALE-9rLs',
                    'customer' => 'Eka Erlangga'
                ),
                array(
                    'id' => 'yRzT7XtY',
                    'nomor' => 'SALE-5yRz',
                    'customer' => 'Fajar Bintang'
                )
            )
        ]);
    });

    $router->get('/{id}', function ($id) {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mendapatkan data penjualan berdasarkan id.',
            'data' => array(
                'id' => $id,
                'nomor' => 'SALE-9rLs',
                'customer' => 'Muhammad Aziz Prasetyo'
            )
        ]);
    });

    $router->post('/', function (Request $request) {
        $nomor = $request->input('nomor');
        $customer = $request->input('customer');

        return response()->json([
            'status' => true,
            'message' => 'Berhasil membuat data penjualan baru.',
            'data' => array(
                'id' => '5Hku9xTu',
                'nomor' => $nomor,
                'customer' => $customer
            )
        ]);
    });

    $router->put('/{id}', function (Request $request, $id) {
        $nomor = $request->get('nomor');
        $customer = $request->get('customer');

        return response()->json([
            'status' => true,
            'message' => 'Berhasil memperbarui data penjualan berdasarkan id.',
            'data' => array(
                'id' => $id,
                'nomor' => $nomor,
                'customer' => $customer
            )
        ]);
    });

    $router->delete('/{id}', function ($id) {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil menghapus data penjualan berdasarkan id.'
        ]);
    });

    $router->get('/{id}/confirm', function (Request $request, $id) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'error' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengkonfirmasi penjualan berdasarkan id dan api_key.'
        ]);
    });

    $router->get('/{id}/send-email', function (Request $request, $id) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'error' => 'Unauthorized'
            ], 401);
        }

        Mail::raw('Ini adalah email body.', function ($message) {
            $message->to('azizcogan59@gmail.com')
                ->subject('Belajar Lumen by Aziz');
        });

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengirimkan email kepada user berdasarkan id.'
        ]);
    });
});
