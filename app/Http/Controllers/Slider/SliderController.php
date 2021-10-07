<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Models\Sliders;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Sliders::paginate(10);
        return view('pages.manageSlider.slider_index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.manageSlider.slider_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Slider\SliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        $sliders = new Sliders();
        $slider = $data['slider']->getClientOriginalName();
        $sliderName = time().'_'.$slider;
        try {
            $sliders->create([
                'title' => $data['title'],
                'description' => $data['description'],
                'name' => $sliderName
            ]);
            $data['slider']->storeAs('public/images/slider', $sliderName);
            $success = 'Add slider success';
            return redirect()
                ->route('slider.index')
                ->with('success', $success);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'Add slider fail';
        }
        return back()->with('error',$error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Sliders::findOrFail($id);
        return view('pages.manageSlider.slider_edit', [
            'slider' => $slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Slider\SliderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $data = $request->validated();
        $sliders = Sliders::findOrFail($id);
        $sliderImgOld = Storage::files('public/images/slider',$sliders->name);
        $sliderImgNew = time().'_'.$data['slider']->getClientOriginalName();
        $values = [
            'title' => $data['title'],
            'description' => $data['description'],
            'name' => $sliderImgNew
        ];
        try {
            $sliders->update($values);
            $success = 'Update slider success';
            $data['slider']->storeAs('public/images/slider', $sliderImgNew);
            Storage::delete($sliderImgOld);
            return redirect()
                ->route('slider.index')
                ->with('success',$success);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'Update slider failed';
            return back()->with('error',$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Sliders::findOrFail($id);
        try
        {
            $slider->delete();
            if(Storage::exists('public/images/slider/'.$slider->name)) {
                Storage::delete('public/images/slider/'.$slider->name);
            }
            $success = 'Delete slider success';
            return redirect()->route('slider.index')
                ->with('success', $success);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'Delete slider failed';
        }
        return back()->with('error', $error);
    }
}
