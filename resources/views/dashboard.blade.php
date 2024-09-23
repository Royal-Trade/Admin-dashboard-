<title>Dashboard</title>

<!-- Search Input -->
<input wire:model.debounce.300ms="search" type="text" placeholder="Search Reports...">
<p>Search: {{ $search }}</p>

<!-- Tab Navigation (using Alpine.js) -->
<div x-data="{ activeTab: 'details' }" class="tabs">
  
    <!-- Tab content -->
    <div class="tabs-content">
        <!-- Details Tab -->
        <div class="tab-content" id="details">
            <div class="m-2">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Code</th>
                                <th scope="col">Generic Item Name</th>
                                <th scope="col">Item Category</th>
                                <th scope="col">Department</th>
                                <th scope="col">Machine</th>
                                <th scope="col">Test Code</th>
                                <th scope="col">Test Name</th>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Manufacture</th>
                                <th scope="col">HSN Code</th>
                                <th scope="col">Unit of Purchase</th>
                                <th scope="col">Pack Size</th>
                                <th scope="col">Test</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">CGST</th>
                                <th scope="col">SGST</th>
                                <th scope="col">Price (GST)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td>{{ $report->item_name }}</td>
                                    <td>{{ $report->item_code }}</td>
                                    <td>{{ $report->generic_item_name }}</td>
                                    <td>{{ $report->item_category }}</td>
                                    <td>{{ $report->department }}</td>
                                    <td>{{ $report->machine }}</td>
                                    <td>{{ $report->test_code }}</td>
                                    <td>{{ $report->test_name }}</td>
                                    <td>{{ $report->supplier_name }}</td>
                                    <td>{{ $report->address }}</td>
                                    <td>{{ $report->manufacture }}</td>
                                    <td>{{ $report->hsn_code }}</td>
                                    <td>{{ $report->unit_of_purchase }}</td>
                                    <td>{{ $report->pack_size }}</td>
                                    <td>{{ $report->test }}</td>
                                    <td>{{ $report->unit_price }}</td>
                                    <td>{{ $report->cgst }}</td>
                                    <td>{{ $report->sgst }}</td>
                                    <td>{{ $report->price_gst }}</td>
                                    <td>
                                        <a href="{{ route('reports.edit', $report->id) }}">Edit</a>
                                        <span wire:click="confirmDelete('{{ $report->id }}')">Delete</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Delete Confirmation Modal -->
                @if($confirmingDelete)
                    <div class="alert alert-warning">
                        <p>Are you sure you want to delete this report?</p>
                        <button wire:click="delete" class="btn btn-danger">Yes, Delete</button>
                        <button wire:click="$set('confirmingDelete', false)" class="btn btn-secondary">Cancel</button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Company Tab -->
        <div x-show="activeTab === 'company'" class="tab-content" id="company">
            <p>Company Information</p>
        </div>

        <!-- Team Tab -->
        <div x-show="activeTab === 'team'" class="tab-content" id="team">
            <p>Team Details</p>
        </div>
    </div>
</div>

<!-- Styles for responsive table -->
<style>
.table-responsive {
    max-height: 400px;
    overflow-y: auto;
}
</style>
