<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index(): string
{
    // Instancie o model
    $model = new UsuarioModel();
    
    // Busque todos os registros da tabela 'usuarios'
    $data['usuarios'] = $model->findAll();
    
    // Adicione uma linha para imprimir o valor de $data['usuarios']
    // var_dump(value: $data['usuarios']);
    
    // Passe os dados para a view
    return view('home/dashboard', $data);
}
}
