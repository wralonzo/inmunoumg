<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title><?php echo (isset($title)) ? $title : 'UMG' ?></title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/Logo.png" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <style>
    @media print {
      .noprint {
        display: none;
      }
    }
  </style>
</head>

<body>
  <!-- This is an example component -->
  <div class="" x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
    <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
      <!-- Loading screen -->
      <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-indigo-800">
        Loading.....
      </div>

      <!-- Sidebar -->
      <div class="flex flex-shrink-0 transition-all noprint">
        <div x-show="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"></div>
        <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-white"></div>

        <!-- Mobile bottom bar -->
        <nav aria-label="Options" class="fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 bg-white border-t border-indigo-100 sm:hidden shadow-t rounded-t-3xl">
          <!-- Menu button -->
          <button @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'" class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2" :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'">
            <span class="sr-only">Toggle sidebar</span>
            <svg aria-hidden="true" class="w-6 h-6" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </button>

          <!-- Logo -->
          <a href="#">
            <img class="w-10 h-auto" src="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" alt="K-UI" />
          </a>

          <!-- User avatar button -->
          <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
            <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})" class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2">
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
              </svg>
              <span class="sr-only">User menu</span>
            </button>
            <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu" tabindex="-1" class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none" role="menu" aria-orientation="vertical" aria-label="user menu">
              <a href="<?php echo base_url(); ?>Login/miPerfil/<?php echo $this->session->userdata('id_empleado'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Mi Perfil</a>

              <!-- <a href="<?php echo base_url(); ?>Login/cambiar_password<?php echo $this->session->userdata('id_user') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Cambiar Clave</a> -->

              <a href="<?php echo base_url(); ?>Login/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Salir</a>
            </div>
          </div>
        </nav>

        <!-- Left mini bar -->
        <nav aria-label="Options" class="noprint z-20 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-white border-r-2 border-indigo-100 shadow-md sm:flex rounded-tr-3xl rounded-br-3xl">
          <!-- Logo -->
          <div class="flex-shrink-0 py-4">
            <a href="<?php echo base_url(); ?>">
              <img src="<?php echo base_url(); ?>assets/img/Logo.png" alt="DIACO " />
            </a>
          </div>
          <div class="flex flex-col items-center flex-1 p-2 space-y-4 noprint">
            <!-- Menu button -->
            <button title="Página de inicio" @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'" class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2" :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'">
              <span class="sr-only">Toggle sidebar</span>
              <svg aria-hidden="true" class="w-6 h-6" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
              </svg>
            </button>
            <!-- Messages button -->

            <!-- toogle de mensajes -->
            <!-- <button
                    @click="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'messagesTab'"
                    class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                    :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'"
                  >
                    <span class="sr-only">Toggle message panel</span>
                    <svg
                      aria-hidden="true"
                      class="w-6 h-6"
                      xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                      />
                    </svg>
                  </button> -->
            <!-- Notifications button -->


            <!-- Catalogo 
            Boton poscionado en la barra de navegacion, 
            cuando se pulsa muestra las opciones de vacunas, departamental y distritos-->
            <button title="Catalogo" @click="(isSidebarOpen && currentSidebarTab == 'catalogoTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'catalogoTab'" class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2" :class="(isSidebarOpen && currentSidebarTab == 'catalogoTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'">
              <span class="sr-only">Catalogo</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
              </svg>
            </button>
            <!-- company -->
            <button title="Padres" @click="(isSidebarOpen && currentSidebarTab == 'companyTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'companyTab'" class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2" :class="(isSidebarOpen && currentSidebarTab == 'companyTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'">
              <span class="sr-only">Padres</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
              </svg>
            </button>


            <a title="Control de vacunacion" href="<?php echo base_url() ?>ControlVacunacion" class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2" :class="(isSidebarOpen && currentSidebarTab == 'controlvacunacion') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'">
              <span class="sr-only">Control de vacunación</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414l5-5a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414 0zm0-6a1 1 0 010-1.414l5-5a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 5.414 5.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </a>


            <button title="Reportes" @click="(isSidebarOpen && currentSidebarTab == 'reportes') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'reportes'" class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2" :class="(isSidebarOpen && currentSidebarTab == 'reportes') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'">
              <span class="sr-only">Reportes</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
              </svg>
            </button>
            <!-- company -->
            <!-- <button title="Pacientes" @click="(isSidebarOpen && currentSidebarTab == 'sucursalesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'sucursalesTab'" class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2" :class="(isSidebarOpen && currentSidebarTab == 'sucursalesTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'">
              <span class="sr-only">Pacientes</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </button> -->
            <a title="Usuarios" href="<?php echo base_url() ?>Login" class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2" :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'">
              <span class="sr-only">usuarios</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
              </svg>
            </a>

            <!-- User avatar -->
            <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
              <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})" class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">User menu</span>
              </button>
              <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu" tabindex="-1" class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none" role="menu" aria-orientation="vertical" aria-label="user menu">
                <a href="<?php echo base_url(); ?>Login/miPerfil/<?php echo $this->session->userdata('id_user'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Mi Perfil</a>

                <a href="<?php echo base_url(); ?>Login/cambiar_password/<?php echo $this->session->userdata('id_user') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Cambiar Clave</a>

                <a href="<?php echo base_url(); ?>Login/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Salir</a>
              </div>
            </div>
        </nav>

        <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen" class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-white border-r-2 border-indigo-100 shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64">
          <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center justify-center flex-shrink-0 py-10">
              <a href="<?php echo base_url(); ?>">
                <!-- <svg
                        class="text-indigo-600"
                        width="96"
                        height="53"
                        fill="currentColor"
                        xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU"
                      >
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M7.691 34.703L13.95 28.2 32.09 52h8.087L18.449 23.418 38.594.813h-8.157L7.692 26.125V.812H.941V52h6.75V34.703zm27.61-7.793h17.156v-5.308H35.301v5.308zM89.19 13v22.512c0 3.703-1.02 6.574-3.058 8.613-2.016 2.04-4.934 3.059-8.754 3.059-3.773 0-6.68-1.02-8.719-3.059-2.039-2.063-3.058-4.945-3.058-8.648V.813h-6.68v34.874c.047 5.297 1.734 9.458 5.062 12.481 3.328 3.023 7.793 4.535 13.395 4.535l1.793-.07c5.156-.375 9.234-2.098 12.234-5.168 3.024-3.07 4.547-7.02 4.57-11.848V13h-6.785zM89 8h7V1h-7v7z"
                        />
                      </svg> -->
                <img class="w-24 h-auto" src="<?php echo base_url(); ?>assets/img/Logo.png" alt="UMG" />
              </a>
            </div>

            <!-- Links -->
            <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto">
              <a href="<?php echo base_url(); ?>" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
                <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                  <svg class="w-6 h-6" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                </span>
                <span>Inicio</span>
              </a>
              <!-- <a href="#" class="flex items-center space-x-2 text-indigo-600 transition-colors rounded-lg group hover:bg-indigo-600 hover:text-white">
                <span aria-hidden="true" class="p-2 transition-colors rounded-lg group-hover:bg-indigo-700 group-hover:text-white">
                  <svg class="w-6 h-6" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                  </svg>
                </span>
                <span>Pages</span>
              </a> -->
            </div>

            <div class="flex-shrink-0 p-4 mt-10 noprint">
              <div class="hidden p-2 space-y-6 bg-gray-100 rounded-lg md:block">
                <!-- <img
                        aria-hidden="true"
                        class="-mt-10"
                        src="https://raw.githubusercontent.com/kamona-ui/dashboard-alpine/52b4b4abb92ef251f6610be416038b48209d7a81/public/assets/images/undraw_web_developer_p3e5.svg"
                      /> -->
                <!-- <p class="text-sm text-indigo-600">
                        Use our <span class="text-base text-indigo-700er">Premium</span> features now! <br />
                      </p> -->
                <a href="<?php echo base_url(); ?>Login/logout" class="w-full px-4 py-2 text-center text-white transition-colors bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-100">
                  Salir
                </a>
              </div>

            </div>
          </nav>

          <section x-show="currentSidebarTab == 'messagesTab'" class="px-4 py-6">
            <button class="w-full px-4 py-2 text-center text-white transition-colors bg-indigo-600 rounded-lg md:hidden hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-100">
              Entrar
            </button>
          </section>

          <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
            <h2 class="text-xl">Usuarios</h2><br>
            <a href="<?php echo base_url(); ?>Login/register" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Nuevo</span>
            </a><br>

            <a href="<?php echo base_url(); ?>Login/" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Lista</span>
            </a>
          </section>


          <!-- Padres -->
          <section x-show="currentSidebarTab == 'companyTab'" class="px-4 py-6">
            <h2 class="text-xl">Pacientes</h2><br>
            <a title="Nuevo" href="<?php echo base_url(); ?>Pacientes/" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Pacientes</span>
            </a><br>

            <a title="Listar" href="<?php echo base_url(); ?>Padres/" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Padres</span>
            </a>
          </section>

          <!-- negocios -->
          <section x-show="currentSidebarTab == 'sucursalesTab'" class="px-4 py-6">
            <h2 class="text-xl">Pacientes</h2><br>
            <a href="<?php echo base_url(); ?>Pacientes/register" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Nueva</span>
            </a><br>

            <a href="<?php echo base_url(); ?>Pacientes/" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Listar</span>
            </a>
          </section>


          <!-- Vacunas -->
          <section x-show="currentSidebarTab == 'catalogoTab'" class="px-4 py-6">
            <h2 class="text-xl">Departamental</h2><br>
            <a href="<?php echo base_url(); ?>Departamental/" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Departamental</span>
            </a><br>

            <a href="<?php echo base_url(); ?>Vacunas/" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Vacunas</span>
            </a>
            <br>
            <a href="<?php echo base_url(); ?>Distritos/" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Distritos</span>
            </a>
          </section>

          <section x-show="currentSidebarTab == 'controlvacunacion'" class="px-4 py-6">
            <h2 class="text-xl">Control de vacunación</h2><br>


            <a href="<?php echo base_url(); ?>ControlVacunacion/" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Lista</span>
            </a>
          </section>

          <!-- reportes -->
          <section x-show="currentSidebarTab == 'reportes'" class="px-4 py-6">
            <h2 class="text-xl">Reportes</h2><br>
            <br>
            <a href="<?php echo base_url(); ?>Reportes/conteos" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Por Género</span>
            </a><br>
            <a href="<?php echo base_url(); ?>Reportes/porfechas" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
              <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span>Dosis por mes</span>
            </a>
          </section>

        </div>
      </div>
      <div class="flex flex-col flex-1">
        <header class="relative flex items-center justify-between flex-shrink-0 p-4">
          <form action="#" class="flex-1">
            <!--  -->
          </form>
          <div class="items-center hidden ml-4 sm:flex">
            <!-- <button @click="isSettingsPanelOpen = true" class="p-2 mr-4 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4">
              <span class="sr-only"></span>
              <svg aria-hidden="true" class="w-6 h-6" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button> -->

            <!-- Github link -->
            <!-- <a href="https://github.com/kamona-ui/dashboard-alpine" target="_blank" class="p-2 text-white bg-black rounded-lg shadow-md hover:text-gray-200 focus:outline-none focus:ring focus:ring-black focus:ring-offset-gray-100 focus:ring-offset-2">
              <span class="sr-only">github link</span>
              <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.026,2c-5.509,0-9.974,4.465-9.974,9.974c0,4.406,2.857,8.145,6.821,9.465 c0.499,0.09,0.679-0.217,0.679-0.481c0-0.237-0.008-0.865-0.011-1.696c-2.775,0.602-3.361-1.338-3.361-1.338 c-0.452-1.152-1.107-1.459-1.107-1.459c-0.905-0.619,0.069-0.605,0.069-0.605c1.002,0.07,1.527,1.028,1.527,1.028 c0.89,1.524,2.336,1.084,2.902,0.829c0.091-0.645,0.351-1.085,0.635-1.334c-2.214-0.251-4.542-1.107-4.542-4.93 c0-1.087,0.389-1.979,1.024-2.675c-0.101-0.253-0.446-1.268,0.099-2.64c0,0,0.837-0.269,2.742,1.021 c0.798-0.221,1.649-0.332,2.496-0.336c0.849,0.004,1.701,0.115,2.496,0.336c1.906-1.291,2.742-1.021,2.742-1.021 c0.545,1.372,0.203,2.387,0.099,2.64c0.64,0.696,1.024,1.587,1.024,2.675c0,3.833-2.33,4.675-4.552,4.922 c0.355,0.308,0.675,0.916,0.675,1.846c0,1.334-0.012,2.41-0.012,2.737c0,0.267,0.178,0.577,0.687,0.479 C19.146,20.115,22,16.379,22,11.974C22,6.465,17.535,2,12.026,2z"></path>
              </svg>
            </a> -->
          </div>

          <!-- Mobile sub header button -->
          <button @click="isSubHeaderOpen = !isSubHeaderOpen" class="p-2 text-gray-400 bg-white rounded-lg shadow-md sm:hidden hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4">
            <span class="sr-only">More</span>

            <svg aria-hidden="true" class="w-6 h-6" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
          </button>

          <!-- Mobile sub header -->
          <div x-transition:enter="transform transition-transform" x-transition:enter-start="translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transform transition-transform" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-full opacity-0" x-show="isSubHeaderOpen" @click.away="isSubHeaderOpen = false" class="absolute flex items-center justify-between p-2 bg-white rounded-md shadow-lg sm:hidden top-16 left-5 right-5">
            <!-- Seetings button -->
            <button @click="isSettingsPanelOpen = true; isSubHeaderOpen = false" class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4">
              <span class="sr-only">Settings</span>
              <svg aria-hidden="true" class="w-6 h-6" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button>
            <!-- Messages button -->

            <!-- boton de mensajes respnsive -->
            <button @click="isSidebarOpen = true; currentSidebarTab = 'messagesTab'; isSubHeaderOpen = false" class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4">
              <span class="sr-only">Toggle message panel</span>
              <svg aria-hidden="true" class="w-6 h-6" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
              </svg>
            </button>


            <!-- Notifications button -->
            <button @click="isSidebarOpen = true; currentSidebarTab = 'notificationsTab'; isSubHeaderOpen = false" class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4">
              <span class="sr-only">Usuarios panel</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
              </svg>
            </button>
            <!-- Github link -->
            <a href="https://github.com/kamona-ui/dashboard-alpine" target="_blank" class="p-2 text-white bg-black rounded-lg shadow-md hover:text-gray-200 focus:outline-none focus:ring focus:ring-black focus:ring-offset-gray-100 focus:ring-offset-2">
              <span class="sr-only">github link</span>
              <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" xmlns="https://lh3.googleusercontent.com/proxy/KhhrsgfhyrW2sa39MNQEAXuAaw1PI0h0dJDITA251kENDsl9X6KvoDNqhAtRFHYgp4Mpl-PofohVQhvyswCH2UL-HiY9Zbonm6udGi_2b9NItSnUYaEU" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.026,2c-5.509,0-9.974,4.465-9.974,9.974c0,4.406,2.857,8.145,6.821,9.465 c0.499,0.09,0.679-0.217,0.679-0.481c0-0.237-0.008-0.865-0.011-1.696c-2.775,0.602-3.361-1.338-3.361-1.338 c-0.452-1.152-1.107-1.459-1.107-1.459c-0.905-0.619,0.069-0.605,0.069-0.605c1.002,0.07,1.527,1.028,1.527,1.028 c0.89,1.524,2.336,1.084,2.902,0.829c0.091-0.645,0.351-1.085,0.635-1.334c-2.214-0.251-4.542-1.107-4.542-4.93 c0-1.087,0.389-1.979,1.024-2.675c-0.101-0.253-0.446-1.268,0.099-2.64c0,0,0.837-0.269,2.742,1.021 c0.798-0.221,1.649-0.332,2.496-0.336c0.849,0.004,1.701,0.115,2.496,0.336c1.906-1.291,2.742-1.021,2.742-1.021 c0.545,1.372,0.203,2.387,0.099,2.64c0.64,0.696,1.024,1.587,1.024,2.675c0,3.833-2.33,4.675-4.552,4.922 c0.355,0.308,0.675,0.916,0.675,1.846c0,1.334-0.012,2.41-0.012,2.737c0,0.267,0.178,0.577,0.687,0.479 C19.146,20.115,22,16.379,22,11.974C22,6.465,17.535,2,12.026,2z"></path>
              </svg>
            </a>
          </div>
        </header>

        <div class="flex items-center">
          <!-- Main -->
          <main class="justify-center flex-1 ">
            <!-- <main class="flex items-center justify-center flex-1 "> -->