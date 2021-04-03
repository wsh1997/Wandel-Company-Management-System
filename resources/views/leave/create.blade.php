<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Apply Leave
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('leave.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    {{-- <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                    </svg> --}}
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                        <path fill-rule="evenodd"
                            d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z"
                            clip-rule="evenodd" />
                    </svg> --}}
                    <span>Back</span>
                </a>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('leave.store') }}">
                    @csrf
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <label for="type" class="block font-medium text-sm text-gray-700">Leave Type</label>
                        <select name="type" id="type" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('type', '') }}" required>
                            <option value="" selected disabled hidden>Select an Option</option>
                            <option value="sick_leave">Sick Leave</option>
                            <option value="casual_leave">Casual Leave</option>
                            <option value="maternity_leave">Maternity Leave</option>
                        </select>
                        @error('type')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="reason" class="block font-medium text-sm text-gray-700">Reason</label>
                            <textarea name="reason" id="reason"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('reason', '') }}">
                            </textarea>
                            @error('reason')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="datefrom" class="block font-medium text-sm text-gray-700">From Date</label>
                            <input type="datetime-local" name="datefrom" id="datefrom"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('datefrom', '') }}" />
                            @error('datefrom')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="todate" class="block font-medium text-sm text-gray-700">To Date</label>
                            <input type="datetime-local" name="dateto" id="dateto"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('dateto', '') }}" />
                            @error('dateto')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
