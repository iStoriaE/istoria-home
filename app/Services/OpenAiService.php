<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Responses\Threads\Runs\ThreadRunResponse;

class OpenAiService
{
    public function translate(string $text, array $langs): array|null
    {
        $langs = implode(',', $langs);
        $messages = [
            "Text: $text",
            "Languages: $langs",
        ];

        $thread = OpenAI::threads()->createAndRun([
            'assistant_id' => config('openai.assistant'),
            'thread' => [
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => implode("\r\n\r\n", $messages)
                    ]
                ],
            ]
        ]);

        return json_decode($this->get_response($thread), true);
    }

    private function get_response(ThreadRunResponse $thread): string|null
    {
        while (true) {
            $run = OpenAI::threads()->runs()->retrieve($thread->threadId, $thread->id);

            if ($run->status === 'completed') {
                $messages = OpenAI::threads()->messages()->list($thread->threadId);
                return $messages->data[0]->content[0]->text->value;
            } elseif ($run->status === 'failed') {
                Log::driver('ai')->error(json_encode($run->lastError->toArray()));
                return null;
            }
            sleep(5);
        }
    }
}
