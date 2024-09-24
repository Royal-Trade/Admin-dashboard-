<div>
    <input wire:model.debounce.300ms="searchTest" class="outline-none bg-[#F0F2F5] rounded-md pl-16 py-1 w-[26vw] mr-2" placeholder="Search Test Name" type="text" id="search">
    <input wire:model.debounce.300ms="searchItem" class="outline-none bg-[#F0F2F5] rounded-md pl-16 py-1 w-[26vw] mr-2" placeholder="Search Item Name" type="text" id="search">

    <div class="tabs-content">
        <div x-show="activeTab === 'details'" class="tab-content" id="details">
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
                                        <!-- Action buttons can be added here -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div x-show="activeTab === 'company'" class="tab-content" id="company">
            <p>Company</p>
        </div>

        <div x-show="activeTab === 'team'" class="tab-content" id="team">
            <p>Team</p>
        </div>
    </div>
</div>
