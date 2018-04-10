<?php
namespace AvoRed\Subscribe\Http\Controllers\Admin;

use AvoRed\Ecommerce\Http\Controllers\Admin\AdminController;
use AvoRed\Subscribe\Models\Database\Subscribe;
use AvoRed\Subscribe\DataGrid\Subscribe as SubscribeGrid;
use AvoRed\Subscribe\Http\Requests\SubscribeRequest;

class SubscribeController extends AdminController
{
    /**
     * Display a listing of the Subscribe.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grid = new SubscribeGrid(Subscribe::query());

        return view('avored-subscribe::subscribe.index')->with('dataGrid', $grid->dataGrid);
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avored-subscribe::subscribe.create');
    }

    /**
     * Store a newly created subscribe in database.
     *
     * @param \AvoRed\Subscribe\Http\Requests\SubscribeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SubscribeRequest $request)
    {
        $request->merge(['email' => $request->get('subscribe_email')]);
        Subscribe::create($request->all());

        return redirect()->route('admin.subscribe.index');
    }

    /**
     * Show the form for editing the specified subscribe.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscribe = Subscribe::findorfail($id);

        //This is just for the Form to populate values
        $subscribe->subscribe_email = $subscribe->email;

        return view('avored-subscribe::subscribe.edit')->with('model', $subscribe);
    }

    /**
     * Update the specified subscribe in database.
     *
     * @param \AvoRed\Ecommerce\Http\Requests\Admin\Subscribe $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SubscribeRequest $request, $id)
    {
        $request->merge(['email' => $request->get('subscribe_email')]);
        $subscribe = Subscribe::findorfail($id);
        $subscribe->update($request->all());

        return redirect()->route('admin.subscribe.index');
    }

    /**
     * Remove the specified subscribe from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscribe::destroy($id);

        return redirect()->route('admin.subscribe.index');
    }
}
