<?php
namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;

class SearchReports extends Component
{
    public $searchTest = '';
    public $searchItem = '';
    public $reports = []; // Public property to hold filtered reports

    public function mount() // Fetch all reports when the component is mounted
    {
        $this->reports = Report::all(); // Load all records initially
    }

    public function updatedSearchTest() // Triggered when the searchTest changes
    {
        $this->searchFeedMessage(); // Call the search method when input changes
    }

    public function searchFeedMessage()
    {
        if ($this->searchTest !== '') {
            // Filter reports based on search input
            $this->reports = Report::where('test', 'like', '%' . $this->searchTest . '%')->get();
        } else {
            // Reset reports to show all records when the search input is empty
            $this->reports = Report::all(); 
        }
    }

    public function updatedSearchItem() // Triggered when the searchTest changes
    {
        $this->searchItemReports(); // Call the search method when input changes
    }

    public function searchItemReports()
    {
        if ($this->searchItem !== '') {
            // Filter reports based on search input
            $this->reports = Report::where('item_name', 'like', '%' . $this->searchItem . '%')->get();
        } else {
            // Reset reports to show all records when the search input is empty
            $this->reports = Report::all(); 
        }
    }

    public function render()
    {
        // Pass the current reports to the view
        return view('livewire.search-reports', ['reports' => $this->reports]);
    }
}
