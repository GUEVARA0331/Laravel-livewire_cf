<div>
    <x-jet-danger-button wire:click="$set('open', true)"> {{-- Implmentación de componente de jetstream (botón),  wire:click="$set('open', true) -> nos permite cambiar el valor de una propiedad sin tener que crear funciones"> --}}
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open"> {{-- Implementación de componente de jetstream (modal), sincronización con atributo del componente (wire:model="open") --}}

        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Título del post" />
                <x-jet-input type="text" class="w-full" wire:model="title"/> {{-- (wire:model="title")->sincroniza con un atributo desde el componente livewire --}}

                {{-- Verificando si hay un error de validación por el campo title --}}
                {{-- @error('title') Verificando si hay un error de validación por el campo title
                    <span>
                    {{ $message }}
                    </span>
                @enderror --}}

                <x-jet-input-error for="title"></x-jet-input-error> {{-- Verficar si hay un error de validación en el campo title utilizando componente de jetstream --}}

            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido del post" />
                <textarea wire:model.defer="content" class="form-control w-full" rows="6"></textarea> {{-- Se implementa la clase form-control de tailwind que ha sido compilado desde el archivo resources/css/form.css --}}

                {{-- Verificando si hay un error de validación por el campo content --}}
                {{-- @error('content')
                    <span>
                    {{ $message }}
                    </span>
                @enderror --}}

                <x-jet-input-error for="content"></x-jet-input-error> {{-- Verficar si hay un error de validación en el campo content utilizando componente de jetstream --}}

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-1" wire:click="$set('open', false)"> {{-- Implementación de método mágico para cerrar el modal (wire:click="$set('open')") --}}
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25"> {{-- En el momento en que se destecta algún cambio en el servidor se desactiva el botón --}}
                {{-- class="disable:opacity-25 -> Al detectar que el botón es desactivado se puede agregar ciertas clases en base a cuando suceda el comportamiento específicado --}}
                {{-- wire:loading.class="bg-blue-500" Permite modificar las clases del elemento en cuanto se detecte un cambio en el servidor --}}
                {{-- wire:loading-> Muestra/oculta elementos cuando se estás ejecutando alún procesos del component | wire:target="proceso" -> apunta a qué proceso se debe activar el estado loading" --}}
                {{-- wire:loading.remove -> oculta el elemento en cuanto se detecta algún cambio especificado en el componente --}}
                Crear post
            </x-jet-danger-button>
        </x-slot>


    </x-jet-dialog-modal>
</div>
