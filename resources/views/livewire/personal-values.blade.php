<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Valores') }}
    </h2>
</x-slot>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if (session()->has('message'))
        <div id="alert" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
            <span class="inline-block align-middle mr-8">
                {{ session('message') }}
            </span>
            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="document.getElementById('alert').remove();">
                <span>×</span>
            </button>
        </div>
    @endif    
    <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10" >Crear Nuevo Valor</a>
    @if (count($personaleValues)>0)
        <div class="py-10">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 bg-bot-dark-blue text-left text-xs font-semibold text-white uppercase tracking-wider">
                            </th>

                            <th
                                class="px-5 py-3  bg-bot-dark-blue text-left text-xs font-semibold text-white	 uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>

                            <th
                                class="px-5 py-3  bg-bot-dark-blue text-left text-xs font-semibold text-white	 uppercase tracking-wider">
                                {{ __('Sort #') }}
                            </th>                            

                            <th
                                class="px-5 py-3 bg-bot-dark-blue text-left text-xs font-semibold text-white uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personaleValues as $item) 
                            <tr class="hover:bg-orange-100">
                                <td class="px-5 py-2 bg-white text-sm @if (!$loop->last) border-gray-200 border-b @endif">
                                    <input type="checkbox">

                                </td>
                                <td class="px-5 py-2 bg-white text-sm @if (!$loop->last) border-gray-200 border-b @endif">
                                    {{ Str::limit($item->name, 25) }}
                                </td>

                                <td class="px-5 py-2 bg-white text-sm @if (!$loop->last) border-gray-200 border-b @endif">
                                    {{$item->sort}}
                                </td>

                                <td class="px-5 py-2 bg-white text-sm @if (!$loop->last) border-gray-200 border-b @endif text-right">
                                    <div class="inline-block whitespace-no-wrap">
                                        <button wire:click="edit({{ $item->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                        <button wire:click="$emit('triggerDelete',{{ $item->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$personaleValues->links('pagination',['is_livewire' => true]) }}

            </div>
        </div>
    @endif
    @if($isOpen)
        <div class="fixed z-100 w-full h-full bg-gray-500 opacity-75 top-0 left-0"></div>
        <div class="fixed z-101 w-full h-full top-0 left-0 overflow-y-auto">
            <div class="table w-full h-full py-6">
                <div class="table-cell text-center align-middle">
                    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="bg-white rounded-lg text-left overflow-hidden shadow-xl">
                            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
                                <div class="mt-8 text-2xl text-gray-600 flex items-center justify-center">
                                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold mb-4">
                                        Valores
                                    </div>        
                                </div>
                            </div>
                            
                    
                            <form>
                                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label for="nameInput" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameInput" placeholder="Enter Name" wire:model="name">
                                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label for="skyInput" class="block text-gray-700 text-sm font-bold mb-2">Orden:</label>
                                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sortInput" placeholder="Enter Order" wire:model="sort">
                                            @error('sku') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full sm:ml-3 sm:w-auto">
                                        <button wire:click.prevent="store()" type="button" class="inline-flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                                    </span>
                                    <span class="mt-3 flex w-full sm:mt-0 sm:w-auto">
                                        <button wire:click="closeModal()" type="button" class="inline-flex bg-white hover:bg-gray-200 border border-gray-300 text-gray-500 font-bold py-2 px-4 rounded">Cancel</button>
                                    </span>
                                </div>

                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', personalValueId => {     
            console.log("here")       
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Product record will be deleted!',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                    @this.call('delete',personalValueId)
                } else {
                    console.log("Canceled");
                }
            });
        });
    })
</script>
@endpush