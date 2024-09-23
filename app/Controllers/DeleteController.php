<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class DeleteController extends Controller
{
    public function delete($id)
    {
        $model = new UsuarioModel();

        // Verifica se o usuário existe
        $usuario = $model->find($id);
        if (!$usuario) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Usuário não encontrado!'
            ]);
        }

        // Tenta excluir o usuário
        if ($model->delete($id)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Usuário excluído com sucesso!'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Erro ao excluir o usuário!'
            ]);
        }
    }
}
