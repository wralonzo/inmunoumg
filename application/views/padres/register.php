<style>
    /* CHECKBOX TOGGLE SWITCH */
    /* @apply rules for documentation, these do not work as inline style */
    .toggle-checkbox:checked {
        @apply: right-0 border-green-400;
        right: 0;
        border-color: #68D391;
    }

    .toggle-checkbox:checked+.toggle-label {
        @apply: bg-green-400;
        background-color: #68D391;
    }
</style>
<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Padres/register/<?php echo (isset($idPadre) ? $idPadre : '') ?>">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Registrar Padre</h1><br>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Nombres *
                </label>
                <?php $value = (isset($padre) ? $padre->nombre : ''); ?>
                <input name='nombre' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Juan Carlos" required value="<?php echo $value ?>">
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Apellidos *
                </label>

                <?php $value = (isset($padre) ? $padre->apellido : ''); ?>

                <input name="apellido" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Lemus Solares" required value="<?php echo $value ?>">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    CUI *
                </label>
                <?php $value = (isset($padre) ? $padre->cui : ''); ?>
                <input name="cui" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="9899899989-2009" required value="<?php echo $value ?>">
            </div>
        </div>
        <div class="md:w-1/2 px-3">
            <!-- AlpineJS -->
            <?php $value = (isset($padre) ? $padre->sexo : ''); ?>

            <div x-data="{value: '<?php echo $value ?>', offValue: 'Masculino', onValue:'Femenino'}">
                <div class="flex items-center m-2 cursor-pointer cm-toggle-wrapper">
                    <span class="font-semibold text-gray-700 text-sm">Seleccione sexo <span class="font-bold" x-text="value"></span>
                </div>


                <div class="flex items-center m-2 cursor-pointer cm-toggle-wrapper" x-on:click="value =  (value == onValue ? offValue : onValue); ">
                    <span class="font-semibold text-xs mr-1">
                        Masculino
                    </span>
                    <input name="sexo" type="hidden" :value='value' required />
                    <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300" :class="{'bg-red-500': value == offValue,'bg-green-500': value == onValue}">
                        <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out" :class="{'-translate-x-2': value == offValue,'translate-x-2': value == onValue}"></div>
                    </div>
                    <span class="font-semibold text-xs ml-1">
                        Femenino
                    </span>
                </div>
            </div>
        </div>
        <br>
        <div class="flex items-center justify-center ">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <button type="submit" class="text-center focus:outline-none text-white text-sm py-2.5 px-12 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg">Registrar</button>
            </div>
        </div>
    </div>
</form>
<br><br>

<script type="text/javascript">
    $(document).ready(function() {

        $('#sexo').change(function() {
            console.log('hooa');
        })

    });
</script>