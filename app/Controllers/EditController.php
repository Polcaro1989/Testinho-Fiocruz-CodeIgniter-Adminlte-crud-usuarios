<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class EditController extends Controller
{
    public function edit($id = null)
    {
        if ($id === null) {
            return redirect()->to('/');
        }

        $model = new UsuarioModel();
        $usuario = $model->find($id);

        if ($usuario === null) {
            return redirect()->to('/');
        }

        $data['usuario'] = $usuario;

        return view('editar/project-edit', $data);
    }

    public function update($id = null)
    {
        if ($id === null) {
            return $this->response->setJSON(['success' => false, 'error' => 'ID inválido!'])->setStatusCode(400);
        }
    
        $model = new UsuarioModel();
    
        // Verifica se o usuário existe
        $usuario = $model->find($id);
        if (!$usuario) {
            return $this->response->setJSON(['success' => false, 'error' => 'Usuário não encontrado!'])->setStatusCode(404);
        }
    
        // Valida o formulário usando as regras definidas no Validation.php
        $validation = \Config\Services::validation();
        if (!$this->validate($validation->getRuleGroup('usuarioRules'))) {
            // Se a validação falhar, retorna os erros em formato JSON
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }
    
        // Obtém os dados do formulário
        $data = [
            'nome'     => $this->request->getPost('nome'),
            'email'    => $this->request->getPost('email'),
            'perfil'   => $this->request->getPost('perfil'),
        ];
    
        // Atualiza a senha apenas se foi fornecida
        $senha = $this->request->getPost('senha');
        if (!empty($senha)) {
            $data['senha'] = password_hash($senha, PASSWORD_BCRYPT); // Criptografa a senha
        }
    
        // Atualiza o usuário no banco de dados
        if ($model->update($id, $data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Usuário editado com sucesso!'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Falha ao atualizar usuário!'
            ])->setStatusCode(500);
        }
    }
    

}
