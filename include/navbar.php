  <!-- Top Navbar (Hidden on Mobile) -->
  <div class="px-5 sm:px-[100px] mx-auto bg-gray-100 py-2 justify-between items-center text-black text-sm hidden md:flex">
    <div class="flex space-x-6">
      <div class="flex items-center space-x-2">
        <span><img src="img/phone.png" alt=""></span>
        <p>0999 - 888 - 4782</p>
      </div>
      <div class="flex items-center space-x-2">
        <span><img src="img/email.png" alt=""></span>
        <p>cmlrealtyanddevcorp@gmail.com</p>
      </div>
    </div>
    
    <div class="flex space-x-4">
      <a href="#"><img src="img/fb.png" alt=""> </a>
      <a href="#"><img src="img/ig.png" alt=""> </a>
      <a href="#"><img src="img/yt.png" alt=""> </a>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="px-[20px] md:px-[100px] mx-auto bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center h-full w-full" x-data="{ open: false, propertiesOpen: false }">
      <!-- Logo only on mobile, hide company name -->
      <a href="index" class="cursor-pointer text-xl font-bold flex items-center gap-3">
        <img src="img/logo.png" alt="Logo" class="h-auto" style="width: 47px;">
        <span class="hidden md:block">CML Realty and Development Corporation</span>
      </a>

      <!-- Hamburger Menu Icon for Mobile -->
      <button class="md:hidden text-gray-700 flex items-center justify-center" @click="open = !open">
        <img src="img/menu.png" alt="Menu" class="w-full">
      </button>

      <!-- Navbar Links (Hidden by Default on Mobile) -->
      <ul class="flex-col absolute left-0 w-full py-5 bg-white px-[20px] md:px-0 md:flex md:flex-row md:static md:w-auto md:space-x-6"
          :class="open ? 'flex' : 'hidden'"
          style="top: 90px; z-index: 100;"> <!-- Ensure proper z-index for mobile dropdown -->

        <!-- Properties Dropdown for Desktop (hover) -->
        <li class="relative group hidden md:block">
          <a href="#" class="block px-1 py-2 text-gray-700 hover:text-purple-700 font-semibold">
            Properties
          </a>
          <!-- Desktop Dropdown (Visible on Hover) -->
          <ul class="absolute left-0 bg-white shadow-xl mt-2 w-48 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transform translate-y-5 transition-all duration-300 z-50">
            <li><a href="lindayag" class="block px-4 py-2 hover:bg-purple-100">The 18th Lindayag</a></li>
            <li><a href="hansen" class="block px-4 py-2 hover:bg-purple-100">The 18th Hansen</a></li>
            <li><a href="residences" class="block px-4 py-2 hover:bg-purple-100">The 18th Residences</a></li>
          </ul>
        </li>

        <!-- Properties Dropdown for Mobile (Click) -->
        <li class="relative md:hidden">
          <a href="#" class="block px-1 py-2 text-gray-700 hover:text-purple-700 font-semibold" @click.prevent="propertiesOpen = !propertiesOpen">
            Properties
          </a>
          
          <!-- Mobile Dropdown with animation -->
          <ul class="bg-gray-100 p-4"
              x-show="propertiesOpen"
              x-transition:enter="transition transform ease-out duration-300"
              x-transition:enter-start="opacity-0 translate-y-5"
              x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition transform ease-in duration-300"
              x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 translate-y-5"
              @click.away="propertiesOpen = false"
              style="top: 90px; z-index: 50;"> <!-- Increased z-index for visibility -->
            <li><a href="hansen" class="block px-1 py-3 text-gray-700 hover:text-purple-700 font-semibold">The 18th Lindayag</a></li>
            <li><a href="#" class="block px-1 py-3 text-gray-700 hover:text-purple-700 font-semibold">The 18th Hansen</a></li>
            <li><a href="#" class="block px-1 py-3 text-gray-700 hover:text-purple-700 font-semibold">The 18th Residences</a></li>
          </ul>
        </li>

        <li><a href="#" class="block px-1 py-2 text-gray-700 hover:text-purple-700 font-semibold">About</a></li>
        <li><a href="#" class="block px-1 py-2 text-gray-700 hover:text-purple-700 font-semibold">News & Event</a></li>
        <li><a href="#" class="block px-1 py-2 text-gray-700 hover:text-purple-700 font-semibold">Buyers Guide</a></li>
      </ul>
    </div>
  </nav>