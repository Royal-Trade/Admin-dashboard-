<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;

class EditReport extends Component
{
    public $item_name, $item_code, $generic_item_name, $item_category, $department, $machine, $test_code, $test_name;
    public $supplier_name, $address, $manufacture, $hsn_code, $unit_of_perchase, $pack_size, $test, $unit_price, $cgst, $sgst, $price_gst;
    public $reportId, $deleteId; // For storing the current report ID for editing

    public function mount($id)
    {
        if ($id) {
            $this->edit($id); // Load the report details for editing
        }
    }

    public function edit($id)
    {
        $report = Report::find($id);

        if ($report) {
            $this->reportId = $report->id;
            $this->item_name = $report->item_name;
            $this->item_code = $report->item_code;
            $this->generic_item_name = $report->generic_item_name;
            $this->item_category = $report->item_category;
            $this->department = $report->department;
            $this->machine = $report->machine;
            $this->test_code = $report->test_code;
            $this->test_name = $report->test_name;
            $this->supplier_name = $report->supplier_name;
            $this->address = $report->address;
            $this->manufacture = $report->manufacture;
            $this->hsn_code = $report->hsn_code;
            $this->unit_of_perchase = $report->unit_of_perchase;
            $this->pack_size = $report->pack_size;
            $this->test = $report->test;
            $this->unit_price = $report->unit_price;
            $this->cgst = $report->cgst;
            $this->sgst = $report->sgst;
            $this->price_gst = $report->price_gst;
            return $this->render();
        } else {
            // Handle case when the report is not found
            session()->flash('error', 'Report not found.');
        }
    }

    public function render()
    {
        return view('livewire.edit-report');
    }
}
