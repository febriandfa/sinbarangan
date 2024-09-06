<aside class="bg-sidebar h-auto w-80 hidden sm:block shadow-xl p-8 gap-x-11 space">
    <div class="gap-1 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="32" viewBox="0 0 24 32" fill="none">
            <path d="M13.7002 0.539454C12.1585 0.149047 10.5504 0.0975994 8.98691 0.388656C7.42337 0.679713 5.94153 1.30635 4.64355 2.22538C3.34556 3.14441 2.2623 4.33397 1.46843 5.71206C0.674554 7.09015 0.188952 8.624 0.0450934 10.2079C-0.0987653 11.7918 0.102541 13.388 0.635137 14.8866C1.16773 16.3851 2.01895 17.7504 3.13011 18.8883C4.24128 20.0261 5.58596 20.9095 7.07148 21.4774C8.557 22.0454 10.148 22.2846 11.7349 22.1783L11.3674 16.6906C10.574 16.7437 9.7785 16.6242 9.03574 16.3402C8.29298 16.0562 7.62064 15.6145 7.06506 15.0456C6.50947 14.4766 6.08387 13.794 5.81757 13.0447C5.55127 12.2954 5.45062 11.4973 5.52255 10.7054C5.59448 9.91344 5.83728 9.14652 6.23421 8.45747C6.63115 7.76842 7.17278 7.17364 7.82177 6.71413C8.47077 6.25462 9.21168 5.9413 9.99345 5.79577C10.7752 5.65024 11.5793 5.67596 12.3501 5.87117L13.7002 0.539454Z" fill="#F6F7F9"/>
            <path d="M10.0371 9.9042C11.5788 9.51379 13.1869 9.46235 14.7504 9.7534C16.3139 10.0445 17.7958 10.6711 19.0938 11.5901C20.3917 12.5092 21.475 13.6987 22.2689 15.0768C23.0628 16.4549 23.5484 17.9887 23.6922 19.5726C23.8361 21.1565 23.6348 22.7528 23.1022 24.2513C22.5696 25.7499 21.7184 27.1152 20.6072 28.253C19.496 29.3908 18.1513 30.2742 16.6658 30.8422C15.1803 31.4102 13.5893 31.6493 12.0024 31.5431L12.3699 26.0553C13.1633 26.1085 13.9588 25.9889 14.7016 25.7049C15.4443 25.4209 16.1167 24.9792 16.6722 24.4103C17.2278 23.8414 17.6534 23.1588 17.9197 22.4095C18.186 21.6602 18.2867 20.8621 18.2148 20.0701C18.1428 19.2782 17.9 18.5113 17.5031 17.8222C17.1062 17.1332 16.5645 16.5384 15.9155 16.0789C15.2665 15.6194 14.5256 15.306 13.7439 15.1605C12.9621 15.015 12.1581 15.0407 11.3872 15.2359L10.0371 9.9042Z" fill="#F6F7F9"/>
            </svg>
        <a href="index.html" class="text-white text-lg font-bold uppercase p-2">sinbarangan</a>
    </div>
    <div class="x-3 py-4 overflow-y-auto rounded">
        <ul class="py-2 space-y-2 text-lg items-start" >
          <p class="flex text-white text-sm py-4 pl-6 ">
            Dashboard  {{ Auth::user()->name }}
          </p>
          <li>
            <a href="{{ route('dashboard') }}" class="flex text-white py-4 pl-6 text-color nav-item rounded-lg items-center gap-3">
                <i class="fas fa-th-large fa-1x"></i>
                Dashboard
            </a>
          </li>
          <li>
            <a href="/guru/LKPD" class="flex text-white py-4 pl-6 text-color nav-item rounded-lg items-center gap-3">
                <i class="fas fa-book fa-1x"></i>
                LKPD
            </a>
          </li>
            <li>
                <a href="/guru/kelompok" class="flex text-white text-color py-4 pl-6 nav-item rounded-lg items-center gap-3">
                    <i class="< fas fa-light fa-users fa-1x"></i>
                    Kelompok
                </a>
            </li>
            <li>
                <a href="/guru/kuis" class="flex text-white text-color py-4 pl-6 nav-item rounded-lg items-center gap-3">
                    <i class="fas fa-award fa-1x"></i>
                    Kuis
                </a>
            </li>
            <li>
                <button type="button" class="flex w-full py-4 pl-6 text-white nav-item transition duration-75 rounded-lg items-center gap-3" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i class="fas fa-light fa-book-open fa-1x"></i>
                    <span  sidebar-toggle-item>Materi</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
                      <ul id="dropdown-example" class="hidden py-2 space-y-2">
                          <li class="px-4">
                              <a href="/guru/modul"
                                  class="flex text-white text-color py-4 pl-6 nav-item rounded-lg items-center gap-3">
                                  <i class="fas fa-book-reader"></i>
                                  Modul
                                </a>
                          </li>
                          <li class="px-4">
                              <a href="/guru/materi"
                                  class="flex text-white text-color py-4 pl-6 nav-item rounded-lg items-center gap-3">
                                  <i class="fas fa-play"></i>
                                    
                                  Simulasi
                                </a>
                          </li>
                      </ul>
                  </li>
              </ul>
    </div>
    <div class="flex text-white text-color py-4 pl-6 nav-item rounded-lg gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        <a href="#">Panduan</a>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
    <div class="flex text-white text-color py-4 pl-6 nav-item rounded-lg gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
    </div>
    </form>
</aside>