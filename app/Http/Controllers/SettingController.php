<?php

namespace App\Http\Controllers;

use App\Setting;
use BladeView;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Setting $setting
     * @return void
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Setting $setting
     * @return BladeView|Factory|false|Application|View
     */
    public function edit(Setting $setting)
    {
        $setting = $setting->find(1);
        if ($setting == null) $setting = new Setting();
        return view('admin.settings.settings_view')->with('setting', $setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Setting $setting
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, Setting $setting)
    {
        $this->validate($request, [
            'website_name'      => 'required',
            'website_slogan'    => 'required',
            'website_email'     => 'required'
        ]);

        //Saving contact info to the database
        $setting = $setting->find(1);
        if ($setting == null) $setting = new Setting();
        $setting->website_name      = $request->input('website_name');
        $setting->website_slogan    = $request->input('website_slogan');
        $setting->website_email     = $request->input('website_email');

        $setting->save();

        return redirect('/admin/settings')->with('success', 'Settings updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return void
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
