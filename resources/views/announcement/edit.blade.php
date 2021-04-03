<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Announcement
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('announcement.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('announcement.update', $announcement->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" name="title" id="title" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('title', $announcement->title) }}" />
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="content" class="block font-medium text-sm text-gray-700">Content</label>
                            <textarea name="content" id="content"
                                class="form-input rounded-md shadow-sm mt-1 block w-full">{{ $announcement->content }}
                            </textarea>
                            @error('content')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                            <img src="{{ $announcement->image_path }}">
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="image_path" class="block font-medium text-sm text-gray-700">Upload Image</label>
                            <input type="file" name="image_path" id="image_path"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('image_path', '') }}" />
                            @error('image_path')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <img id="preview-image-before-upload"
                                    src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                    alt="preview image" style="max-height: 250px;">
                            </div>
                            {{-- <label for="datefrom" class="block font-medium text-sm text-gray-700">From Date</label>
                            <input type="datetime-local" name="datefrom" id="datefrom"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('datefrom', date('Y-m-d\TH:i', strtotime($leave->datefrom))) }}" />
                            @error('datefrom')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {


        $('#image_path').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });

</script>
