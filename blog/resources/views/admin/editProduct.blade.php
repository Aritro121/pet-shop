<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Service Data</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen pb-10">
        <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-8 text-center text-gray-900">Edit Product</h1>
            <form action="{{ route('updateProduct', ['id' => $data->id]) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-500 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                    />
                </div>

                <div>
                    <img
                        id="preview"
                        src="{{ asset($data->image) }}"
                        alt="Bike Image Preview"
                        class="w-2/3 h-auto mt-4 rounded-md border border-gray-300"
                    />
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Title</label>
                    <input
                        type="text"
                        value="{{ $data->title }}"
                        id="name"
                        name="title"
                        required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Price</label>
                    <input
                        type="text"
                        value="{{ $data->price }}"
                        id="name"
                        name="price"
                        required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Short Discription</label>
                    <textarea
                        id="description"
                        name="subtitle"
                        rows="4"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >{{ $data->subtitle }}</textarea>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >{{ $data->description }}</textarea>
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full px-4 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document
            .getElementById("image")
            .addEventListener("change", function (event) {
                const file = event.target.files[0];
                const preview = document.getElementById("preview");
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "https://via.placeholder.com/300x200";
                }
            });
    </script>
</body>
</html>
