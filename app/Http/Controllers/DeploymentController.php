<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class DeploymentController extends Controller
{
    /**
     * Handle deployment setup tasks via browser.
     * Use this in environments without SSH access (e.g. cPanel).
     * 
     * Required Query Param: ?token=YOUR_DEPLOYMENT_TOKEN
     * Required Query Param: ?action=storage-link|migrate|optimize
     */
    public function setup(Request $request)
    {
        $token = config('app.deployment_token');
        
        if (!$token || $request->query('token') !== $token) {
            Log::warning('Unauthorized deployment setup attempt detected from IP: ' . $request->ip());
            abort(403, 'Unauthorized. Please check your DEPLOYMENT_TOKEN.');
        }

        $action = $request->query('action');
        $output = '';

        try {
            switch ($action) {
                case 'storage-link':
                    Artisan::call('storage:link');
                    $output = Artisan::output();
                    break;

                case 'migrate':
                    Artisan::call('migrate', ['--force' => true]);
                    $output = Artisan::output();
                    break;

                case 'optimize':
                    Artisan::call('optimize');
                    $output = Artisan::output();
                    break;

                default:
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid action. Supported: storage-link, migrate, optimize'
                    ], 400);
            }

            return response()->json([
                'status' => 'success',
                'action' => $action,
                'output' => $output
            ]);

        } catch (\Exception $e) {
            Log::error('Deployment setup error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
