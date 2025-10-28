<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    users: Array,
    majors: Array,
});

const searchQuery = ref('');
const filteredUsers = ref([...props.users]);
const showAddModal = ref(false);
const showEditModal = ref(false);
const showDeleteModal = ref(false);
const selectedUser = ref(null);

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    major: '',
    role: 'user',
    foto: null,
});

const editForm = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    major: '',
    role: '',
    foto: null,
    _method: 'PUT',
});

const resetForm = () => {
    form.reset();
    form.clearErrors();
};

const resetEditForm = () => {
    editForm.reset();
    editForm.clearErrors();
};

const openAddModal = () => {
    resetForm();
    showAddModal.value = true;
};

const closeAddModal = () => {
    resetForm();
    showAddModal.value = false;
};

const openEditModal = (user) => {
    selectedUser.value = user;
    editForm.name = user.name;
    editForm.email = user.email;
    editForm.major = user.major || '';
    editForm.role = user.role;
    showEditModal.value = true;
};

const closeEditModal = () => {
    resetEditForm();
    showEditModal.value = false;
};

const openDeleteModal = (user) => {
    selectedUser.value = user;
    showDeleteModal.value = true;
};

const closeDeleteModal = () => {
    selectedUser.value = null;
    showDeleteModal.value = false;
};

const submitForm = () => {
    form.post(route('admin.users.store'), {
        preserveScroll: true,
        onSuccess: () => {
            closeAddModal();
        },
    });
};

const submitEditForm = () => {
    editForm.post(route('admin.users.update', selectedUser.value.id), {
        preserveScroll: true,
        onSuccess: () => {
            closeEditModal();
        },
    });
};

const deleteUser = () => {
    if (selectedUser.value) {
        useForm({}).delete(route('admin.users.destroy', selectedUser.value.id), {
            preserveScroll: true,
            onSuccess: () => {
                closeDeleteModal();
            },
        });
    }
};

const handleFileUpload = (event) => {
    form.foto = event.target.files[0];
};

const handleEditFileUpload = (event) => {
    editForm.foto = event.target.files[0];
};

watch(searchQuery, (newValue) => {
    if (newValue.trim() === '') {
        filteredUsers.value = [...props.users];
    } else {
        const query = newValue.toLowerCase();
        filteredUsers.value = props.users.filter(user => 
            user.name.toLowerCase().includes(query) || 
            user.email.toLowerCase().includes(query) || 
            (user.major && user.major.toLowerCase().includes(query))
        );
    }
});
</script>

<template>
    <Head title="User Management" />
    
    <div class="hidden md:block">
        <!-- Success Notification -->
        <div
            v-if="$page.props.flash?.success"
            id="notif"
            class="fixed top-5 right-5 z-50 mb-4 px-5 py-4 rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-xl w-80 animate-slide-in"
        >
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <!-- Icon -->
                    <span class="text-xl">✅</span>
                    <p class="text-sm font-medium">{{ $page.props.flash.success }}</p>
                </div>
                <!-- Close Button -->
                <button
                    @click="document.getElementById('notif').style.display = 'none'"
                    class="ml-3 text-white hover:text-gray-200 font-bold text-lg"
                    aria-label="Close notification"
                >
                    ×
                </button>
            </div>
        </div>
        
        <div class="bg-[#f5f7fa] min-h-screen">
        <!-- Header with greeting -->
        <div class="bg-primary w-full p-5 shadow-sm flex flex-row gap-10 min-h-[15svh]">
            <div class="mt-5 sm:mt-3">
                <h1 class="text-[30px] hidden md:block mt-[1.5vh] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-rounded text-white">Sellmate</h1>  
                <h1 class="text-[15px] md:hidden sm:text-lg md:text-3xl font-pilcrow font-pilcrow-heavy text-white">Hello {{ $page.props.auth.user.name.split(' ')[0] }},</h1>  
                <p class=" text-[10px] md:hidden sm:text-xs md:text-sm font-quicksand font-quicksand-regular text-white mb-4">Ada yang bisa kami bantu?</p>    
            </div>
            <div class="mt-0">
                <button id="userDropdownBtn" class="flex absolute top-8 right-5 items-center p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-[7vh] md:w-36 md:h-14 xl:w-44 xl:h-16 hover:bg-tertiary transition-colors">
                    <h3 class="text-xs font-pilcrow font-pilcrow-semibold text-black ml-2">
                        {{ $page.props.auth.user.name.split(' ')[0] }}
                    </h3>
            <!-- Avatar Dynamic -->
            <div
                class="absolute right-6 md:right-7 w-10 h-10 rounded-full border-2 border-black flex items-center justify-center bg-gray-300 text-black font-bold overflow-hidden"
            >
            <img
                v-if="$page.props.auth.user.foto_link"
                :src="`/storage/${$page.props.auth.user.foto_link}`"
                alt="Profile Photo"
                class=" w-[10vw] h-10 object-cover"
            />
            <span v-else>
                {{ $page.props.auth.user.name.charAt(0).toUpperCase() }}
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
                        <form method="POST" :action="route('logout')" class="w-full" @submit.prevent="$inertia.post(route('logout'))">
                            <input type="hidden" name="_token" :value="$page.props.jetstream?.csrf_token ?? $page.props.csrf_token" />
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
            <div class="w-[15%] -ml-2 flex flex-col border-r-2 h-screen border-black">
                <Link
                    href="/admin/dashboard"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/dashboard',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/dashboard-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Dashboard
                </Link>
                <Link
                    href="/admin/users"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/users',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/userManage-icon.svg" alt="User Management" class="w-[2vw] h-[2vh] mr-1">
                    User Management
                </Link>
                <Link
                    href="/admin/products"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/products',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/product-icon.svg" alt="Produk" class="w-[2vw] h-[2vh] mr-1">
                    Produk
                </Link>
                <Link
                    href="/admin/omzet"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/omzet',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/totalOmzet2-icon.svg" alt="Total Omzet" class="w-[2vw] h-[2vh] mr-1">
                    Total Omzet
                </Link>
                <Link
                    href="/admin/videos"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/videos',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >   
                    <img src="/assets/svg/blackVideo-icon.svg" alt="Video" class="w-[2vw] h-[2vh] mr-1">
                    Video
                </Link>
                <Link
                    href="/admin/ebooks"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/ebooks',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/blackEbook-icon.svg" alt="Ebook" class="w-[2vw] h-[2vh] mr-1">
                    Ebook
                </Link>
                <Link
                    href="/admin/articles"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/articles',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/blackArticle-icon.svg" alt="Artikel" class="w-[2vw] h-[2vh] mr-1">
                    Artikel
                </Link>
                <Link
                    href="/admin/history"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/history',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/blackHistory-icon.svg" alt="Histori" class="w-[1.5vw] h-[1.5vh] mr-1">
                    Histori
                </Link>
            </div>
            
            <div class="w-full p-5">
                <h1 class="text-big font-pilcrow font-pilcrow-rounded font-bold text-black">User Management</h1>
                <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">
                    Kelola pengguna aplikasi Sellmate
                </p>

                <!-- Search and Add User -->
                <div class="flex justify-between mb-5">
                    <div class="relative w-1/3">
                        <input 
                            type="text" 
                            v-model="searchQuery"
                            placeholder="Cari pengguna..." 
                            class="w-full px-4 py-2 border-2 border-black rounded-xl shadow-black focus:outline-none"
                        />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <button 
                        @click="openAddModal"
                        class="px-4 py-2 bg-secondary text-black border-2 border-black rounded-xl shadow-black hover:bg-tertiary transition-colors"
                    >
                        Tambah User
                    </button>
                </div>

                <!-- Users Table -->
                <div class="bg-white border-2 border-black rounded-xl shadow-black overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="user in filteredUsers" :key="user.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center bg-gray-300 text-black font-bold overflow-hidden">
                                        <img
                                            v-if="user.foto_link"
                                            :src="`/storage/${user.foto_link}`"
                                            alt="Profile Photo"
                                            class="w-10 h-10 object-cover"
                                        />
                                        <span v-else>
                                            {{ user.name.charAt(0).toUpperCase() }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 truncate max-w-[150px]">{{ user.name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 truncate max-w-[150px]">{{ user.email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 truncate max-w-[150px]">{{ user.major || '-' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span 
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        :class="user.role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800'"
                                    >
                                        {{ user.role }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button 
                                        @click="openEditModal(user)"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3"
                                    >
                                        Edit
                                    </button>
                                    <button 
                                        @click="openDeleteModal(user)"
                                        class="text-red-600 hover:text-red-900"
                                    >
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="filteredUsers.length === 0">
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Tidak ada data pengguna yang ditemukan
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div v-if="showAddModal" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border-2 border-black">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah User Baru</h3>
                    <form @submit.prevent="submitForm">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input 
                                type="text" 
                                id="name" 
                                v-model="form.name" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required
                            />
                            <div v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                v-model="form.email" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required
                            />
                            <div v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input 
                                type="password" 
                                id="password" 
                                v-model="form.password" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required
                            />
                            <div v-if="form.errors.password" class="text-red-500 text-xs mt-1">{{ form.errors.password }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                v-model="form.password_confirmation" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <label for="major" class="block text-sm font-medium text-gray-700">Jurusan</label>
                            <select 
                                id="major" 
                                v-model="form.major" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                                <option value="">Pilih Jurusan</option>
                                <option v-for="major in majors" :key="major" :value="major">{{ major }}</option>
                            </select>
                            <div v-if="form.errors.major" class="text-red-500 text-xs mt-1">{{ form.errors.major }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select 
                                id="role" 
                                v-model="form.role" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required
                            >
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <div v-if="form.errors.role" class="text-red-500 text-xs mt-1">{{ form.errors.role }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                            <input 
                                type="file" 
                                id="foto" 
                                @change="handleFileUpload" 
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                accept="image/*"
                            />
                            <div v-if="form.errors.foto" class="text-red-500 text-xs mt-1">{{ form.errors.foto }}</div>
                        </div>
                    </form>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button 
                        type="button" 
                        @click="submitForm" 
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-secondary text-base font-medium text-black hover:bg-tertiary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? 'Menyimpan...' : 'Simpan' }}
                    </button>
                    <button 
                        type="button" 
                        @click="closeAddModal" 
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                    >
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div v-if="showEditModal" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border-2 border-black">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Edit User</h3>
                    <form @submit.prevent="submitEditForm">
                        <div class="mb-4">
                            <label for="edit_name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input 
                                type="text" 
                                id="edit_name" 
                                v-model="editForm.name" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required
                            />
                            <div v-if="editForm.errors.name" class="text-red-500 text-xs mt-1">{{ editForm.errors.name }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input 
                                type="email" 
                                id="edit_email" 
                                v-model="editForm.email" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required
                            />
                            <div v-if="editForm.errors.email" class="text-red-500 text-xs mt-1">{{ editForm.errors.email }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="edit_password" class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
                            <input 
                                type="password" 
                                id="edit_password" 
                                v-model="editForm.password" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                            <div v-if="editForm.errors.password" class="text-red-500 text-xs mt-1">{{ editForm.errors.password }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="edit_password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <input 
                                type="password" 
                                id="edit_password_confirmation" 
                                v-model="editForm.password_confirmation" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                        <div class="mb-4">
                            <label for="edit_major" class="block text-sm font-medium text-gray-700">Jurusan</label>
                            <select 
                                id="edit_major" 
                                v-model="editForm.major" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                                <option value="">Pilih Jurusan</option>
                                <option v-for="major in majors" :key="major" :value="major">{{ major }}</option>
                            </select>
                            <div v-if="editForm.errors.major" class="text-red-500 text-xs mt-1">{{ editForm.errors.major }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="edit_role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select 
                                id="edit_role" 
                                v-model="editForm.role" 
                                class="mt-1 block w-full border-2 border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required
                            >
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <div v-if="editForm.errors.role" class="text-red-500 text-xs mt-1">{{ editForm.errors.role }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="edit_foto" class="block text-sm font-medium text-gray-700">Foto Profil (Kosongkan jika tidak ingin mengubah)</label>
                            <input 
                                type="file" 
                                id="edit_foto" 
                                @change="handleEditFileUpload" 
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                accept="image/*"
                            />
                            <div v-if="editForm.errors.foto" class="text-red-500 text-xs mt-1">{{ editForm.errors.foto }}</div>
                        </div>
                    </form>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button 
                        type="button" 
                        @click="submitEditForm" 
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-secondary text-base font-medium text-black hover:bg-tertiary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                        :disabled="editForm.processing"
                    >
                        {{ editForm.processing ? 'Menyimpan...' : 'Simpan' }}
                    </button>
                    <button 
                        type="button" 
                        @click="closeEditModal" 
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                    >
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div v-if="showDeleteModal" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border-2 border-black">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Hapus User</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button 
                        type="button" 
                        @click="deleteUser" 
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                    >
                        Hapus
                    </button>
                    <button 
                        type="button" 
                        @click="closeDeleteModal" 
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                    >
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style>
.animate-slide-in {
    animation: slideIn 0.5s ease-out forwards;
}

@keyframes slideIn {
    0% {
        transform: translateX(100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>