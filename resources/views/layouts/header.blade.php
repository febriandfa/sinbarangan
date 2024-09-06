<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="flex justify-start"> <h1 class="font-semibold text-2xl">Dashboard</h1> </div>
    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <div>
            <h1 class="px-2">Albert Suprapto</h1>
            <h2 class="px-2 justify-end flex">{{ Auth::user()->name }}</h2>
        </div>



<!-- Modal toggle -->
<button data-modal-target="extralarge-modal"  data-modal-toggle="extralarge-modal" class="block font-medium rounded-full dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    <img class="rounded-full" src="https://via.placeholder.com/52x52" />
  </button>

  <!-- Main modal -->
  <div id="extralarge-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-auto md:inset-0 h-auto max-h-full p-6">
      <div class="relative w-full max-w-7xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="large-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
              </div>
              <div class="flex p-6">
                <div class="w-1/4">
                    <img class="w-48 h-48 rounded-full" src="https://via.placeholder.com/52x52" />
                  </div>
                  <!-- Modal body -->
                  <div class="w-3/4">
                      <form class="space-y-4" action="#">
                          <div>
                              <label for="name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama Depan</label>
                              <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                          </div>
                          <div>
                              <label for="name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama Belakang</label>
                              <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                          </div>
                          <div>
                            <label for="password" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Kelas</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nomor Absen</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>


    </div>
</header>
