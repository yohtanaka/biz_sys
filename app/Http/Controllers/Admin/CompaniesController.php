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

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['s_name']    = $request->name;
        $data['s_order']   = $request->order;
        $data['companies'] = Company::nameIn('name', $data['s_name'])
                                  ->changeOrder($data['s_order'])
                                  ->paginate (10);
        return view('admin.companies.index', $data);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(CompanyRequest $request)
    {
        $data = $this->putPostData($request);
        return view('admin.companies.create', $data);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data['value'] = Company::findOrFail($id);
        return view('admin.companies.create', $data);
    }

    /**
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = $this->addParams($company);
        $data    = $this->putOldInput($company);
        return view('admin.companies.create', $data);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id)->delete();
        return redirect()->route('admin.company.index');
    }
}
