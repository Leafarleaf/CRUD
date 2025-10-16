<?php

namespace App\Controllers;

use App\Models\Motorista;
use CodeIgniter\Controller;
use DateTime;

class Motoristas extends Controller
{
    protected $helpers = ['form'];

    public function index()
    {
        $model = new Motorista();
        $data['motoristas'] = $model->findAll();

        return view('motoristas/index', $data);
    }

    public function create()
    {
        return view('motoristas/create');
    }

    public function store()
    {
        $data = $this->request->getPost();

        $rules = [
            'cnh' => 'required|regex_match[/^[0-9]{11}$/]|is_unique[motoristas.cnh]',
            'nome' => 'required|min_length[3]',
            'data_nascimento' => 'required|valid_date[Y-m-d]',
        ];

        $messages = [
            'cnh' => [
                'required' => 'O campo CNH é obrigatório.',
            ],
            'nome' => [
                'required'    => 'O campo Nome é obrigatório.',
                'min_length'  => 'O nome deve ter no mínimo 3 caracteres.',
            ],
            'data_nascimento' => [
                'required'   => 'A data de nascimento é obrigatório.',
                'valid_date' => 'Formato de data inválido. Use YYYY-MM-DD.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Verificar idade
        $idade = date_diff(date_create($data['data_nascimento']), date_create('today'))->y;
        if ($idade < 18) {
            return redirect()->back()->withInput()->with('error', 'Motorista deve ter pelo menos 18 anos.');
        }

        $model = new Motorista();
        if (! $model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/motoristas')->with('success', 'Motorista cadastrado com sucesso.');
    }


    public function edit($cnh)
    {
        $model = new Motorista();
        $data['motorista'] = $model->find($cnh);
        return view('motoristas/edit', $data);
    }

    public function update($cnh)
    {
        $model = new Motorista();
        $data = $this->request->getPost();

        $idade = date_diff(date_create($data['data_nascimento']), date_create('today'))->y;
        if ($idade < 18) {
            return redirect()->back()->withInput()->with('error', 'Motorista deve ter pelo menos 18 anos.');
        }

        if (! $model->update($cnh, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/motoristas')->with('success', 'Motorista atualizado com sucesso.');
    }

    public function delete($cnh)
    {
        $model = new Motorista();
        $model->delete($cnh);

        return redirect()->to('/motoristas')->with('success', 'Motorista excluÃ­do.');
    }
}
