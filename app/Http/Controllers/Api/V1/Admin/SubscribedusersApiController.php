<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscribeduserRequest;
use App\Http\Requests\UpdateSubscribeduserRequest;
use App\Http\Resources\Admin\SubscribeduserResource;
use App\Models\Subscribeduser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscribedusersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscribeduser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscribeduserResource(Subscribeduser::all());
    }

    public function store(StoreSubscribeduserRequest $request)
    {
        $subscribeduser = Subscribeduser::create($request->all());

        return (new SubscribeduserResource($subscribeduser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Subscribeduser $subscribeduser)
    {
        abort_if(Gate::denies('subscribeduser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscribeduserResource($subscribeduser);
    }

    public function update(UpdateSubscribeduserRequest $request, Subscribeduser $subscribeduser)
    {
        $subscribeduser->update($request->all());

        return (new SubscribeduserResource($subscribeduser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Subscribeduser $subscribeduser)
    {
        abort_if(Gate::denies('subscribeduser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscribeduser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
