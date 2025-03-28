<!doctype html>
<html lang="en">
  <?php include 'include/head.php' ?>
  <body style="overflow-y: hidden;">
    <?php include 'include/navbar.php' ?>

    <!-- Banner Section -->
    <div class="relative" style="height: 700px;">
      <!-- Background Image -->
      <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/banner.png'); background-size: cover;"></div>

      <!-- Black Overlay with 50% Opacity -->
      <div class="absolute inset-0 bg-black opacity-50"></div>

      <!-- Text Content -->
      <div class="absolute bottom-10 text-white w-full md:w-[858px] px-[20px] md:px-[100px]" data-aos="fade-up" data-aos-duration="1200">
        <h1 class="text-[24px] md:text-[48px] font-bold">The 18th Condominium</h1>
        <p class="mt-2 text-[16px] md:text-[24px]">Discover modern living in the heart of the city. Your perfect home awaits—elegant design, exceptional amenities, and unbeatable convenience.</p>
        <button class="mt-4 px-6 w-[214px] h-[50px] py-2 bg-[#662D91] text-[18px] text-white font-semibold hover:bg-[#552777]">Explore</button>
      </div>
    </div>

    <!-- 3 columns -->
    <div class="bg-[#4A2168] text-white p-10 flex flex-col md:flex-row md:h-[250px] justify-between items-center gap-[25px] md:gap-0">
      <div class="flex flex-col justify-center items-center w-full my-[30px]" data-aos="fade-up" data-aos-duration="1000">
        <span class="text-3xl"><img src="img/house.png" alt="properties"></span>
        <h2 class="text-[24px] font-semibold mt-2">View Properties</h2>
        <p class="text-[16px]">Explore available homes.</p>
      </div>
      <div class="flex flex-col justify-center items-center w-full my-[30px]" data-aos="fade-up" data-aos-duration="1200">
        <span class="text-3xl"><img src="img/dollar.png" alt="dollar"></span>
        <h2 class="text-[24px] font-semibold mt-2">Get Estimate</h2>
        <p class="text-[16px]">Request a price breakdown.</p>
      </div>
      <div class="flex flex-col justify-center items-center w-full my-[30px]" data-aos="fade-up" data-aos-duration="1400">
        <span class="text-3xl"><img src="img/headset.png" alt="headset"></span>
        <h2 class="text-[24px] font-semibold mt-2">Book Tour</h2>
        <p class="text-[16px]">Schedule a showroom visit.</p>
      </div>
    </div>

    <!-- For Sale -->
    <div class="max-w-full mx-[20px] md:mx-[100px] my-[80px]">
      <h2 class="text-3xl font-bold mt-12" data-aos="fade-up">For Sale</h2>
      <p class="text-gray-600 mb-12" data-aos="fade-up">
        Explore a selection of premium properties for sale. Find your perfect home today!
      </p>
      <span class="text-[18px] m-[15px] text-center font-semibold" data-aos="fade-up">The 18th Hansen</span>
      
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">
        <!-- Repeat 4 Cards -->
        <div class="bg-white border-[#EAE9EB] border-[1px] overflow-hidden transition-all duration-300 relative group" data-aos="fade-up" data-aos-duration="1200">
          <img src="img/properties/UNIT A - 1 BEDROOM/thumbnail.jpg" alt="Unit C Studio Type" class="w-full h-48 object-cover" />
          <div class="p-4">
            <div class="flex justify-between items-center mb-2">
              <h3 class="font-semibold text-lg"><a href="properties-details">Unit A - 1 Bedroom w/ Balcony</a></h3>
              <span class="text-gray-600 text-sm flex gap-2 items-center w-[103px]"><img src="img/ruler.png" alt=""> 25 sqm</span>
            </div>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/type.png" alt=""> Project Type: High-rise Condominium</p>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/date.png" alt="">Turn Over Date: 2028</p>
            <div class="flex justify-end w-full py-2">
              <!-- Right-aligned Price -->
              <p class="font-bold text-lg">Php 0</p>
            </div>
          </div>
          <div class="absolute -bottom-10 left-0 w-full bg-purple-600 text-white text-center py-2 opacity-0 group-hover:opacity-100 group-hover:bottom-0 transition-all duration-300">
            <a href="properties-details">Details</a>
          </div>
        </div>
        
        <div class="bg-white border-[#EAE9EB] border-[1px] overflow-hidden transition-all duration-300 relative group" data-aos="fade-up" data-aos-duration="1200">
          <img src="img/properties/UNIT B - STUDIO TYPE/thumbnail.jpg" alt="Unit C Studio Type" class="w-full h-48 object-cover" />
          <div class="p-4">
            <div class="flex justify-between items-center mb-2">
              <h3 class="font-semibold text-lg"><a href="properties-details2">Unit B - Studio Type w/ Bacony</a></h3>
              <span class="text-gray-600 text-sm flex gap-2 items-center w-[103px]"><img src="img/ruler.png" alt=""> 19 sqm</span>
            </div>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/type.png" alt=""> Project Type: High-rise Condominium</p>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/date.png" alt="">Turn Over Date: 2028</p>
            <div class="flex justify-end w-full py-2">
              <!-- Right-aligned Price -->
              <p class="font-bold text-lg">Php 0</p>
            </div>
          </div>
          <div class="absolute -bottom-10 left-0 w-full bg-purple-600 text-white text-center py-2 opacity-0 group-hover:opacity-100 group-hover:bottom-0 transition-all duration-300">
            <a href="properties-details2">Details</a>
          </div>
        </div>

        <div class="bg-white border-[#EAE9EB] border-[1px] overflow-hidden transition-all duration-300 relative group" data-aos="fade-up" data-aos-duration="1200">
          <img src="img/properties/UNIT C - STUDIO TYPE/thumbnail.jpg" alt="Unit C Studio Type" class="w-full h-48 object-cover" />
          <div class="p-4">
            <div class="flex justify-between items-center mb-2">
              <h3 class="font-semibold text-lg"><a href="properties-details3">Unit C - Studio Type w/ Bacony</a></h3>
              <span class="text-gray-600 text-sm flex gap-2 items-center w-[103px]"><img src="img/ruler.png" alt=""> 19 sqm</span>
            </div>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/type.png" alt=""> Project Type: High-rise Condominium</p>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/date.png" alt="">Turn Over Date: 2028</p>
            <div class="flex justify-end w-full py-2">
              <!-- Right-aligned Price -->
              <p class="font-bold text-lg">Php 0</p>
            </div>
          </div>
          <div class="absolute -bottom-10 left-0 w-full bg-purple-600 text-white text-center py-2 opacity-0 group-hover:opacity-100 group-hover:bottom-0 transition-all duration-300">
            <a href="properties-details3">Details</a>
          </div>
        </div>

        <div class="bg-white border-[#EAE9EB] border-[1px] overflow-hidden transition-all duration-300 relative group" data-aos="fade-up" data-aos-duration="1200">
          <img src="img/properties/UNIT C - STUDIO TYPE/thumbnail.jpg" alt="Unit C Studio Type" class="w-full h-48 object-cover" />
          <div class="p-4">
            <div class="flex justify-between items-center mb-2">
              <h3 class="font-semibold text-lg"><a href="properties-details4">Unit D - 2 Bedroom w/ Bacony</a></h3>
              <span class="text-gray-600 text-sm flex gap-2 items-center w-[103px]"><img src="img/ruler.png" alt=""> 32 sqm</span>
            </div>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/type.png" alt=""> Project Type: High-rise Condominium</p>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/date.png" alt="">Turn Over Date: 2028</p>
            <div class="flex justify-end w-full py-2">
              <!-- Right-aligned Price -->
              <p class="font-bold text-lg">Php 0</p>
            </div>
          </div>
          <div class="absolute -bottom-10 left-0 w-full bg-purple-600 text-white text-center py-2 opacity-0 group-hover:opacity-100 group-hover:bottom-0 transition-all duration-300">
            <a href="properties-details4">Details</a>
          </div>
        </div>

        <div class="bg-white border-[#EAE9EB] border-[1px] overflow-hidden transition-all duration-300 relative group" data-aos="fade-up" data-aos-duration="1200">
          <img src="img/properties/UNIT C - STUDIO TYPE/thumbnail.jpg" alt="Unit C Studio Type" class="w-full h-48 object-cover" />
          <div class="p-4">
            <div class="flex justify-between items-center mb-2">
              <h3 class="font-semibold text-lg"><a href="properties-details5">Unit E - 1 Bedroom</a></h3>
              <span class="text-gray-600 text-sm flex gap-2 items-center w-[103px]"><img src="img/ruler.png" alt=""> 22.3 sqm</span>
            </div>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/type.png" alt=""> Project Type: High-rise Condominium</p>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/date.png" alt="">Turn Over Date: 2028</p>
            <div class="flex justify-end w-full py-2">
              <!-- Right-aligned Price -->
              <p class="font-bold text-lg">Php 0</p>
            </div>
          </div>
          <div class="absolute -bottom-10 left-0 w-full bg-purple-600 text-white text-center py-2 opacity-0 group-hover:opacity-100 group-hover:bottom-0 transition-all duration-300">
            <a href="properties-details5">Details</a>
          </div>
        </div>

        <div class="bg-white border-[#EAE9EB] border-[1px] overflow-hidden transition-all duration-300 relative group" data-aos="fade-up" data-aos-duration="1200">
          <img src="img/properties/UNIT C - STUDIO TYPE/thumbnail.jpg" alt="Unit C Studio Type" class="w-full h-48 object-cover" />
          <div class="p-4">
            <div class="flex justify-between items-center mb-2">
              <h3 class="font-semibold text-lg"><a href="properties-details6">Unit F - 1 Bedroom</a></h3>
              <span class="text-gray-600 text-sm flex gap-2 items-center w-[103px]"><img src="img/ruler.png" alt=""> 23.6 sqm</span>
            </div>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/type.png" alt=""> Project Type: High-rise Condominium</p>
            <p class="text-gray-600 text-sm flex gap-2 items-center"><img src="img/date.png" alt="">Turn Over Date: 2028</p>
            <div class="flex justify-end w-full py-2">
              <!-- Right-aligned Price -->
              <p class="font-bold text-lg">Php 0</p>
            </div>
          </div>
          <div class="absolute -bottom-10 left-0 w-full bg-purple-600 text-white text-center py-2 opacity-0 group-hover:opacity-100 group-hover:bottom-0 transition-all duration-300">
            <a href="properties-details6">Details</a>
          </div>
        </div>
      </div>
    </div>

    <!-- News and Events -->
    <div class="max-w-full mx-[20px] md:mx-[100px] mb-12">
      <h2 class="text-3xl font-bold mt-12" data-aos="fade-up" data-aos-duration="1000">News & Events</h2>
      <p class="text-gray-600 mb-12" data-aos="fade-up" data-aos-duration="1200">Be in the know about exciting updates and upcoming activities!</p>

      <div class="grid md:grid-cols-3 gap-6 mt-6">
        <!-- Card 1 -->
        <div class="bg-white border-[#EAE9EB] border-[1px] overflow-hidden p-[20px]" data-aos="fade-up" data-aos-duration="1300">
          <img src="img/news/happyhour.jpg" alt="Happy Hour" class="w-full h-[355px] object-cover">
          <div>
            <h3 class="text-[18px] font-bold my-2">Happy Hour at Costa Del Subic</h3>
            <p class="text-gray-600 text-[16px]">Sunset vibes and unlimited cocktails! Join the Happy Hour every Friday night at Costa Del Subic. Only 699 Pesos from 6pm to 8pm.</p>

            <!-- Flexbox container for date and events button -->
            <div class="flex justify-between items-center mt-2">
              <p class="text-gray-400 text-xs">March 15, 2025</p>
              <span class="bg-[#662D91] text-white px-4 py-2 w-[80px] h-[30px] text-center flex items-center justify-center">Events</span>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white border-[#EAE9EB] border-[1px] overflow-hidden p-[20px]" data-aos="fade-up" data-aos-duration="1400">
          <img src="img/news/sexyhour.jpg" alt="Happy Hour" class="w-full h-[355px] object-cover">
          <div>
            <h3 class="text-[18px] font-bold my-2">Sexy Hour at Costa Del Subic</h3>
            <p class="text-gray-600 text-[16px]">Sunset vibes and unlimited cocktails! Join the Happy Hour every Friday night at Costa Del Subic. Only 699 Pesos from 6pm to 8pm.</p>

            <!-- Flexbox container for date and events button -->
            <div class="flex justify-between items-center mt-2">
              <p class="text-gray-400 text-xs">March 15, 2025</p>
              <span class="bg-[#662D91] text-white px-4 py-2 w-[80px] h-[30px] text-center flex items-center justify-center">Events</span>
            </div>
          </div>
        </div>

        
      </div>

      <div class="text-center mt-6" data-aos="fade-up" data-aos-duration="1600">
        <button class="px-6 w-[214px] h-[50px] py-2 bg-[#662D91] text-[16px] text-white hover:bg-[#552777]">Learn More</button>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'include/footer.php' ?>

  </body>
  <script src="src/js/main.js"></script>
  <script>
        document.getElementById('whatsappButton').addEventListener('click', function() {
            document.getElementById('whatsappBox').classList.toggle('hidden');
        });
    </script>
</html>
