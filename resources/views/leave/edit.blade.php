<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Task
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('leave.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('leave.update', $leave->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="type" class="block font-medium text-sm text-gray-700">Leave Type</label>
                            <select name="type" id="type" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('type', $leave->type) }}" required>
                                <option value="" selected disabled hidden>Select an Option</option>
                                <option value="sick_leave" {{ $leave->type == 'sick_leave' ? 'selected' : '' }}>Sick
                                    Leave</option>
                                <option value="casual_leave" {{ $leave->type == 'casual_leave' ? 'selected' : '' }}>
                                    Casual Leave</option>
                                <option value="maternity_leave"
                                    {{ $leave->type == 'maternity_leave' ? 'selected' : '' }}>Maternity Leave</option>
                            </select>
                            @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Reason</label>
                            <textarea name="reason" id="reason"
                                class="form-input rounded-md shadow-sm mt-1 block w-full">{{ $leave->reason }}
                        </textarea>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="datefrom" class="block font-medium text-sm text-gray-700">From Date</label>
                            <input type="datetime-local" name="datefrom" id="datefrom"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('datefrom', date('Y-m-d\TH:i', strtotime($leave->datefrom))) }}" />
                            @error('datefrom')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="todate" class="block font-medium text-sm text-gray-700">To Date</label>
                            <input type="datetime-local" name="dateto" id="dateto"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('dateto', date('Y-m-d\TH:i', strtotime($leave->dateto))) }}" />
                            @error('dateto')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
