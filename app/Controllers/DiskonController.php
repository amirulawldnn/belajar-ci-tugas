<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    public function __construct()
    {
        $this->diskon = new DiskonModel();
        helper('form');
    }

    public function index()
    {
        // Hanya admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/');
        }

        $data['diskon'] = $this->diskon->findAll();
        return view('v_diskon', $data);
    }

    public function save()
    {
        $rules = [
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->diskon->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['diskon'] = $this->diskon->find($id);
        return view('diskon/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->diskon->update($id, [
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->diskon->delete($id);
        return redirect()->to('/diskon')->with('success', 'Diskon berhasil dihapus.');
    }
}
