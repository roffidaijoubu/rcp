<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function updateAssessment(Request $request, $id)
    {
        $audit = Audit::findOrFail($id);
        $audit->assessment = $this->calculateAggScore($request->assessment);
        $audit->save();

        return response()->json(['message' => 'Assessment updated successfully']);
    }

    protected function calculateAggScore($assessment)
    {
        foreach ($assessment as $key => $value) {
            $totalScore = 0;
            $count = 0;
            foreach ($value['items'] as $item) {
                $totalScore += (int)$item['score'];
                $count++;
            }
            $assessment[$key]['agg_score'] = ($count > 0) ? ($totalScore / $count) : 0;
        }
        return $assessment;
    }

    // add function and route to update audit year, area, and satker
    public function updateAuditInfo(Request $request, $id)
    {
        $audit = Audit::findOrFail($id);
        // $audit->name = $request->name;
        $audit->year = $request->year;
        $audit->area = $request->area;
        $audit->satker = $request->satker;
        $audit->save();

        // if success, redirect to audit index page
        if ($audit) {
            return redirect()->route('audits');
        } else {
            return redirect()->back();
        }
    }

    // function to create new audit
    public function createAudit(Request $request)
    {
        $audit = new Audit();
        $audit->year = $request->year;
        $audit->area = $request->area;
        $audit->satker = $request->satker;
        $audit->user_id = auth()->user()->id;
        $audit->save();

        // if success, redirect to audit index page
        if ($audit) {
            return redirect()->route('audits');
        } else {
            return redirect()->back();
        }
    }


}
