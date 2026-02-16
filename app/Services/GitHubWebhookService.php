<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GitHubWebhookService
{
    public static function triggerDeploy(): bool
    {
        $token = config('services.github.token');
        $repo = config('services.github.repo');

        if (!$token || !$repo) {
            Log::warning('GitHub webhook not configured. Set GITHUB_TOKEN and GITHUB_REPO in .env');
            return false;
        }

        $response = Http::withToken($token)
            ->withHeaders(['Accept' => 'application/vnd.github+json'])
            ->post("https://api.github.com/repos/{$repo}/dispatches", [
                'event_type' => 'content-updated',
            ]);

        return $response->status() === 204;
    }
}
