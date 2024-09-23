<div>
@if (session()->has("success"))
            <div class="text-green-700"> {{ session("success") }}</div>
        @endif
    <form wire:submit.prevent="bulkImport">
        <input type="file" wire:model="file">
        @error('file') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Import Reports</button>
    </form>
    <a href="{{ route('download.testfile') }}" class="btn btn-primary">Download Test File</a>
    <div class="text-center flex-column">
        <div>
            <u>
                DATA
            </u>
        </div>
        @if (session()->has("vaaa"))
            <div class="text-green-700"> {{ session("vaaa") }}</div>
        @endif
        <form wire:submit.prevent="submit">
        <div class="row mt-5">
                <!-- Item Category -->
                <div class="form-group row">
                    <label for="itemCategory" class="col-sm-2 col-form-label">Item Category</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="itemCategory" placeholder="Item Category" wire:model="item_category">
                    </div>
                </div>

                <!-- Generic Item Name -->
                <div class="form-group row">
                    <label for="genericItemName" class="col-sm-2 col-form-label">Generic Item Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="genericItemName" placeholder="Generic Item Name" wire:model="generic_item_name">
                    </div>
                </div>

                <!-- Item Name -->
                <div class="form-group row">
                    <label for="itemName" class="col-sm-2 col-form-label">Item Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="itemName" placeholder="Item Name" wire:model="item_name">
                    </div>
                </div>

                <!-- Item Code -->
                <div class="form-group row">
                    <label for="itemCode" class="col-sm-2 col-form-label">Item Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="itemCode" placeholder="Item Code" wire:model="item_code">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mt-5">
                <!-- Department -->
                <div class="form-group row">
                    <label for="department" class="col-sm-2 col-form-label">Department</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="department" placeholder="Department" wire:model="department">
                    </div>
                </div>

                <!-- Machine -->
                <div class="form-group row">
                    <label for="machine" class="col-sm-2 col-form-label">Machine</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="machine" placeholder="Machine" wire:model="machine">
                    </div>
                </div>

                <!-- Test Code -->
                <div class="form-group row">
                    <label for="testCode" class="col-sm-2 col-form-label">Test Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="testCode" placeholder="Test Code" wire:model="test_code">
                    </div>
                </div>

                <!-- Test Name -->
                <div class="form-group row">
                    <label for="testName" class="col-sm-2 col-form-label">Test Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="testName" placeholder="Test Name" wire:model="test_name">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mt-5">
                <!-- Supplier Name -->
                <div class="form-group row">
                    <label for="supplierName" class="col-sm-2 col-form-label">Supplier Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="supplierName" placeholder="Supplier Name" wire:model="supplier_name">
                    </div>
                </div>

                <!-- Address -->
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" placeholder="Address" wire:model="address">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mt-5">
                <!-- Manufacture -->
                <div class="form-group row">
                    <label for="manufacture" class="col-sm-2 col-form-label">Manufacture</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="manufacture" placeholder="Manufacture" wire:model="manufacture">
                    </div>
                </div>

                <!-- HSN Code -->
                <div class="form-group row">
                    <label for="hsnCode" class="col-sm-2 col-form-label">HSN Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hsnCode" placeholder="HSN Code" wire:model="hsn_code">
                    </div>
                </div>

                <!-- Unit of Purchase -->
                <div class="form-group row">
                    <label for="unitOfPurchase" class="col-sm-2 col-form-label">Unit of Purchase</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="unitOfPurchase" placeholder="Unit of Purchase" wire:model="unit_of_perchase">
                    </div>
                </div>

                <!-- Pack Size -->
                <div class="form-group row">
                    <label for="packSize" class="col-sm-2 col-form-label">Pack Size</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="packSize" placeholder="Pack Size" wire:model="pack_size">
                    </div>
                </div>

                <!-- Unit Price -->
                <div class="form-group row">
                    <label for="unitPrice" class="col-sm-2 col-form-label">Unit Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="unitPrice" placeholder="Unit Price" wire:model="unit_price">
                    </div>
                </div>

                <!-- CGST -->
                <div class="form-group row">
                    <label for="cgst" class="col-sm-2 col-form-label">CGST</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cgst" placeholder="CGST" wire:model="cgst">
                    </div>
                </div>

                <!-- SGST -->
                <div class="form-group row">
                    <label for="sgst" class="col-sm-2 col-form-label">SGST</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="sgst" placeholder="SGST" wire:model="sgst">
                    </div>
                </div>

                <!-- Price with GST -->
                <div class="form-group row">
                    <label for="priceGst" class="col-sm-2 col-form-label">Price with GST</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="priceGst" placeholder="Price with GST" wire:model="price_gst">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="col-sm-2 text-center btn btn-primary mb-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    Livewire.on('fileUploaded', () => {
        const input = document.querySelector('input[type="file"]');
        if (input) {
            input.value = ''; // Clear the file input manually
        }
    });
</script>
