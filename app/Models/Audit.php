<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File; // Import the File facade

use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
// use WendellAdriel\Lift\Lift;
// use WendellAdriel\Lift\Attributes\Fillable;
// use WendellAdriel\Lift\Attributes\Immutable;
// use WendellAdriel\Lift\Attributes\Cast;



class Audit extends Model
{
    use HasFactory;
    // use SchemalessAttributesTrait;
    // use Lift;

    protected static $templates = [];



    protected $fillable = [
        // 'name',
        'satker',
        'area',
        'year',
        'user_id',
        'year',
        'assessment',
        'template',
    ];



    public static function getAssessementSummaryBySatkerAndYear($satker, $year){
        $audits = Audit::where('satker', $satker)->where('year', $year)->get();
        $assessmentAggregate = [];
        foreach ($audits as $audit) {
            $assessment = $audit->getAggregatedAssessment();
        }
    }
    public static function assessmentAggregate(){
        $audits = Audit::all();
        $assessmentAggregate = [];
        foreach ($audits as $audit) {
            $assessment = $audit->getAggregatedAssessment();
            $assessmentAggregate[$audit->id] = $assessment;
        }
        return json_encode($assessmentAggregate);
    }

    // Static Funtion to get converted score of all year of an Satker
    public static function getConvertedScoreBySatker($satker){
        $audits = Audit::where('satker', $satker)->where('area', '!=', 'TARGET')->get();
        $convertedScores = [];
        foreach ($audits as $audit) {
            $year = $audit->year;
            $convertedScores[$year] = $audit->getConvertedScore();
        }
        // sort by year, ascending
        ksort($convertedScores);
        return ($convertedScores);
    }

    // Static Funtion to get converted score of all year for all Satker
    public static function getConvertedScoreByAllSatker(){
        $satkers = static::getAllSatker();
        $convertedScores = [];
        foreach ($satkers as $satker) {
            $convertedScores[$satker] = static::getConvertedScoreBySatker($satker);
        }
        return $convertedScores;
    }

    public static function getAllSatker(){
        $audits = Audit::where('area', '!=', 'TARGET')->get();
        $satkers = [];
        foreach ($audits as $audit) {
            $satkers[] = $audit->satker;
        }
        return array_reverse(array_unique($satkers));
    }

    public function getTotalScore(){
        // sum all scores in audit assessment
        $assessment = json_decode($this->assessment, true);
        $totalScore = 0;
        foreach ($assessment as $key => $value) {
            foreach ($value['items'] as $item) {
                $totalScore += (int)$item['score'];
            }
        }
        return $totalScore;
    }

    public function getConvertedScore($constant = 4.81){
        // convert total score to 100
        $totalScore = $this->getTotalScore();
        $convertedScore = $totalScore * $constant;
        return $convertedScore;
    }
    protected static function loadTemplates()
    {
        $files = File::files(resource_path('templates')); // Assuming your templates are stored in resources/templates

        foreach ($files as $file) {
            $templateName = basename($file->getFilename(), '.json');
            $content = json_decode(File::get($file->getPathname()), true);
            static::$templates[$templateName] = $content;
        }
    }

    public function getAssessmentFilledStatus()
    {
        $assesment = $this->assessment;
        // parse $assesment json string to array
        $assesmentArray = json_decode($assesment, true);
        // length of $assesmentArray
        $assesmentArrayLength = 0;
        $filled = 0;
        foreach ($assesmentArray as $key => $value) {
            foreach ($value['items'] as $key => $value) {
                $assesmentArrayLength++;
                if ($value['score'] != 0) {
                    $filled++;
                }
            }
        }
        // if $filled is equal to $assesmentArrayLength, then return empty string
        if ($filled == $assesmentArrayLength) {
            return '✓';
        } else {
            // return $filled/$assesmentArrayLength
            return $filled . '/' . $assesmentArrayLength;
        }
    }

    // when audit is updated, run getAggregatedAssessment() to calculate agg_score
    public function update(array $attributes = [], array $options = [])
    {
        $attributes['assessment'] = $this->getAggregatedAssessment();
        return parent::update($attributes, $options);
    }

    protected function getAggregatedAssessment()
    {
        $assessment = json_decode($this->assessment, true);
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

    public static function getClauseAggregatedAssessmentBySatkerAndYear($satker, $year)
    {
        $audits = Audit::where('satker', $satker)->where('year', $year)->get();
        $assessmentAggregate = [];
        foreach ($audits as $audit) {
            $assessmentArray = [];
            $assessment = $audit->getAggregatedAssessment();
            // only return text and agg_score
            foreach ($assessment as $key => $value) {
                $assessmentArray[$key]['clause'] = $value['clause'];
                $assessmentArray[$key]['label'] = $value['clause']." ".$value['text'];
                $assessmentArray[$key]['value'] = $value['agg_score'];
            }

            $assessmentAggregate[$audit->area] = $assessmentArray;
        }
        // return $audits;
        return $assessmentAggregate;
    }

    public static function getAveragedClauseAggregatedAssessmentBySatkerAndYear($satker, $year)
    {
        //average the values of each clause from getClauseAggregatedAssessmentBySatkerAndYear()
        $clauseAggregatedAssessment = static::getClauseAggregatedAssessmentBySatkerAndYear($satker, $year);
        $averagedClauseAggregatedAssessment = [];
        foreach ($clauseAggregatedAssessment as $area => $assessmentArray) {
            foreach ($assessmentArray as $key => $value) {

                $averagedClauseAggregatedAssessment[$key]['clause'] = $value['clause'];
                $averagedClauseAggregatedAssessment[$key]['label'] = $value['label'];
                if (!isset($averagedClauseAggregatedAssessment[$key]['value'])) {
                    $averagedClauseAggregatedAssessment[$key]['value'] = $value['value'];
                } else {
                    $averagedClauseAggregatedAssessment[$key]['value'] = ($averagedClauseAggregatedAssessment[$key]['value'] + $value['value']) / 2;
                }
            }
        }
        return $averagedClauseAggregatedAssessment;
    }

    public static function getTargetsBySatker($satker){
        $audits = Audit::where('satker', $satker)->where('area', 'TARGET')->get();
        $targetAggregate = [];
        foreach ($audits as $audit) {
            $assessmentArray = [];
            $assessment = $audit->getAggregatedAssessment();
            // only return text and agg_score
            foreach ($assessment as $key => $value) {
                $assessmentArray[$key]['clause'] = $value['clause'];
                $assessmentArray[$key]['label'] = $value['clause']." ".$value['text'];
                $assessmentArray[$key]['value'] = $value['agg_score'];
            }

            $targetAggregate["{$audit->year} - Target"] = $assessmentArray;
        }
        // return $audits;
        return $targetAggregate;
    }

    protected static function boot(){
        parent::boot();

        static::loadTemplates();

        static::creating(function ($audit) {

            // set the user_id to the current user
            if (!isset($audit->user_id)){
                $audit->user_id = auth()->user()->id;
            }

            // Check if an audit with the same year, satker, and area already exists
            $existingAudit = Audit::where('year', $audit->year)
                                  ->where('satker', $audit->satker)
                                  ->where('area', $audit->area)
                                  ->first();
            if ($existingAudit) {
                throw new \InvalidArgumentException('An audit with the same year, satker, and area already exists.');
            }

            // hardcode template to iso-55001-2014
            $audit->template = 'iso-55001-2014';
            $audit->assessment = json_encode(static::$templates[$audit->template]);
        });

        static::updating(function($audit){
            //prevent template from being changed
            if($audit->isDirty('template')){
                throw new \InvalidArgumentException('Template cannot be changed.');
            }
            //prevent changing to an existing year, satker, and area
            if($audit->isDirty('year') || $audit->isDirty('satker') || $audit->isDirty('area')){
                $existingAudit = Audit::where('year', $audit->year)
                                      ->where('satker', $audit->satker)
                                      ->where('area', $audit->area)
                                      ->first();
                if ($existingAudit) {
                    throw new \InvalidArgumentException('An audit with the same year, satker, and area already exists.');
                }
            }
        });
    }




    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // protected $schemalessAttributes = [
    //     'assessment',
    // ];

    // public function scopeWithExtraAttributes(): Builder
    // {
    //     return $this->assessment->modelScope();
    // }

}
