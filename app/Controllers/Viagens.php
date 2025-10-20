<?php

namespace App\Controllers;

use App\Models\Motorista;
use App\Models\Veiculo;
use App\Models\Viagem;
use App\Models\MotoristaViagem;

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
        $viagemModel = new Viagem();
        $veiculoModel = new Veiculo();
        $motoristaViagemModel = new MotoristaViagem();

        $viagens = $viagemModel->where('finalizada', false)->findAll();

        $viagensFinalizadas = $viagemModel->where('finalizada', true)->findAll();

        $formatarMotoristas = function ($viagemId) use ($motoristaViagemModel) {
            $motoristas = $motoristaViagemModel
                ->distinct()
                ->select('motoristas.nome, motoristas.cnh')
                ->join('motoristas', 'motoristas.id = viagem_motoristas.motorista_id')
                ->where('viagem_id', $viagemId)
                ->findAll();

            $motoristasFormatados = [];
            foreach ($motoristas as $motorista) {
                $motoristasFormatados[] = $motorista['nome'] . ' (' . $motorista['cnh'] . ')';
            }

            return $motoristasFormatados;
        };

        foreach ($viagens as &$viagem) {
            $veiculo = $veiculoModel->find($viagem['veiculo_id']);
            $viagem['placa'] = $veiculo['placa'] ?? 'Indisponível';
            $viagem['modelo'] = $veiculo['modelo'] ?? 'Indisponível';

            $viagem['motoristas'] = $formatarMotoristas($viagem['id']);
        }

        foreach ($viagensFinalizadas as &$viagem) {
            $veiculo = $veiculoModel->find($viagem['veiculo_id']);
            $viagem['placa'] = $veiculo['placa'] ?? 'Indisponível';
            $viagem['modelo'] = $veiculo['modelo'] ?? 'Indisponível';

            $viagem['motoristas'] = $formatarMotoristas($viagem['id']);
        }

        return view('viagens/index', [
            'viagens' => $viagens,
            'viagensFinalizadas' => $viagensFinalizadas,
        ]);
    }

    public function store()
    {
        $viagemModel = new Viagem();
        $motoristaViagemModel = new MotoristaViagem();
        $motoristaModel = new Motorista();

        $data = [
            'veiculo_id'  => $this->request->getPost('veiculo_id'),
            'km_inicio'   => $this->request->getPost('km_inicio'),
            'data_inicio' => $this->request->getPost('data_inicio'),
            'finalizada'  => false,
        ];

        $viagemModel->insert($data);
        $viagemId = $viagemModel->getInsertID();

        $motoristas = $this->request->getPost('motoristas');

        if (is_array($motoristas)) {
            foreach ($motoristas as $cnh) {
                $motorista = $motoristaModel->where('cnh', $cnh)->first();

                if ($motorista) {
                    $motoristaViagemModel->insert([
                        'viagem_id'    => $viagemId,
                        'motorista_id' => $motorista['id'],
                    ]);
                }
            }
        }

        return redirect()->to('/viagens')->with('success', 'Viagem criada com sucesso!');
    }

    public function edit($id)
    {
        $viagemModel = new Viagem();
        $viagem = $viagemModel->find($id);

        if (!$viagem) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Viagem não encontrada");
        }

        return view('viagens/finalizar', ['viagem' => $viagem]);
    }

    public function update($id)
    {
        $viagemModel = new Viagem();

        $viagem = $viagemModel->find($id);

        if (!$viagem) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Viagem não encontrada");
        }

        $kmFim = (int) $this->request->getPost('km_fim');
        $dataFim = $this->request->getPost('data_fim');

        if ($kmFim < $viagem['km_inicio']) {
            return redirect()->back()->withInput()->with('error', 'KM final não pode ser menor que o KM inicial.');
        }

        if (strtotime($dataFim) < strtotime($viagem['data_inicio'])) {
            return redirect()->back()->withInput()->with('error', 'Data de fim não pode ser anterior a data de início.');
        }

        $data = [
            'km_fim'     => $kmFim,
            'data_fim'   => $dataFim,
            'finalizada' => true,
        ];

        $viagemModel->update($id, $data);

        return redirect()->to('/viagens')->with('success', 'Viagem finalizada com sucesso!');
    }
}
