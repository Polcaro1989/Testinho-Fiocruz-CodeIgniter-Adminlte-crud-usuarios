<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public array $usuarioRules = [
        'nome' => [
            'rules' => 'required|max_length[40]|is_unique[usuarios.nome,id,{id}]',
            'errors' => [
                'required' => 'O campo nome é obrigatório.',
                'is_unique' => 'O nome já está registrado.',
                'max_length' => 'O campo nome deve ter no máximo 40 caracteres.',
            ],
        ],
        'email' => [
            'rules' => 'required|valid_email|max_length[40]|is_unique[usuarios.email,id,{id}]',
            'errors' => [
                'required' => 'O campo email é obrigatório.',
                'valid_email' => 'O email fornecido não é válido.',
                'is_unique' => 'O email já está registrado.',
                'max_length' => 'O campo email deve ter no máximo 40 caracteres.',
            ],
        ],
        'senha' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'O campo senha é obrigatório.',
                'min_length' => 'A senha deve ter pelo menos 8 caracteres.',
            ],
        ],
        'perfil' => [
            'rules' => 'required|in_list[Administrador,Convidado]',
            'errors' => [
                'required' => 'O campo perfil é obrigatório.',
                'in_list' => 'O perfil selecionado é inválido.',
            ],
        ],
    ];
    
}
