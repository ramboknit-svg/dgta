<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
{
    if ($request->getMethod() === 'OPTIONS') {
        return response('', 204)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    $allowedMethods = ['GET', 'POST'];

    if (!in_array(strtoupper($request->method()), $allowedMethods)) {
        Log::warning("Security: Blocked {$request->method()} request to {$request->path()}");

        return response('Method Not Allowed', 405)
            ->header('Allow', 'GET, POST');
    }

    // ✅ STEP 1: Generate NONCE BEFORE rendering view
    $nonce = base64_encode(random_bytes(16));

    // ✅ STEP 2: Store globally
    app()->instance('cspNonce', $nonce);

    // ✅ STEP 3: Call next ONLY ONCE
    $response = $next($request);

    // ========== SECURITY HEADERS ==========

    $response->headers->remove('Server');
    $response->headers->remove('Expires');
    $response->headers->remove('X-Powered-By');
    $response->headers->remove('X-AspNet-Version');

    // ✅ CSP with SAME nonce
    $response->headers->set(
        'Content-Security-Policy',
        "default-src 'self'; " .
		
          "script-src 'self' 'nonce-{$nonce}' https://dgta.army.mil; " .
        "style-src 'self' 'nonce-{$nonce}'; " .
        "img-src 'self' data:; " .
        "font-src 'self' data:; " .
        "frame-ancestors 'self'; " .
        "base-uri 'self' ;" .
        "form-action 'self';"
    );
     $response->headers->set('Access-Control-Allow-Origin', 'https://iam4.army.mil');
    $response->headers->set('X-Frame-Options', 'DENY');
    $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
    $response->headers->set('X-Content-Type-Options', 'nosniff');
    $response->headers->set('X-XSS-Protection', '1; mode=block');

    if ($request->isSecure()) {
        $response->headers->set(
            'Strict-Transport-Security',
            'max-age=31536000; includeSubDomains; preload'
        );
    }

    return $response;
}
}
