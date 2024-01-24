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
        $assesmentArrayLength = count($assesmentArray);

        // count how many keys in $assesmentArray[]->items[]->score is not 0
        $filled = 0;
        foreach ($assesmentArray as $key => $value) {
            foreach ($value['items'] as $key => $value) {
                if ($value['score'] != 0) {
                    $filled++;
                }
            }
        }
        // if $filled is equal to $assesmentArrayLength, then return empty string
        if ($filled == $assesmentArrayLength) {
            return '';
        } else {
            // return $filled/$assesmentArrayLength
            return $filled . '/' . $assesmentArrayLength;
        }
    }

    protected static function boot(){
        parent::boot();

        static::loadTemplates();

        static::creating(function ($audit) {

            // set the user_id to the current user
            if (!isset($audit->user_id)){
                if (auth()->user()->isAdmin()){
                    $audit->user_id = auth()->user()->id;
                }
            }
            // // Check if $templateUsed is set
            // if (!isset($audit->template)) {
            //     throw new \InvalidArgumentException('Template must be specified for Audit model creation.');
            // }

            // if (!isset(static::$templates[$audit->template])) {
            //     throw new \InvalidArgumentException('Template does not exist.');
            // }

            // hardcode template to iso-55001-2014
            $audit->template = 'iso-55001-2014';
            $audit->assessment = json_encode(static::$templates[$audit->template]);

            // // Generate 'name' from year_satker_area_author_timestamp
            // $user = auth()->user();
            // $usernameSlug = \Illuminate\Support\Str::slug($user->name, '_');
            // $audit->name = strtoupper($audit->year . '_' . $audit->satker . '_' . $audit->area . '_' . $usernameSlug . '_' . time());

        });

        static::updating(function($audit){
            //prevent template from being changed
            if($audit->isDirty('template')){
                throw new \InvalidArgumentException('Template cannot be changed.');
            }

        });
    }

    //prevent template from being changed


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
