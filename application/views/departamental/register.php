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
<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Departamental/register/<?php echo (isset($idDepartamental) ? $idDepartamental : '') ?>">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Departamental</h1><br>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Código *
                </label>
                <?php $value = (isset($departamental) ? $departamental->codigo : ''); ?>
                <input name="codigo" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Código" required value="<?php echo $value ?>">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Ubicacion *
                </label>
                <?php $value = (isset($departamental) ? $departamental->ubicacion : ''); ?>
                <input type="text" name=" ubicacion" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" value="<?php echo $value ?>" placeholder="Referencia de la dirección" required />
            </div>
        </div>


        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Encargado *
                </label>
                <?php $value = (isset($departamental) ? $departamental->encargado : ''); ?>
                <input name="encargado" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" value="<?php echo $value ?>" required>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Municipio *
                </label>
                <div class="selector-region">
                    <select id='padre' name='idmunicipio' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleccione una un municipio</option>
                        <?php foreach ($municipios as $mun) : ?>
                            <?php if ($mun->id_municipio == $departamental->idmunicipio) {
                            ?>
                                <option value="<?php echo $mun->id_municipio ?>" selected="selected"><?php echo $mun->nombre_municipio; ?></option>
                            <?php } ?>
                            <option value="<?php echo $mun->id_municipio ?>"><?php echo $mun->nombre_municipio;  ?></option>
                        <?php endforeach; ?>
                    </select>
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

    });
</script>