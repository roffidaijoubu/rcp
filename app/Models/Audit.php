<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File; // Import the File facade

use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use WendellAdriel\Lift\Lift;
use WendellAdriel\Lift\Attributes\Fillable;
use WendellAdriel\Lift\Attributes\Immutable;
use WendellAdriel\Lift\Attributes\Cast;



class Audit extends Model
{
    use HasFactory;
    // use SchemalessAttributesTrait;
    use Lift;

    protected static $templates = [];



    protected $fillable = [
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

    protected static function boot(){
        parent::boot();

        static::loadTemplates();

        static::creating(function ($audit) {

            // Check if $templateUsed is set
            if (!isset($audit->template)) {
                throw new \InvalidArgumentException('Template must be specified for Audit model creation.');
            }

            if (!isset(static::$templates[$audit->template])) {
                throw new \InvalidArgumentException('Template does not exist.');
            }

            $audit->assessment = json_encode(static::$templates[$audit->template]);
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
