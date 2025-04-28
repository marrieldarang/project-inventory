<div class="p-6">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1">Name</label>
            <input type="text" wire:model="name" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Model</label>
            <input type="text" wire:model="model" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea wire:model="description" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Category</label>
            <select wire:model="category_id" class="w-full border rounded px-3 py-2">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Brand</label>
            <select wire:model="brand_id" class="w-full border rounded px-3 py-2">
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
            <button type="button" wire:click="close" class="bg-gray-400 text-white px-4 py-2 rounded">Close</button>
        </div>
    </form>
</div>
