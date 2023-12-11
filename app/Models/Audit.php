<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File; // Import the File facade

use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;


class Audit extends Model
{
    use HasFactory;
    use SchemalessAttributesTrait;

    protected static $templates = [];

    public $templateUsed = 'iso-55001-2014';



    protected $fillable = [
        'user_id',
        'year',
        'assessment'
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
            if (!isset($audit->templateUsed)) {
                throw new \InvalidArgumentException('Template must be specified for Audit model creation.');
            }

            if (!isset(static::$templates[$audit->templateUsed])) {
                throw new \InvalidArgumentException('Template does not exist.');
            }

            $audit->assessment = static::$templates[$audit->templateUsed];
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $schemalessAttributes = [
        'assessment',
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->assessment->modelScope();
    }
}
