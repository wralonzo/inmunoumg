<style>
    /* CHECKBOX TOGGLE SWITCH */
    /* CSS: Aplicado para darle el estilo necesario al checkbox de elegir genero */
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
<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Vacunas/register/<?php echo (isset($idVacuna) ? $idVacuna : '') ?>">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Vacuna</h1><br>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Nombre *
                </label>
                <?php $value = (isset($vacuna) ? $vacuna->nombre : ''); ?>
                <input name="nombre" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Nombre de vacuna" required value="<?php echo $value ?>">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Descripción *
                </label>
                <?php $value = (isset($vacuna) ? $vacuna->descripcion : ''); ?>
                <textarea name="descripcion" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="descripcion larga de la vacuna " required><?php echo $value ?></textarea>
            </div>
        </div>


        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Edad de Aplicación *
                </label>
                <?php $value = (isset($vacuna) ? $vacuna->edadaplicacion : ''); ?>
                <input name="edadaplicacion" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="number" required value="<?php echo $value ?>" required>
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

    });
</script>