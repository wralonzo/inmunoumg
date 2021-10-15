<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-light-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-4 py-10  bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <?php if ($this->session->flashdata('res_login')) : ?>
                <p class="text-2xl text-purple-500 text-opacity-100"><?php echo $this->session->flashdata('res_login'); ?></p>
            <?php endif ?>
            <br>
            <img class="object-cover object-center w-full h-full rounded-full block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12"" src=" <?php echo base_url(); ?>assets/img/Logo.png" />
        </div>
    </div>
</div>

<!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES
<div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
	<div>
		<a title="Buy me a beer" href="<?php echo base_url(); ?>" target="_blank" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
			<img class="object-cover object-center w-full h-full rounded-full" src="<?php echo base_url(); ?>assets/img/Logo.png" />
		</a>
	</div>
</div> -->