<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GitHubWebhookService
{
    public static function triggerDeploy(): bool
    {
        $token = config('services.github.token');

        if (!$token) {
            Log::warning('GitHub webhook not configured. Set GITHUB_TOKEN and GITHUB_REPO in .env');
            return false;
        }

        $astro_sa_response = Http::withToken($token)
            ->withHeaders(['Accept' => 'application/vnd.github+json'])
            ->post("https://api.github.com/repos/iStoriaE/istoria-astro-sa/dispatches", [
                'event_type' => 'filament_update',
            ]);
        
        $onboarding_response = Http::withToken($token)
            ->withHeaders(['Accept' => 'application/vnd.github+json'])
            ->post("https://api.github.com/repos/iStoriaE/istoria-onboarding/dispatches", [
                'event_type' => 'filament_update',
            ]);

        return $astro_sa_response->status() === 204 && $onboarding_response->status() === 204;
    }
}
