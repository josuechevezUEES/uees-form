<?php

namespace App\Http\Controllers;

use App\Models\ClienteClass;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI as ApiOpenAI;
use OpenAI\Responses\Completions\CreateResponse;

class ChatOpenAiController extends Controller
{
    public $functionCall;

    public function index(Request $request)
    {
        $content = $request->q;

        $completion = ApiOpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'temperature' => 0,
            'max_tokens' => 60,
            'top_p' => 1,
            'frequency_penalty' => 0.5,
            'presence_penalty' => 0,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant.'
                ],
                [
                    'role' => 'user',
                    'content' => $content
                ]
            ],
            'functions' => [
                [
                    'name' => 'busarCifEstudiante',
                    'description' => 'Buscar informacion de estudiante por medio de su Carnet o CIF',
                    'parameters' => [
                        'type' => 'object',
                        'properties' => [
                            'cif' => [
                                'type' => 'string',
                                'description' => 'Numero de carnet o cif del estudiante. ejemplo 1721652017 o 17-2165-2027'
                            ]
                        ],
                        'required' => ['cif']
                    ]
                ]
            ],
            'function_call' => 'auto'
        ]);

        $functionCall = $completion->choices[0]->message->functionCall;

        if (isset($functionCall->name)) {
            if ($functionCall->name == 'busarCifEstudiante') {
                $buscar_informacion = $this->busarCifEstudiante($content);

                if ($buscar_informacion->count()) {
                    return response()->json([
                        'res' => $buscar_informacion->first(),
                    ], 200);
                } else {
                    return response()->json([
                        'res' => "You will be provided with a message, and your task is to respond using emojis only.",
                    ], 404);
                }
            }
        } else {
            return response()
                ->json([
                    'res' => $completion->choices[0]->message->content
                ], 200);
        }
    }

    public function busarCifEstudiante(string $cif)
    {
        return ClienteClass::where('CLICUN', $cif)->get();
    }
}
