<form id="formdepto" class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Quejacursal/update/<?php echo $queja->id_queja; ?>">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Actualizar Queja</h1><br>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Concepto *
                </label>
                <input value="<?php echo $queja->concepto_queja ?>" name='txtNombre' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Coca Cola" required>
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Descripcion *
                </label>
                <textarea name="txtPropietario" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Descripción de la queja"" required><?php echo $queja->descripcion_queja ?></textarea>
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Empresa *
                </label>
                <div class="selector-region">
                    <select id='company' name='txtEmpresa' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option selected value="<?php echo $queja->id_company ?>"><?php echo $queja->nombre_company ?></option>
                        <?php foreach ($companies as $company) : ?>
                            <option value="<?php echo $company->id_company ?>"><?php echo $company->nombre_company ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Sucursales * <span class="text-purple-600" id="spanlink"></span>
                </label>
                <select id="sucursal" name='txtSucursal' class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                    <option selected value="<?php echo $queja->id_sucursal; ?>"><?php echo $queja->nombre_sucursal; ?></option>
                </select>
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

        $('#company').click(function() {
            $('#sucursal').empty();
        });

        $('#company').change(function() {
            let company = $('#company').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Comun/getSucursalesJSON/" + company,
                success: function(response) {
                    let dataItems = JSON.parse(response)
                    if(dataItems.length < 1){
                        $('#spanlink').append('<a  href="<?php echo base_url() ?>Sucursal/register">ingrese una sucursal</a>');
                        $('#sucursal').append('<option value=""><a href="<?php echo base_url() ?>Sucursal/register">ingrese una sucursal</a></option>');
                    }else{
                        jQuery.each(dataItems, function(index, item) {
                            $('#spanlink').empty();
                            $('#sucursal').append('<option value=' + item.id_sucursal + '>' + item.nombre_sucursal + '</option>');
                        });
                    }
                    // console.log(response);
                }
            });
        });
    });
</script>