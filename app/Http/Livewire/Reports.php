<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ReportsImport;
use Illuminate\Support\Facades\Response;


class Reports extends Component
{
    public $item_name, $item_code, $generic_item_name, $item_category, $department, $machine, $test_code, $test_name;
    public $supplier_name, $address, $manufacture, $hsn_code, $unit_of_perchase, $pack_size, $test, $unit_price, $cgst, $sgst, $price_gst;
    public $reportId, $reports, $file; // For storing the current report ID for editing
    public $isEditing = false;

    public function mount($id = null) 
    {
        if ($id) {
            $this->edit($id); 
        }
    }

    public function bulkImport()
    {
        $this->validate(['file' => 'required|mimes:xlsx,csv']);
        Excel::import(new ReportsImport, $this->file);
        session()->flash('success', 'Reports imported successfully.');
        $this->emit('fileUploaded');
    }

    public function submit()
    {
        // $this->validate($this->rules());
        Report::create( [
            'item_category'      => $this->item_category,
            'generic_item_name'  => $this->generic_item_name,
            'item_name'          => $this->item_name,
            'item_code'          => $this->item_code,
            'department'         => $this->department,
            'machine'            => $this->machine,
            'test_code'          => $this->test_code,
            'test_name'          => $this->test_name,
            'supplier_name'      => $this->supplier_name,
            'address'            => $this->address,
            'manufacture'        => $this->manufacture,
            'hsn_code'           => $this->hsn_code,
            'unit_of_perchase'   => $this->unit_of_perchase,
            'pack_size'          => $this->pack_size,
            'test'               => $this->test,
            'unit_price'         => $this->unit_price,
            'cgst'               => $this->cgst,
            'sgst'               => $this->sgst,
            'price_gst'          => $this->price_gst,
        ]);
        session()->flash('success', 'Report created successfully.');
        $this->resetInputFields();
    }

    public function updateReport()
    {
        $this->validate($this->rules());
        $report = Report::find($this->reportId);
        $report->update($this->formData());
        session()->flash('success', 'Report updated successfully.');
        $this->isEditing = false;
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $report = Report::find($id);
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
        return view('livewire.reports',['isEditing' => $this->isEditing]);
    }
    public function download()
    {
        $filePath = public_path('assets/bulkimport.xlsx'); 

        return Response::download($filePath);
    }
    public function resetInputFields()
    {
        $this->item_name = '';
        $this->item_code = '';
        $this->generic_item_name = '';
        $this->item_category = '';
        $this->department = '';
        $this->machine = '';
        $this->test_code = '';
        $this->test_name = '';
        $this->supplier_name = '';
        $this->address = '';
        $this->manufacture = '';
        $this->hsn_code = '';
        $this->unit_of_perchase = '';
        $this->pack_size = '';
        $this->test = '';
        $this->unit_price = '';
        $this->cgst = '';
        $this->sgst = '';
        $this->price_gst = '';
    }

    protected function rules()
    {
        return [
            'item_name' => 'required|string',
            'item_code' => 'required|string',
            'generic_item_name' => 'nullable|string',
            'item_category' => 'nullable|string',
            'department' => 'nullable|string',
            'machine' => 'nullable|string',
            'test_code' => 'nullable|string',
            'test_name' => 'nullable|string',
            'supplier_name' => 'nullable|string',
            'address' => 'nullable|string',
            'manufacture' => 'nullable|string',
            'hsn_code' => 'nullable|string',
            'unit_of_perchase' => 'nullable|string',
            'pack_size' => 'nullable|string',
            'test' => 'nullable|string',
            'unit_price' => 'nullable|numeric',
            'cgst' => 'nullable|numeric',
            'sgst' => 'nullable|numeric',
            'price_gst' => 'nullable|numeric',
        ];
    }

    public function render()
    {
        return view('livewire.reports');
    }
}
