<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Sucursal/register">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Registrar Negocio</h1><br>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Nombres *
                </label>
                <input name='txtNombre' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Coca Cola" required>
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                    Encargado *
                </label>
                <input name="txtPropietario" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Lemus Solares" required>
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                    Teléfono *
                </label>
                <input name='txtTelefono' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="2222 2222" required>
            </div>
            <div class="md:w-1/2 px-3">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Empresa *
                </label>
                <div class="selector-region">
                    <select id='sucursales' name='txtEmpresa' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleecion una Empresa</option>
                        <?php foreach ($companies as $company) : ?>
                            <option value="<?php echo $company->id_company ?>"><?php echo $company->nombre_company ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Region *
                </label>
                <div class="selector-region">
                    <select id='region' name='txtRegion' class=" block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                        <option value="">Seleecion una region</option>
                        <?php foreach($regiones as $region): ?>
                            <option value="<?php echo $region->id_region ?>"><?php echo $region->nombre?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Departamento *
                </label>
                <select id="departamentos" name='txtDepartamento' class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                    <option value="">Seleecion un departamento</option>
                </select>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                    Municipio *
                </label>
                <select id="municipios" name='txtMunicipio' class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
                    <option value="">Seleecion un municipio</option>

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

        $('#region').click(function() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Comun/getDepartamentosJSON",
                success: function(response) {
                    let dataItems = JSON.parse(response)
                    jQuery.each(dataItems, function(index, item) {
                        $('#departamentos').append('<option value=' + item.id_departamento + '>' + item.nombre_departamento + '</option>');
                    });
                    // console.log(response);
                }
            });
            $('#departamentos').empty();
        });


        $('#departamentos').click(function() {
            $('#municipios').empty();
        });

        $('#departamentos').change(function() {
            let departamento = $('#departamentos').val();
            console.log(departamento);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Comun/getMunicipiosJSON/" + departamento,
                success: function(response) {
                    let dataItems = JSON.parse(response)
                    jQuery.each(dataItems, function(index, item) {
                        $('#municipios').append('<option value=' + item.id_municipio + '>' + item.nombre_municipio + '</option>');
                    });
                    // console.log(response);
                }
            });
        });
        $('#municipios').empty();

    });
</script>