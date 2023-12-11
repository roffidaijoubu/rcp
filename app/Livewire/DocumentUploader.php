<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class DocumentUploader extends Component
{
    use WithFileUploads;

    public $assetCriteria;
    public $availability;
    public $system;

    private function uploadToApi($document, $apiEndpoint) {

        // dd($document, $apiEndpoint);
        // Sending the document to the API
        $response = Http::attach(
            'document', $document->getRealPath(), $document->getClientOriginalName()
        )->post($apiEndpoint);

        // Handle the response...
        dd($response);
    }

    public function uploadAssetCriteria() {
        $this->validate([
            'assetCriteria' => 'required|file|max:10240', // max 10MB
        ]);
        $this->uploadToApi($this->assetCriteria, 'https://crp-dm.pgn.co.id/document/asset-criteria');
    }

    public function uploadAvailability() {
        $this->validate([
            'availability' => 'required|file|max:10240', // max 10MB
        ]);
        $this->uploadToApi($this->availability, 'https://crp-dm.pgn.co.id/document/availability');
    }

    public function uploadSystem() {
        $this->validate([
            'system' => 'required|file|max:10240', // max 10MB
        ]);
        $this->uploadToApi($this->system, 'https://crp-dm.pgn.co.id/document/system');
    }

    public function render() {
        return view('livewire.document-uploader');
    }
}
