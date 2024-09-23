<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios'; // Nome da tabela
    protected $primaryKey = 'id';  // Nome da coluna primária

    protected $allowedFields = ['nome', 'email', 'senha', 'perfil']; // Campos que podem ser preenchidos
    protected $beforeInsert = ['hashPassword']; // Callback para antes da inserção
    protected $beforeUpdate = ['hashPassword']; // Callback para antes da atualização

    protected $returnType = 'array'; // Pode ser 'array' ou 'object'
    protected $useTimestamps = true; // Define como true se você estiver usando timestamps

    protected $skipValidation = false; // Define como true se não precisar de validação

    /**
     * Hash da senha antes da inserção ou atualização
     *
     * @param array $data
     * @return array
     */
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['senha'])) {
            $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_BCRYPT);
        }
        return $data;
    }

    /**
     * Método para deletar um usuário
     *
     * @param int $id
     * @return bool
     */
    public function deletarUsuario($id)
    {
        // Verifica se o usuário existe antes de deletar
        $usuario = $this->find($id);

        var_dump($usuario); // Adiciona isso para verificar o conteúdo de $usuario
        
        if ($usuario) {
            // Exclui o usuário
            return $this->delete($id);
        }

        // Retorna false se o usuário não for encontrado
        return false;
    }
    

}
