<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Login/cambiar_password/<?php echo $id; ?>">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Actualizar Clave</h1><br>
        <div class="-mx-3 md:flex mb-6">
            <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Password *
                </label>
                <input name='txtClave' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="password" placeholder="******************">
                <?php if (validation_errors()) { ?>
                    <label class="text-1xl text-red-500 text-opacity-100"><?php echo validation_errors(); ?></label>
                <?php } else { ?>
                    <p class="text-red text-xs italic">Ingrese una clave mayor a 5 caracteres *.</p> <?php } ?>
            </div>
        </div>
        </div>

            <div class="flex items-center justify-center ">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <button type="submit" class="text-center focus:outline-none text-white text-sm py-2.5 px-12 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg">Registar</button>
                </div>
            </div>
        </div>

</form>
<br><br>