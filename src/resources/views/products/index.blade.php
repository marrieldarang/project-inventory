<x-dashboard-layout>
<div x-data="productModal()" x-init="init()" class="relative">

        
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Products</h2>

            <!-- Create Product Button -->
            <button @click="createProduct()"
    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
    + Add Product
</button>
        </div>

      <!-- Search and Filters -->
<form method="GET" action="{{ route('products.index') }}" class="flex space-x-4 mb-6">
    <input type="text" name="search" placeholder="Search by name, model, description..."
        class="border rounded px-4 py-2 w-full"
        value="{{ request('search') }}">
    
    <select name="category" class="border rounded px-4 py-2">
        <option value="">All Categories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <select name="brand" class="border rounded px-4 py-2">
        <option value="">All Brands</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Search</button>
</form>


        <!-- Products Table -->
        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Model</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Brand</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr>
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">{{ $product->model }}</td>
                            <td class="px-6 py-4">{{ $product->description }}</td>
                            <td class="px-6 py-4">{{ $product->category->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $product->brand->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                               <!-- Edit Button -->
<button @click="editProduct({
    id: {{ $product->id }},
    name: '{{ $product->name }}',
    model: '{{ $product->model }}',
    description: '{{ $product->description }}',
    category_id: '{{ $product->category_id }}',
    brand_id: '{{ $product->brand_id }}'
})"
class="px-3 py-1 text-sm bg-yellow-400 hover:bg-yellow-500 text-white rounded">
    Edit
</button>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure?')"
                                        class="px-3 py-1 text-sm bg-red-500 hover:bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>

        <!-- Create Product Modal -->
        <div x-show="open"
             class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
             
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg mx-4">
                <h2 class="text-xl font-semibold mb-4">Add New Product</h2>

                <form :action="isEdit ? `/products/${product.id}` : '{{ route('products.store') }}'" method="POST">
    @csrf
    <template x-if="isEdit">
        <input type="hidden" name="_method" value="PUT">
    </template>

    <div class="mb-4">
        <label class="block text-gray-700">Name</label>
        <input type="text" name="name" class="border rounded px-4 py-2 w-full" x-model="product.name" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Model</label>
        <input type="text" name="model" class="border rounded px-4 py-2 w-full" x-model="product.model" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Description</label>
        <textarea name="description" class="border rounded px-4 py-2 w-full" x-model="product.description"></textarea>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Category</label>
        <select name="category_id" class="border rounded px-4 py-2 w-full" x-model="product.category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Brand</label>
        <select name="brand_id" class="border rounded px-4 py-2 w-full" x-model="product.brand_id" required>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-end space-x-4">
        <button type="button" @click="open = false"
            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            Close
        </button>
        <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            <span x-text="isEdit ? 'Update' : 'Save'"></span>
        </button>
    </div>
</form>

            </div>
        </div>

    </div>

    <!-- At the very bottom of resources/views/products/index.blade.php -->

<script>
function productModal() {
    return {
        open: false,
        isEdit: false,
        product: {
            id: null,
            name: '',
            model: '',
            description: '',
            category_id: '',
            brand_id: ''
        },
        init() {
            // optional: you can put console.log('Alpine ready') here for testing
        },
        createProduct() {
            this.isEdit = false;
            this.resetForm();
            this.open = true;
        },
        editProduct(product) {
            this.isEdit = true;
            this.product = {...product};
            this.open = true;
        },
        resetForm() {
            this.product = {
                id: null,
                name: '',
                model: '',
                description: '',
                category_id: '',
                brand_id: ''
            };
        },
    }
}
</script>

</x-dashboard-layout>