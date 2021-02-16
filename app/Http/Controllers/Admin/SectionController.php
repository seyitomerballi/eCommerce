<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Auth;
use Illuminate\Http\Request;
use Session;

class SectionController extends Controller
{
    public function sections()
    {
        Session::put('page', 'sections');
        $sections = Section::all();
        //dd($sections->toArray());
        return view('admin.sections.sections', compact('sections'));
    }

    public function updateSectionStatus()
    {
        if (request()->ajax()) {
            $data = request()->all();
            if ($data['status'] === "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Section::where('id', $data['section_id'])->update(['status' => $status]);
            $responseData = ['status' => $status, 'section_id' => $data['section_id']];
            return response()->json($responseData);
        }

        /*
        $data = $request->all();
        echo "<pre>"; print_r($data); die;
        */
    }
}
