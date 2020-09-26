<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Files;
use App\Helper\Reply;
use App\Company;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Company\StoreCompany;
use App\Job;

class AdminCompanyController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('menu.company_profile');
        $this->pageIcon = 'icon-film';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * @param StoreCompany $request
     * @return array
     * @throws \Exception
     */
    public function store(StoreCompany $request)
    {
        abort_if(!$this->user->can('add_company'), 403);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = Files::upload($request->logo, 'company-logo');
        } else {
            unset($data['logo']);
        }

        Company::create($data);

        return Reply::redirect(route('admin.company.index'), __('menu.companies') . ' ' . __('messages.createdSuccessfully'));
    }

    public function edit($id)
    {
        abort_if(!$this->user->can('edit_company'), 403);

        $this->company = Company::find($id);
        return view('admin.company.edit', $this->data);
    }

    /**
     * @param StoreCompany $request
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function update(StoreCompany $request, $id)
    {
        abort_if(!$this->user->can('edit_company'), 403);

        $data =  $request->all();

        $setting = Company::findOrFail($id);

        if ($request->hasFile('logo')) {
            $data['logo'] = Files::upload($request->logo, 'company-logo');
        } else {
            unset($data['logo']);
        }

        $setting->update($data);

        if($setting->status != $request->input('status')) {
            Job::where('company_id', $id)->update(['status' => $request->status]);
        }

        return Reply::redirect(route('admin.company.edit',1), __('menu.company_profile') . ' ' . __('messages.updatedSuccessfully'));
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        return redirect()->back();
    }

    public function data()
    {
        return redirect()->back();
    }
}
