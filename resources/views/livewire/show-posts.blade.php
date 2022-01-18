<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            {{-- <input type="text" wire:model="search"> --}}

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <div class="px-6 py-4 flex items-center">
                            <x-jet-input wire:model="search" class="flex-1 mr-3" type="text" placeholder="Escriba lo que quiera buscar"></x-jet-input>

                            <livewire:create-post />
                        </div>
{{--                    Media form and progress bar--}}
{{--                        Form to save photos
                        <form wire:submit.prevent="savePhoto">

                            <div
                                @error('photo'){{ $message }}@enderror
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <!-- File Input -->
                                <input type="file" wire:model="photo">

                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>

                                <button type="submit">Enviar</button>

                            </div>

                        </form>

                        Button to download a file
                        <div>
                            <button wire:click="export">Descargar</button>
                        </div>--}}

{{--                        Media form--}}
                        {{--<form action="{{'createMedia'}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" id="image">
                            <button type="submit">Enviar</button>
                        </form>--}}

                        @if(count($posts))
                            <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id')">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('title')">
                                        Title

                                        <i class="fas fa-sort float-end"></i>
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('content')">
                                        Content
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    @foreach ($posts as $post)

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $post->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $post->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $post->content }}</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        {{ $post->getFirstMedia() }}
                                    </td>




                                </tr>

                                @endforeach

                                <!-- More people... -->
                            </tbody>
                                <div class="px-4">
                                    {{$posts->links()}}
                                </div>

                        </table>
                        @else
                            <div class="px-6 py-4">
                                No existe ningún registro coincidente
                            </div>
                        @endif

                        {{--            ACCORDION--}}
                        <div class="mb-2 text-white shadow-sm dark:bg-dark rounded">
                            <div class="accordion" id="newItem">

                                {{--                    IMSS--------------}}
                                <div class="accordion-item">
                                    <div class="accordion-header mr-4" id="headingOne">
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">

                                            <div class="my-3 mx-2">
                                                <input type="radio" id="id" name="drone" value="imss" wire:model="radioButton">
                                            </div>

                                        </button>
                                        <label
                                            class="text-gray-800 dark:text-white">{{__('Send movements through IMSS certificate')}}</label>

                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                         data-bs-parent="#newItem">
                                        <div class="accordion-body text-dark dark:bg-dark dark:text-white">

                                            <div class="flex flex-col flex-grow mb-3">

                                                <label class="my-2 font-bold">{{__('IMSS certificate')}}</label>

                                            <!--                                    <div x-data="{ files: null }" id="FileUpload"
                                         class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray dark:bg-dark dark:text-white">
                                        <input type="file" multiple name="cert_imss_cert"
                                               class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                               x-on:change="files = $event.target.files; console.log($event.target.files);"
                                               x-on:dragover="$el.classList.add('active')"
                                               x-on:dragleave="$el.classList.remove('active')"
                                               x-on:drop="$el.classList.remove('active')"
                                        >
                                        <template x-if="files !== null">
                                            <div class="flex flex-col space-y-1">
                                                <template x-for="(_,index) in Array.from({ length: files.length })">
                                                    <div class="flex flex-row items-center space-x-2">
                                                        <template x-if="files[index].type.includes('audio/')"><i
                                                                class="far fa-file-audio fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('application/')"><i
                                                                class="far fa-file-alt fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('image/')"><i
                                                                class="far fa-file-image fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('video/')"><i
                                                                class="far fa-file-video fa-fw"></i></template>
                                                        <span class="font-medium text-gray-900"
                                                              x-text="files[index].name">Uploading</span>
                                                        <span class="text-xs self-end text-gray-500"
                                                              x-text="filesize(files[index].size)">...</span>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>
                                        <template x-if="files === null">
                                            <div class="flex flex-col space-y-2 items-center justify-center">
                                                <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                                <p class="text-gray-700">{{__('Drag your files here or click in this area.')}}</p>
                                                <a href="javascript:void(0)"
                                                   class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium no-underline border border-transparent rounded-md outline-none bg-gray-600">
                                                    {{__('Select a file')}}</a>
                                            </div>
                                        </template>

                                    </div>-->
                                                <input class="w-full text-gray-800 my-2 rounded flex-2 dark:bg-dark dark:text-white"
                                                       type="text"
                                                       id="IMSScertificate1">
                                            </div>
                                            <div>
                                                <label class="font-bold" for="name">{{__('IMSS certified user')}}</label>
                                                <input class="text-gray-800 rounded my-2 w-full dark:bg-dark dark:text-white"
                                                       type="text" id="name" name="Name">
                                            </div>
                                            <div>
                                                <label class="font-bold" for="name">{{__('IMSS certified password')}}</label>
                                                <input class="text-gray-800 rounded my-2 w-full dark:bg-dark dark:text-white"
                                                       type="password" id="password"
                                                       name="Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-header mr-4" id="headingFiel">
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiel"
                                                aria-expanded="false" aria-controls="collapseTwo">

                                            <div class="my-3 mx-2">
                                                <input type="radio" id="id2" name="drone" value="fiel" wire:model="radioButton">
                                            </div>

                                        </button>
                                        <label class="text-gray-800 dark:text-white"
                                               for="id">{{__('Send movements to the IMSS through FIEL')}}</label>

                                    </div>
                                    <div id="collapseFiel" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                         data-bs-parent="#newItem">
                                        <div class="accordion-body text-dark dark:bg-dark dark:text-white">

                                            {{--                                            FIEL-------------------------------------}}
                                            <div class="flex flex-col flex-grow mb-3">

                                                <label class="my-2 font-bold">{{__('FIEL Certificate')}}</label>

                                            <!--                                    <div x-data="{ files: null }" id="FileUpload"
                                         class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray dark:bg-dark dark:text-white">
                                        <input type="file" multiple
                                               class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                               x-on:change="files = $event.target.files; console.log($event.target.files);"
                                               x-on:dragover="$el.classList.add('active')"
                                               x-on:dragleave="$el.classList.remove('active')"
                                               x-on:drop="$el.classList.remove('active')"
                                        >
                                        <template x-if="files !== null">
                                            <div class="flex flex-col space-y-1">
                                                <template x-for="(_,index) in Array.from({ length: files.length })">
                                                    <div class="flex flex-row items-center space-x-2">
                                                        <template x-if="files[index].type.includes('audio/')"><i
                                                                class="far fa-file-audio fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('application/')"><i
                                                                class="far fa-file-alt fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('image/')"><i
                                                                class="far fa-file-image fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('video/')"><i
                                                                class="far fa-file-video fa-fw"></i></template>
                                                        <span class="font-medium text-gray-900"
                                                              x-text="files[index].name">Uploading</span>
                                                        <span class="text-xs self-end text-gray-500"
                                                              x-text="filesize(files[index].size)">...</span>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>
                                        <template x-if="files === null">
                                            <div class="flex flex-col space-y-2 items-center justify-center">
                                                <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                                <p class="text-gray-700">{{__('Drag your files here or click in this area.')}}</p>
                                                <a href="javascript:void(0)"
                                                   class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium no-underline border border-transparent rounded-md outline-none bg-gray-600">
                                                    {{__('Select a file')}}</a>
                                            </div>
                                        </template>

                                    </div>-->
                                                <input class="w-full text-gray-800 my-2 rounded flex-2 dark:bg-dark dark:text-white"
                                                       type="text"
                                                       id="IMSScertificate2">
                                            </div>

                                            <div class="flex flex-col flex-grow mb-3">

                                                <label class="my-2 font-bold">{{__('Llave privada FIEL')}}</label>

                                            <!--                                    <div x-data="{ files: null }" id="FileUpload"
                                         class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray dark:bg-dark dark:text-white">
                                        <input type="file" multiple
                                               class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                               x-on:change="files = $event.target.files; console.log($event.target.files);"
                                               x-on:dragover="$el.classList.add('active')"
                                               x-on:dragleave="$el.classList.remove('active')"
                                               x-on:drop="$el.classList.remove('active')"
                                        >
                                        <template x-if="files !== null">
                                            <div class="flex flex-col space-y-1">
                                                <template x-for="(_,index) in Array.from({ length: files.length })">
                                                    <div class="flex flex-row items-center space-x-2">
                                                        <template x-if="files[index].type.includes('audio/')"><i
                                                                class="far fa-file-audio fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('application/')"><i
                                                                class="far fa-file-alt fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('image/')"><i
                                                                class="far fa-file-image fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('video/')"><i
                                                                class="far fa-file-video fa-fw"></i></template>
                                                        <span class="font-medium text-gray-900"
                                                              x-text="files[index].name">Uploading</span>
                                                        <span class="text-xs self-end text-gray-500"
                                                              x-text="filesize(files[index].size)">...</span>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>
                                        <template x-if="files === null">
                                            <div class="flex flex-col space-y-2 items-center justify-center">
                                                <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                                <p class="text-gray-700">{{__('Drag your files here or click in this area.')}}</p>
                                                <a href="javascript:void(0)"
                                                   class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium no-underline border border-transparent rounded-md outline-none bg-gray-600">
                                                    {{__('Select a file')}}</a>
                                            </div>
                                        </template>

                                    </div>-->
                                                <input class="w-full text-gray-800 my-2 rounded flex-2 dark:bg-dark dark:text-white"
                                                       type="text"
                                                       id="IMSScertificate3">
                                            </div>
                                            <div>
                                                <label class="font-bold" for="name">{{__('IMSS certified user')}}</label>
                                                <input class="text-gray-800 rounded my-2 w-full dark:bg-dark dark:text-white"
                                                       type="text" id="imss_cert" name="Name">
                                            </div>
                                            <div>
                                                <label class="font-bold" for="name">{{__('FIEL password')}}</label>
                                                <input class="text-gray-800 rounded my-2 w-full dark:bg-dark dark:text-white"
                                                       type="password" id="fiel_pass"
                                                       name="Name">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--            ACCORDION--}}

                        <div class="btn-top-holder my-3">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Save') }}
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
