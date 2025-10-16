<?php

namespace App\Controllers;

use App\Models\Viagem;
use App\Models\Motorista;
use App\Models\Veiculo;

class Viagens extends BaseController
{
    public function create()
    {
        $motoristaModel = new Motorista();
        $veiculoModel = new Veiculo();

        $data['motoristas'] = $motoristaModel->findAll();
        $data['veiculos'] = $veiculoModel->findAll();

        return view('viagens/create', $data);
    }

    public function index()
    {
        $viagemModel = new \App\Models\Viagem();
        $veiculoModel = new \App\Models\Veiculo();

        // Buscando viagens ativas (não finalizadas)
        $viagens = $viagemModel->where('finalizada', false)->findAll();

        // Buscando viagens finalizadas
        $viagensFinalizadas = $viagemModel->where('finalizada', true)->findAll();

        // Adiciona modelo e placa para viagens ativas
        foreach ($viagens as &$viagem) {
            $veiculo = $veiculoModel->find($viagem['veiculo_id']);
            $viagem['placa'] = $veiculo ? $veiculo['placa'] : 'Não disponível';
            $viagem['modelo'] = $veiculo ? $veiculo['modelo'] : 'Não disponível';
        }

        // Adiciona modelo e placa para viagens finalizadas
        foreach ($viagensFinalizadas as &$viagem) {
            $veiculo = $veiculoModel->find($viagem['veiculo_id']);
            $viagem['placa'] = $veiculo ? $veiculo['placa'] : 'Não disponível';
            $viagem['modelo'] = $veiculo ? $veiculo['modelo'] : 'Não disponível';
        }

        // Enviar para a view
        return view('viagens/index', [
            'viagens' => $viagens,
            'viagensFinalizadas' => $viagensFinalizadas
        ]);
    }

    public function store()
    {
        $viagemModel = new Viagem();

        $data = [
            'motorista_cnh' => $this->request->getPost('motorista_cnh'),
            'veiculo_id'    => $this->request->getPost('veiculo_id'),
            'km_inicio'     => $this->request->getPost('km_inicio'),
            'data_inicio'   => $this->request->getPost('data_inicio'),
        ];

        $viagemModel->insert($data);

        return redirect()->to('/viagens');
    }

    public function edit($id)
    {
        $viagemModel = new \App\Models\Viagem();
        $viagem = $viagemModel->find($id);

        if (!$viagem) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Viagem não encontrada");
        }

        return view('viagens/finalizar', ['viagem' => $viagem]);
    }

    public function update($id)
    {
        $viagemModel = new \App\Models\Viagem();

        $data = [
            'km_fim'     => $this->request->getPost('km_fim'),
            'data_fim'   => $this->request->getPost('data_fim'),
            'finalizada' => true
        ];

        $viagemModel->update($id, $data);

        return redirect()->to('/viagens')->with('success', 'Viagem finalizada com sucesso!');
    }
}
