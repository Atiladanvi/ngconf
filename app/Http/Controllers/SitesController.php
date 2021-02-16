<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SitesController extends Controller
{
    public function index()
    {
        return Inertia::render('Sites', [
            'sites' => Site::all(),
        ]);
    }

    public function update($id, Request $request)
    {
        $site = Site::find($id);
        $data = $request->except(['_id']);
        $this->sync($data, $site);

        return Redirect::back();
    }

    public function store(Request $request)
    {
        $site = new Site();
        $data = $request->all();
        $this->sync($data, $site);

        return Redirect::back();
    }

    public function destroy($id)
    {
        Site::destroy($id);

        return Redirect::back();
    }

    private function sync($data, $site)
    {
        $keys = array_keys($data);
        foreach ($keys as $key){
            if (is_array($data[$key])){
                $ka = array_keys($data[$key]);
                foreach ($ka as $k){
                    if (is_array($data[$key][$k])){
                        $kb = array_keys($data[$key][$k]);
                        foreach ($kb as $k1){
                            $data[$key][$k]['default'] = $data[$key][$k]['computed'] ?? $data[$key][$k]['value'];
                            $data[$key][$k]['value'] = $data[$key][$k]['value'] ?? $data[$key][$k]['default'];
                            $data[$key][$k]['computed'] = $data[$key][$k]['computed'] ?? '';
                        }
                    }
                }
            }
            $site[$key] = $data[$key];
        }
        $site->save();
    }
}
