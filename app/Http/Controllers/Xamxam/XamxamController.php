<?php

namespace App\Http\Controllers\Xamxam;

use App\Http\Controllers\Controller;
use App\Models\Xamxam;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class XamxamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response|\Inertia\Response
     */
    public function index()
    {
        $xamxams = Xamxam::where('user_id', Auth::user()->id)->get();
        return Inertia::render('Xamxam/Display', [
            'xamxams' => $xamxams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|\Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Xamxam/Index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $xamxam = new Xamxam();
        $xamxam->titre = $request->input('titre');
        $xamxam->tags = $request->input('tags');
        $xamxam->contenu = $request->input('contenu');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $xamxam->image = $filename;
        } else {
            return back();
        }
        $xamxam->user_id = Auth::user()->id;
        $xamxam->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $xamxam = Xamxam::where('id', $id)->get();
//        dd($xamxam);
        return Inertia::render('Xamxam/Show',
            [
                'xamxam' => $xamxam
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response|\Inertia\Response
     */
    public function edit($id)
    {
        $xamxam = Xamxam::where('id', $id)->get();
        return Inertia::render('Xamxam/Edit', [
            'xamxam' => $xamxam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Xamxam $xamxam
     * @return RedirectResponse|Response
     */
    public function update(Request $request, Xamxam $xamxam, $id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);

            Xamxam::where('id', $id)->update([
                'titre' => $request->titre,
                'tags' => $request->tags,
                'contenu' => $request->contenu,
                'image' => $filename
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Xamxam $xamxam
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(Xamxam $xamxam, $id)
    {
        Xamxam::where('id', $id)->delete();
        return back();
    }

    public function xamxamAll()
    {
        $xamxams = Xamxam::with('user')->orderByDesc("created_at")->get();
        return Inertia::render('Xamxam/DisplayAll', [
            'xamxams' => $xamxams
        ]);
    }
}
