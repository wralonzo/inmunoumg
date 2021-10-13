<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">



<style>
    /*Form fields*/
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4a5568;
        /*text-gray-700*/
        padding-left: 1rem;
        /*pl-4*/
        padding-right: 1rem;
        /*pl-4*/
        padding-top: .5rem;
        /*pl-2*/
        padding-bottom: .5rem;
        /*pl-2*/
        line-height: 1.25;
        /*leading-tight*/
        border-width: 2px;
        /*border-2*/
        border-radius: .25rem;
        border-color: #edf2f7;
        /*border-gray-200*/
        background-color: #edf2f7;
        /*bg-gray-200*/
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover,
    table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;
        /*bg-indigo-100*/
    }

    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: #fff !important;
        /*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        /*shadow*/
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        background: #667eea !important;
        /*bg-indigo-500*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #fff !important;
        /*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        /*shadow*/
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        background: #667eea !important;
        /*bg-indigo-500*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Add padding to bottom border */
    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;
        /*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }

    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #667eea !important;
        /*bg-indigo-500*/
    }
</style>
<div class="mx-auto px-12">
    <!--Card-->
    <!-- <p class="text-2xl text-purple-500 text-opacity-100">Quejas</p> -->
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Departamental</h1><br>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <a href="<?php echo base_url(); ?>Departamental/register" class="text-center focus:outline-none text-white text-sm py-2.5 px-12 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg" title="Nuevo padre">Nuevo</a>
        </div><br>
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">#</th>
                    <th data-priority="2">Código</th>
                    <th data-priority="3">Ubicación</th>
                    <th data-priority="5">Encargado</th>
                    <th data-priority="6">Municipio</th>
                    <th data-priority="7">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 0;
                foreach ($departamentales as $depto) { ?>
                    <tr class="">
                        <td align="center"><?php echo $contador = $contador + 1; ?></td>
                        <td align="center"><a href="<?php echo base_url(); ?>Departamental/register/<?php echo $depto->iddepartamental ?>" class="px-2 py-1 bg-blue-600 text-gray-100 font-bold rounded hover:bg-gray-500"><?php echo $depto->codigo; ?></a></td>
                        <td align="center"><?php echo $depto->ubicacion; ?></td>
                        <td align="center"><?php echo $depto->encargado; ?></td>
                        <td align="center"><?php echo $depto->nombre_municipio; ?></td>
                        <td class="py-3 px-6 text-center" align="center">
                            <div class="flex item-center justify-center">
                                <a title="Editar" href="<?php echo base_url(); ?>Departamental/register/<?php echo $depto->iddepartamental ?>">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                </a>
                                <a title="Borrar" href=" <?php echo base_url(); ?>Departamental/delete/<?php echo $depto->iddepartamental ?>">

                                    <div class="w-4 mr-8 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->

                    </tr>
                <?php } ?>
            </tbody>

        </table>


    </div>
    <!--/Card-->


</div>
<script id="rendered-js">
    $(document).ready(function() {

        var table = $('#example').DataTable({
            responsive: true
        }).

        columns.adjust().
        responsive.recalc();
    });
    //# sourceURL=pen.js
</script>