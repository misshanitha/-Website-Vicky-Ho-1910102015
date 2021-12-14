<x-slot name="header">
    <h2 class="text-center">JADWAL MEETING PRIMELAB TECHNOLOGY</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">Buat Jadwal Meeting</button>
            @if($isModalOpen)
            @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Nama Client</th>
                        <th class="px-4 py-2">Email Client</th>
                        <th class="px-4 py-2">Jadwal Meeting</th>
                        <th class="px-4 py-2">Catatan</th>
                        <th class="px-4 py-2">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->id }}</td>
                        <td class="border px-4 py-2">{{ $post->nama_client }}</td>
                        <td class="border px-4 py-2">{{ $post->email_client}}</td>
                        <td class="border px-4 py-2">{{ $post->jadwal_meeting}}</td>
                        <td class="border px-4 py-2">{{ $post->catatan}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $post->id }})"
                                class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">Edit</button>
                            <button wire:click="delete({{ $post->id }})"
                                class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>