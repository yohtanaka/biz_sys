<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;
use App\Traits\FormTrait;

class CompaniesController extends Controller
{
    use FormTrait;

    public function index(Request $request)
    {
        $data =[];
        // $data = $this->searchCompany($request);
        return view('admin.companies.index', $data);
    }

    public function create()
    {
        $data = $this->beforeCreate();
        return view('admin.companies.create', $data);
    }

    public function confirm(CompanyRequest $request)
    {
        $data = $this->beforeConfirm($request);
        return view('admin.companies.create', $data);
    }

    public function store(Request $request)
    {
        $data    = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.company.create')->withInput($data);
        }
        $data    = $this->formatParams($data);
        $company = Company::create($data);
        return redirect()->route('admin.company.index');
    }

    public function show(Request $request, $id)
    {
        $data          = $this->beforeShow($request);
        $data['value'] = Company::findOrFail($id);
        return view('admin.companies.create', $data);
    }

    public function edit(Company $company)
    {
        $company = $this->addParams($company);
        $data    = $this->beforeEdit($company);
        return view('admin.companies.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data    = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.company.edit', ['id' => $id ])->withInput($data);
        }
        $data    = $this->formatParams($data);
        $company = Company::findOrFail($id)->update($data);
        return redirect()->route('admin.company.index');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id)->delete();
        return redirect()->route('admin.company.index');
    }
}
