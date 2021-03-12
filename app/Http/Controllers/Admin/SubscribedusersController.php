<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubscribeduserRequest;
use App\Http\Requests\StoreSubscribeduserRequest;
use App\Http\Requests\UpdateSubscribeduserRequest;
use App\Models\Subscribeduser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscribedusersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscribeduser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscribedusers = Subscribeduser::all();

        return view('admin.subscribedusers.index', compact('subscribedusers'));
    }

    public function create()
    {
        abort_if(Gate::denies('subscribeduser_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscribedusers.create');
    }

    public function store(StoreSubscribeduserRequest $request)
    {
        $subscribeduser = Subscribeduser::create($request->all());

        return redirect()->route('admin.subscribedusers.index');
    }

    public function edit(Subscribeduser $subscribeduser)
    {
        abort_if(Gate::denies('subscribeduser_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscribedusers.edit', compact('subscribeduser'));
    }

    public function update(UpdateSubscribeduserRequest $request, Subscribeduser $subscribeduser)
    {
        $subscribeduser->update($request->all());

        return redirect()->route('admin.subscribedusers.index');
    }

    public function show(Subscribeduser $subscribeduser)
    {
        abort_if(Gate::denies('subscribeduser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscribedusers.show', compact('subscribeduser'));
    }

    public function destroy(Subscribeduser $subscribeduser)
    {
        abort_if(Gate::denies('subscribeduser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscribeduser->delete();

        return back();
    }

    public function massDestroy(MassDestroySubscribeduserRequest $request)
    {
        Subscribeduser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
