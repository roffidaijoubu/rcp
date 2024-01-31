<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;


use \GuzzleHttp\Client as HttpClient;

class Dashboard extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    protected $fillable=['name','workbook_name','view_name','site_name','category','order_column','icon','is_custom_page','custom_page'];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    // Request unique-ticket from Tableau Server
    public static function signIn($client_ip)
    {
        // Request ticket
        $http = new HttpClient();
        $url = env('TABLEAU_SERVER_URL') . '/trusted';
        $username = env('TABLEAU_USERNAME');
        $data = [
            'username' => $username,
            'client_ip' => '192.168.84.107'
        ];
        $method = 'POST';
        $response = $http->request($method, $url, [
            'form_params' => $data
        ]);
        $body = (string) $response->getBody();
        // Store session
        if ($body != '-1') {
            return $body;
        }
        // Sign in failed
        return false;
    }

    // Get Tableau Dashboard HTML code from Tableau Server
    public static function getViewUrl($ticket, $view, $workbook, $site = null)
    {
        if ($site == null) {
            $url = env('TABLEAU_SERVER_URL') . "/trusted/$ticket/views/$workbook/$view" . "?:embed=yes";
        } else {
            $url = env('TABLEAU_SERVER_URL') . "/trusted/$ticket/t/$site/views/$workbook/$view" . "?:embed=yes";
        }
        return $url;
    }
}
