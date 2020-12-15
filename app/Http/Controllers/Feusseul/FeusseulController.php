<?php

namespace App\Http\Controllers\Feusseul;

use App\Http\Controllers\Controller;
use App\Models\Feusseul;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class FeusseulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $feusseuls = Feusseul::where('user_id', Auth::user()->id)->get();
        return Inertia::render('Feusseul/Index', [
            'feusseuls' =>$feusseuls
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Feusseul/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg')
            {
                $file->move('uploads/', $filename);
            }
            else {
                $file->move('uploads/videos/', $filename);
            }
        } else {
            return back();
        }
        Feusseul::create([
            'titre' =>$request->input('titre'),
            'description' =>$request->input('description'),
            'contenu' =>$request->input('contenu'),
            'extension' => $extension,
            'user_id'=>Auth::user()->id,
            'file'=> $filename
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $feusseul = Feusseul::with('commentaires')->where('id', $id)->get();
        return Inertia::render('Feusseul/Show', [
            'feusseul' => $feusseul
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $feusseul = Feusseul::where('id', $id)->get();
        return Inertia::render('Feusseul/Edit', [
            'feusseul' => $feusseul
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg')
            {
                $file->move('uploads/', $filename);
            }
            else {
                $file->move('uploads/videos/', $filename);
            }
        } else {
            return back();
        }
        Feusseul::where('id', $id)->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'extension' => $extension,
            'file' => $filename
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Feusseul::find($id)->delete();
        return back();
    }

    public function displayAll()
    {
        $feusseuls = Feusseul::with('user')->get();
        return Inertia::render('Feusseul/ShowAll', [
            'feusseuls' => $feusseuls
        ]);
    }
}
