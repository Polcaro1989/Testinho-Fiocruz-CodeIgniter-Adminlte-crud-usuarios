<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class CadastrarController extends Controller
{
    public function add()
    {
        return view('cadastrar/project-cadastrar');
    }

    public function store()
{
    $model = new UsuarioModel();

    // Valida o formulário usando as regras definidas no Validation.php
    $validation = \Config\Services::validation();
    if (!$this->validate($validation->getRuleGroup('usuarioRules'))) {
        // Se a validação falhar, retorna erros em formato JSON
        return $this->response->setJSON([
            'success' => false,
            'errors' => $this->validator->getErrors()
        ]);
    }

    // Adiciona o usuário ao banco de dados
    $model->save([
        'nome' => $this->request->getPost('nome'),
        'email' => $this->request->getPost('email'),
        'senha' => password_hash($this->request->getPost('senha'), PASSWORD_BCRYPT), // Hash da senha
        'perfil' => $this->request->getPost('perfil')
    ]);

    // Retorna uma resposta em formato JSON
    return $this->response->setJSON([
        'success' => true,
        'message' => 'Usuário cadastrado com sucesso!'
    ]);
}

}
