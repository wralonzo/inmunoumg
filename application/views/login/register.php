<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Login/register_user/<?php echo isset($idUser) ? $idUser : '' ?>">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Usuario</h1><br>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Nombres *
                </label>
                <?php $value = (isset($user) ? $user->nombres : ''); ?>
                <input value="<?php echo $value; ?>" name='txtNombres' class=" appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Juan Carlos" required>

            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Apellidos *
                </label>
                <?php $value = (isset($user) ? $user->apellidos : ''); ?>

                <input value="<?php echo $value; ?>" name="txtApellidos" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Lemus Solares" required>
            </div>
        </div>

        <?php if ($editar == true) { ?>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                        Correo *
                    </label>
                    <?php $value = (isset($user) ? $user->usuario : ''); ?>
                    <input value="<?php echo $value; ?>" name="txtCorreo" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Lemus Solares" required>
                    <?php $value = (isset($user) ? $user->id_empleado : ''); ?>
                    <input type="hidden" name='id_empleado' value=" <?php echo $value; ?>">
                </div>
            </div>
        <?php } ?>
        <?php if ($editar == false) { ?>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Correo *
                    </label>
                    <?php $value = (isset($user) ? $user->usuario : ''); ?>

                    <input value="<?php echo $value; ?>" name="txtCorreo" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="email" placeholder="example@gmail.com" required>
                    <!-- <p class="text-red text-xs italic">campos requeridos *.</p> -->
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                        Password *
                    </label>
                    <input name='txtClave' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="password" placeholder="******************">
                    <?php if (validation_errors()) { ?>
                        <label class="text-1xl text-red-500 text-opacity-100"><?php echo validation_errors(); ?></label>
                    <?php } else { ?>
                        <p class="text-red text-xs italic">Ingrese una clave mayor a 5 caracteres *.</p> <?php } ?>

                </div>
            </div>
        <?php } ?>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Distrito *
                </label>
                <div class="selector-region">
                    <select id='distrito' name='distrito' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleccione distrito</option>
                        <?php foreach ($distritos as $distrito) : ?>
                            <?php if ($user->distrito == $distrito->iddistrito) {
                            ?>
                                <option value="<?php echo $distrito->iddistrito ?>" selected="selected"><?php echo $distrito->codigodistrito; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $distrito->iddistrito ?>"><?php echo $distrito->codigodistrito;  ?></option>
                        <?php }
                        endforeach; ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Rol *
                </label>
                <div class="selector-region">
                    <select id='rol' name='rol' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleccione rol</option>
                        <?php
                        $roles = array(
                            array(
                                'value' => 'Admin',
                                'nombre' => 'Adminstrador'
                            ),
                            array(
                                'value' => 'Asistente',
                                'nombre' => 'Asistente'
                            ),
                            array(
                                'value' => 'Reportes',
                                'nombre' => 'Reportes'
                            ),
                        );
                        ?>
                        <?php foreach ($roles as $rol) : ?>
                            <?php if ($rol['value'] == $user->rol) {
                            ?>
                                <option value="<?php echo $rol['value'] ?>" selected="selected"><?php echo $rol['nombre']; ?></option>
                            <?php } ?>
                            <option value="<?php echo $rol['value'] ?>"><?php echo $rol['nombre'];  ?></option>
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