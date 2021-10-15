<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Diaco</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <section class="min-h-screen flex flex-col">
        <div class="flex flex-1 items-center justify-center">
            <div class="rounded-lg sm:border-2 px-4 lg:px-24 py-16 lg:max-w-xl sm:max-w-md w-full text-center">
                <div class="fadeIn first">

                </div>
                <form class="text-center" method="post" action="<?php echo base_url(); ?>Autenticar/login">
                    <h1 class="font-bold tracking-wider text-3xl mb-8 w-full text-gray-600">
                        Bienvenido
                    </h1>
                    <?php if ($this->session->flashdata('res_login')) : ?>
                        <p class="text-2xl text-red-500 text-opacity-100"><?php echo $this->session->flashdata('res_login'); ?></p>
                    <?php endif ?>
                    <?php if ($this->session->flashdata('no_access')) : ?>
                        <p class="text-2xl text-red-500 text-opacity-100"><?php echo $this->session->flashdata('no_access'); ?></p>
                    <?php endif ?>
                    <div class="py-2 text-left">
                        <input name='txtEmail' type="email" class="bg-gray-200 border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 " placeholder="Email" />
                    </div>
                    <div class="py-2 text-left">
                        <input name='txtPassword' type="password" class="bg-gray-200 border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 " placeholder="Password" />
                    </div>
                    <div class="py-2">
                        <button type="submit" class="border-2 border-gray-100 focus:outline-none bg-purple-600 text-white font-bold tracking-wider block w-full p-2 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                            Ingresar
                        </button>
                    </div>
                </form>
                <div class="text-center">
                    <!-- <a href="#" class="hover:underline">Forgot password?</a> -->
                </div>
                <div class="text-center mt-12">
                    <span>
                        <!-- Don't have an account? -->
                    </span>
                    <!-- <a href="#" class="font-light text-md text-indigo-600 underline font-semibold hover:text-indigo-800">Create One</a> -->
                </div>
            </div>
        </div>
    </section>

</body>

</html>