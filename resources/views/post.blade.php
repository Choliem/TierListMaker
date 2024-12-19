@extends('components.layout')

@section('content')
    <x-slot:title>{{ $title ?? 'Post Details' }}</x-slot:title>

    <article class="py-8 max-w-screen-md">
        @if ($post['image'])
            <img id="post-image" src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="mb-4 w-full rounded shadow-md">
        @endif
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        <div>
            By
            <a href="/authors/{{ $post->author->username }}"
                class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}"
                class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a> |
            {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>

        <!-- Show Add and Delete buttons for the Author -->
        @if(auth()->user() && auth()->user()->id === $post->author->id)
            <div class="mt-4">
                <!-- Show Add Image Button if no image exists for the post -->
                @if (!$post['image'])
                    <button id="add-image-btn" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Add Image
                    </button>
                @endif

                <!-- Show Delete Image Button if the post has an image -->
                @if ($post['image'])
                    <button id="delete-image-btn" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                        Delete Image
                    </button>
                @endif
            </div>

            <!-- Add Image Modal -->
            <div id="add-image-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-6 rounded-lg w-1/2">
                    <h3 class="text-xl mb-4">Add Image to Post</h3>

                    <label for="image-url" class="block mb-2">Image URL</label>
                    <input type="url" id="image-url" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter valid image URL">

                    <div class="flex justify-end">
                        <button id="save-image-btn" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Save Image</button>
                        <button id="cancel-image-btn" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-lg">Cancel</button>
                    </div>
                </div>
            </div>
        @endif

        <a href="/posts" class="font-medium text-blue-500 hover:underline">Back To Posts &laquo;</a>
    </article>

    @push('scripts')
        <script>
            // Show the Add Image modal when the Add Image button is clicked
            document.getElementById('add-image-btn').addEventListener('click', function() {
                document.getElementById('add-image-modal').classList.remove('hidden');
            });

            // Hide the modal when the Cancel button is clicked
            document.getElementById('cancel-image-btn').addEventListener('click', function() {
                document.getElementById('add-image-modal').classList.add('hidden');
            });

            // Handle the Save Image button click
            document.getElementById('save-image-btn').addEventListener('click', function() {
                let imageUrl = document.getElementById('image-url').value;

                // Perform an AJAX request to update the image (you need to create the backend endpoint)
                if (imageUrl) {
                    fetch('{{ route("posts.updateImage", $post->id) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ image_url: imageUrl })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the image on the page
                            document.getElementById('post-image').src = imageUrl;
                            // Close the modal
                            document.getElementById('add-image-modal').classList.add('hidden');
                        }
                    });
                }
            });

            // Handle the Delete Image button click
            document.getElementById('delete-image-btn').addEventListener('click', function() {
                // Send request to delete the image
                fetch('{{ route("posts.deleteImage", $post->id) }}', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the image from the page
                        document.getElementById('post-image').remove();
                        // Hide the Delete Image button
                        document.getElementById('delete-image-btn').style.display = 'none';
                    }
                });
            });
        </script>
    @endpush
@endsection
