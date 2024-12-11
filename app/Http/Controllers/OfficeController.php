<?php

namespace App\Http\Controllers;

use App\Http\Repository\OfficeRepository;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    private $officeRepository;

    public function __construct(OfficeRepository $officeRepository)
    {
        $this->officeRepository = $officeRepository;
    }

    public function office(Request $request)
    {
        $office = $this->officeRepository->get();
        return view('backoffice.office.index', compact('office'));
    }

    public function update(Request $request)
    {
        $office = $this->officeRepository->update($request);
        return redirect()->back()->with('success', 'Data sudah diubah');
    }
}
