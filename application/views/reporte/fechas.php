<style>
    .input {
        transition: border 0.2s ease-in-out;
        min-width: 280px
    }

    .input:focus+.label,
    .input:active+.label,
    .input.filled+.label {
        font-size: .75rem;
        transition: all 0.2s ease-out;
        top: -0.1rem;
        color: #667eea;
    }

    .label {
        transition: all 0.2s ease-out;
        top: 0.4rem;
        left: 0;
    }
</style>
<form class="flex justify-center flex-1" method='POST' action="<?php echo base_url(); ?>Reportes/fechas">

    <div class="shadow-xl p-10 bg-white max-w-xl rounded">
        <h1 class="flex items-center justify-center text-4xl font-black mb-4">Fechas</h1>
        <div class="mb-4 relative">
            <h1 class="text-1xl font-black mb-2">Fecha Inicio</h1>
            <input name="txtFechaInicio" class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-indigo-600 focus:outline-none active:outline-none active:border-indigo-600" id="email" type="date" autofocus required>
            <label for="email" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text"></label>
        </div>
        <div class="mb-4 relative">
            <h1 class="text-1xl font-black mb-2">Fecha Fin</h1>
            <input name="txtFechaFin" class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-indigo-600 focus:outline-none active:outline-none active:border-indigo-600" id="password" type="date" autofocus required>
            <label for="password" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text"></label>
        </div>
        <div class="flex items-center justify-center">
            <button class="flex items-center justify-center bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded" type="submit">Generar Reporte</button>

        </div>
    </div>
</form>
<script>
    var toggleInputContainer = function(input) {
        if (input.value != "") {
            input.classList.add('filled');
        } else {
            input.classList.remove('filled');
        }
    }

    var labels = document.querySelectorAll('.label');
    for (var i = 0; i < labels.length; i++) {
        labels[i].addEventListener('click', function() {
            this.previousElementSibling.focus();
        });
    }

    window.addEventListener("load", function() {
        var inputs = document.getElementsByClassName("input");
        for (var i = 0; i < inputs.length; i++) {
            console.log('looped');
            inputs[i].addEventListener('keyup', function() {
                toggleInputContainer(this);
            });
            toggleInputContainer(inputs[i]);
        }
    });
</script>