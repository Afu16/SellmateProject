<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Omzet Management</title>
      @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body>
    
    <div class="hidden md:block">
        
        
        <div class="bg-[#f5f7fa] min-h-screen">
        <!-- Header with greeting -->
        <div class="bg-primary sticky top-0 z-10 w-full p-5 shadow-sm flex flex-row gap-10 min-h-[15svh]">
            <div class="mt-5 sm:mt-3">
                <h1 class="text-[30px] hidden md:block mt-[1.5vh] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-rounded text-white">Sellmate</h1>  
                <h1 class="text-[15px] md:hidden sm:text-lg md:text-3xl font-pilcrow font-pilcrow-heavy text-white">Hello DEDEN,</h1>  
                <p class=" text-[10px] md:hidden sm:text-xs md:text-sm font-quicksand font-quicksand-regular text-white mb-4">Ada yang bisa kami bantu?</p>    
            </div>
            <div class="mt-0">
                <button id="userDropdownBtn" class="flex absolute top-8 right-5 items-center p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-[7vh] md:w-36 md:h-14 xl:w-44 xl:h-16 hover:bg-tertiary transition-colors">
                    <h3 class="text-xs font-pilcrow font-pilcrow-semibold text-black ml-2">
                        DEDEN
                    </h3>
            <!-- Avatar Dynamic -->
            <div
                class="absolute right-6 md:right-7 w-10 h-10 rounded-full border-2 border-black flex items-center justify-center bg-gray-300 text-black font-bold overflow-hidden"
            >
            {{-- <img
                v-if="$page.props.auth.user.foto_link"
                :src="`/storage/${$page.props.auth.user.foto_link}`"
                alt="Profile Photo"
                class=" w-[10vw] h-10 object-cover"
            /> --}}
            <span v-else>
             FOTO
            </span>
            </div>
                    <svg class="absolute md:hidden w-4 h-4 text-black right-[2vw] ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="userDropdown" class="absolute top-[8vh] right-5 md:right-[10vw] mt-2 -ml-4 w-32 h-14 md:w-36 xl:w-44 rounded-xl z-50 hidden">
                    <div class="py-2">
                        <a href="/settings" class="flex mb-2 mt-5 items-center px-4 py-3 text-xs text-black border-2 border-black rounded-xl shadow-black bg-white hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Edit Profile
                        </a> 
                        <form method="POST" action="route('logout')" class="w-full">
                            <button type="submit" class="flex items-center px-4 py-3 text-xs text-black border-2 border-black rounded-xl shadow-black bg-white hover:bg-red-50 transition-colors w-full">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="flex flex-row">
            <div class="w-[15%] sticky top-[15svh] -ml-2 flex flex-col border-r-2 h-screen border-black">
                <a
                    href="/admin/dashboard"
                    class=" {{ request()->path() == 'admin/dashboard' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"
                >
                    <img src="/assets/svg/dashboard-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Dashboard
                </a>
                <a
                    href="/admin/users"
                    class=" {{ request()->path() == 'admin/users' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"
                >
                    <img src="/assets/svg/userManage-icon.svg" alt="User Management" class="w-[2vw] h-[2vh] mr-1">
                    User Management
                </a>
                <a
                    href="/admin/products"
                    class=" {{ request()->path() == 'admin/products' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"
                >
                    <img src="/assets/svg/product-icon.svg" alt="Produk" class="w-[2vw] h-[2vh] mr-1">
                    Produk
                </a>
                <a
                    href="/admin/omzet"
                    class=" {{ request()->path() == 'admin/omzet' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"
                >
                    <img src="/assets/svg/totalOmzet2-icon.svg" alt="Total Omzet" class="w-[2vw] h-[2vh] mr-1">
                    Total Omzet
                </a>
                <a
                    href="/admin/videos"
                    class=" {{ request()->path() == 'admin/videos' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"
                >   
                    <img src="/assets/svg/blackVideo-icon.svg" alt="Video" class="w-[2vw] h-[2vh] mr-1">
                    Video
                </a>
                <a
                    href="/admin/ebooks"
                    class=" {{ request()->path() == 'admin/ebooks' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"
                >
                    <img src="/assets/svg/blackEbook-icon.svg" alt="Ebook" class="w-[2vw] h-[2vh] mr-1">
                    Ebook
                </a>
                <a
                    href="/admin/articles"
                    class=" {{ request()->path() == 'admin/articles' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"    
                >
                    <img src="/assets/svg/blackArticle-icon.svg" alt="Artikel" class="w-[2vw] h-[2vh] mr-1">
                    Artikel
                </a>
            </div>


               <div class="w-full p-5">
                <div class="flex flex-row">
                    <div class="w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Top Omzet</h1>
                          <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">
                             Tetap monitoring progres dan update aktivitas pendapatan Tefa
                          </p>
                    </div>
                </div>

                <div class="border-2 border-black shadow-black p-2 rounded-xl">
                    <div class="flex flex-row justify-between items-center mb-3">
                        <div class="text-[1vw] font-quicksand font-quicksand-regular text-black">
                            {{-- blank --}}
                        </div>
                         <div class="flex items-center gap-2">
                                <div class="relative">
                                    <input
                                    type="search"
                                        name="search"
                                    id="search"
                                    placeholder="Search"
                                    class="w-[15vw] h-[3.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 pr-8 text-[7px] focus:outline-none focus:ring-2 focus:ring-primary"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 h-3 w-3 text-black cursor-pointer"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    >
                                    <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                    />
                                </svg>
                        </div>
                    </div>
                </div>

                <table class="w-full">  
                    <tr  class="text-center">
                        <td>No</td>
                        <td>Nama</td>
                        <td>Jurusan</td>
                        <td>Top Omzet</td>
                        <td>Nilai</td>
                    </tr>
                    <tr class="">
                        <td colspan="6">
                            <div class="w-full h-[1px] bg-black rounded-full"></div>
                        </td>
                    </tr>
                    <tr  class="text-center">
                        <td>1</td>
                        <td>Charless</td>
                        <td>PMN</td>
                        <td>Rp 2.000.000</td>
                        <td>A</td>
                    </tr>
                      <tr  class="text-center">
                        <td>2</td>
                        <td>Charless</td>
                        <td>PMN</td>
                        <td>Rp 2.000.000</td>
                        <td>A</td>
                    </tr>
                </table>
            </div>
            </div>
        </body>
</html>