<form class="flex items-center justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Reportes/municipio">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Reporte por municipio</h1><br>

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
                <select id="municipios" name='txtbuscar' class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" required>
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