<div>
    @if (session()->has("success"))
        <div class="text-green-700"> {{ session("success") }}</div>
    @endif
    <div class="flex-col"> 
        <form wire:submit.prevent="submit">
            <div class="row mt-5">
                @foreach(['item_category', 'generic_item_name', 'item_name', 'item_code', 'department', 'machine', 'test_code', 'test_name', 'supplier_name', 'address', 'manufacture', 'hsn_code', 'unit_of_perchase', 'pack_size', 'test', 'unit_price', 'cgst', 'sgst', 'price_gst'] as $field)
                    <div class="form-group row">
                        <label for="{{ $field }}" class="col-sm-2 col-form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="{{ $field }}" placeholder="{{ ucfirst(str_replace('_', ' ', $field)) }}"
                                wire:model="{{ $field }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <button type="submit" class="col-sm-2 text-center btn btn-primary mb-2">Confirm identity</button>
            </div>
        </form>
    </div>
</div>
