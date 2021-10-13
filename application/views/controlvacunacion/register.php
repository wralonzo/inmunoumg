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
<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>ControlVacunacion/register/<?php echo (isset($idVacuna) ? $idVacuna : '') ?>">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Control de vacuna</h1><br>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Fecha *
                </label>
                <?php $value = (isset($vacuna) ? $vacuna->fecha : ''); ?>
                <input name='fecha' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="date" required value="<?php echo $value ?>">
            </div>


            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Usuario *
                </label>
                <div class="selector-region">
                    <select id='padre' name='idusuario' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleecion usuario</option>
                        <?php foreach ($users as $user) : ?>
                            <?php if ($vacuna->idusuario == $user->id) {
                            ?>
                                <option value="<?php echo $user->id ?>" selected="selected"><?php echo $user->nombres . ' ' . $user->apellidos ?></option>
                            <?php } ?>
                            <option value="<?php echo $user->id ?>"><?php echo $user->nombres . ' ' . $user->apellidos ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">

                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Vacunas *
                </label>
                <div class="selector-region">
                    <select id='padre' name='idvacuna' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleecion Vacuna</option>
                        <?php
                        foreach ($vacunas as $vac) : ?>
                            <?php if ($vacuna->idvacuna == $vac->idvacuna) {
                            ?>
                                <option value="<?php echo $vac->idvacuna ?>" selected="selected"><?php echo $vac->nombre ?></option>
                            <?php } ?>
                            <option value="<?php echo $vac->idvacuna ?>"><?php echo $vac->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Pacientes *
                </label>
                <div class="selector-region">
                    <select id='padre' name='idpaciente' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleecion una un paciente</option>
                        <?php foreach ($pacientes as $paciente) : ?>
                            <?php if ($vacuna->idpaciente == $paciente->idpaciente) {
                            ?>
                                <option value="<?php echo $paciente->idpaciente ?>" selected="selected"><?php echo $paciente->nombrepaciente . ' ' . $paciente->apellidopaciente ?></option>
                            <?php } ?>
                            <option value="<?php echo $paciente->idpaciente ?>"><?php echo $paciente->nombrepaciente . ' ' . $paciente->apellidopaciente ?></option>
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