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
<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Distritos/register/<?php echo (isset($idDistrito) ? $idDistrito : '') ?>">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Distrito</h1><br>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Código *
                </label>
                <?php $value = (isset($distrito) ? $distrito->codigodistrito : ''); ?>
                <input name='codigo' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="7070ABD" required value="<?php echo $value ?>">
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Encargado *
                </label>

                <?php $value = (isset($distrito) ? $distrito->encargado : ''); ?>

                <input name="encargado" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Pedro Solares" required value="<?php echo $value ?>">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                        Ubicacion *
                    </label>

                    <?php $value = (isset($distrito) ? $distrito->ubicacion : ''); ?>

                    <input name="ubicacion" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Guatemala, Guatemala" required value="<?php echo $value ?>">

            </div>
        </div>


        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Municipio *
                </label>
                <div class="selector-region">
                    <select id='padre' name='municipio' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleccione una un municipio</option>
                        <?php foreach ($municipios as $mun) : ?>
                            <?php if ($mun->id_municipio == $distrito->id_municipio) {
                            ?>
                                <option value="<?php echo $mun->id_municipio ?>" selected="selected"><?php echo $mun->nombre_municipio; ?></option>
                            <?php } ?>
                            <option value="<?php echo $mun->id_municipio ?>"><?php echo $mun->nombre_municipio;  ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Departamental *
                </label>
                <div class="selector-region">
                    <select id='padre' name='departamental' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleccione departamental</option>
                        <?php foreach ($departamental as $depto) : ?>
                            <?php if ($depto->iddepartamental == $distrito->iddepartamental) {
                            ?>
                                <option value="<?php echo $depto->iddepartamental ?>" selected="selected"><?php echo $depto->codigo; ?></option>
                            <?php } ?>
                            <option value="<?php echo $depto->iddepartamental ?>"><?php echo $depto->codigo;  ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>


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