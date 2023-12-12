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
}
