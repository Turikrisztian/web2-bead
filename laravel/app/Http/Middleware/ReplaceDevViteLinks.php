<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplaceDevViteLinks
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        // Futtassuk minden környezetben, hogy biztosan ne maradjanak dev-szerveres linkek.

        $contentType = $response->headers->get('Content-Type');
        if (!$contentType || stripos($contentType, 'text/html') === false) {
            return $response;
        }

        $html = $response->getContent();
        if (!is_string($html)) {
            return $response;
        }

        $manifestPath = public_path('build/manifest.json');
        $cssFile = $jsFile = null;
        if (is_file($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);
            $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
            $jsFile = $manifest['resources/js/app.js']['file'] ?? null;
        }

        // If any dev-server markers are present, rewrite them to production assets.
        $patterns = [
            '#https?://\[::1\]:5174/resources/js/app\.js#',
            '#https?://\[::1\]:5174/resources/css/app\.css#',
            '#/resources/js/app\.js#',
            '#/resources/css/app\.css#',
            '#https?://\[::1\]:5174/@vite/client#',
            '#/@vite/client#',
        ];

        $replaced = false;
        if ($jsFile) {
            $html = preg_replace($patterns[0], asset('build/'.$jsFile), $html, -1, $count0);
            $html = preg_replace($patterns[2], asset('build/'.$jsFile), $html, -1, $count2);
            $replaced = $replaced || ($count0 ?? 0) > 0 || ($count2 ?? 0) > 0;
        }
        if ($cssFile) {
            $html = preg_replace($patterns[1], asset('build/'.$cssFile), $html, -1, $count1);
            $html = preg_replace($patterns[3], asset('build/'.$cssFile), $html, -1, $count3);
            $replaced = $replaced || ($count1 ?? 0) > 0 || ($count3 ?? 0) > 0;
        }
        // Remove vite client script if present
        $html = preg_replace($patterns[4], '', $html, -1, $count4);
        $html = preg_replace($patterns[5], '', $html, -1, $count5);
        $replaced = $replaced || ($count4 ?? 0) > 0 || ($count5 ?? 0) > 0;

        if ($replaced) {
            $response->setContent($html);
        }

        return $response;
    }
}
