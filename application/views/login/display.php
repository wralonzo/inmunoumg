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

    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <h1 class="text-3xl font-bold text-gray-500 text-center">Usuarios</h1><br>
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <a href="<?php echo base_url(); ?>Login/register_user" class="text-center focus:outline-none text-white text-sm py-2.5 px-12 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg">Nuevo</a>
        </div><br>
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">#</th>
                    <th data-priority="2">Nombres</th>
                    <th data-priority="3">Apellidos</th>
                    <th data-priority="4">Usuario</th>
                    <th data-priority="5">Rol</th>
                    <th data-priority="6">Distrito</th>
                    <th data-priority="7">Estado</th>
                    <th data-priority="8">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 0;
                foreach ($usuarios as $user) { ?>
                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                        <td><?php echo $contador = $contador + 1; ?></td>
                        <td><a href="<?php echo base_url(); ?>Login/register_user/<?php echo $user->id ?>" class="px-2 py-1 bg-blue-600 text-gray-100 font-bold rounded hover:bg-gray-500"><?php echo $user->nombres; ?></a></td>
                        <td><?php echo $user->apellidos; ?></td>
                        <td><?php echo $user->correo; ?></td>
                        <td><?php echo $user->rol; ?></td>
                        <td><?php echo $user->codigo; ?></td>
                        <td>
                            <?php if ($user->status == 1) : ?><span class=" bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                            <?php else : ?><span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Inactivo</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="<?php echo base_url(); ?>Login/register_user/<?php echo $user->id ?>">
                                    <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>Login/delete/<?php echo $user->id ?>">

                                    <div class="w-6 mr-8 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </a>

                                <a href="<?php echo base_url(); ?>Login/cambiar_password/<?php echo $user->id ?>">

                                    <div class="w-4 mr-8 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
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