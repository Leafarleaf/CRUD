<?php

namespace App\Controllers;

use App\Models\Veiculo;

class Veiculos extends BaseController
{
    protected $veiculoModel;

    public function __construct()
    {
        $this->veiculoModel = new Veiculo(); // ? usando o model singular
    }

    public function index()
    {
        $data['veiculos'] = $this->veiculoModel->findAll();
        return view('veiculos/index', $data);
    }

    public function create()
    {
        return view('veiculos/create');
    }

    public function store()
    {
        $data = $this->request->getPost();

        $rules = [
            'modelo'           => 'required',
            'ano'              => 'required|integer|greater_than[1900]',
            'data_aquisicao'   => 'required|valid_date[Y-m-d]',
            'km_aquisicao'     => 'required|integer',
            'renavam'          => 'required|is_unique[veiculos.renavam]',
            'placa'            => 'required|is_unique[veiculos.placa]',
        ];

        $messages = [
            'modelo' => [
                'required'     => 'Por favor, informe o modelo do veículo.',
            ],
            'ano' => [
                'required'     => 'O ano do veículo é obrigatório.',
                'integer'      => 'O ano deve ser um número inteiro.',
                'greater_than' => 'Informe um ano valido maior que 1900.',
            ],
            'data_aquisicao'   => [
                'required'     => 'Informe a data de aquisicão do veículo.',
                'valid_date'   => 'Formato inválido para data. Use AAAA-MM-DD.',
            ],
            'km_aquisicao' => [
                'required'     => 'Informe o KM no momento da aquisição.',
                'integer'      => 'O KM deve ser um número inteiro.',
            ],
            'renavam' => [
                'required'     => 'O campo Renavam é obrigatório.',
                'is_unique'    => 'Ja existe um renavam com esse número'
            ],
            'placa' => [
                'required'     => 'Informe a placa do veículo.',
                'is_unique'    => 'Ja existe uma placa com esse número'
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $anoModelo = (int)$data['ano'];
        $anoAquisicao = (int)date('Y', strtotime($data['data_aquisicao']));

        if ($anoAquisicao < $anoModelo) {
            return redirect()->back()->withInput()->with('errors', [
                'data_aquisicao' => 'O ano da aquisição nÃo pode ser anterior ao ano do modelo.'
            ]);
        }

        $veiculoModel = new \App\Models\Veiculo();
        $veiculoModel->insert($data);

        return redirect()->to('/veiculos');
    }

    public function edit($id)
    {
        $data['veiculo'] = $this->veiculoModel->find($id);
        return view('veiculos/edit', $data);
    }

    public function update($id)
    {
        $this->veiculoModel->update($id, $this->request->getPost());
        return redirect()->to('/veiculos');
    }

    public function delete($id)
    {
        $this->veiculoModel->delete($id);
        return redirect()->to('/veiculos');
    }

    public function show($id)
    {
        $data['veiculo'] = $this->veiculoModel->find($id);

        if (!$data['veiculo']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Veículo não encontrado: $id");
        }

        return view('veiculos/show', $data);
    }
}
