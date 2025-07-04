<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Thêm mới bệnh nhân
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">
                        Tạo và quản lý hồ sơ bệnh nhân một cách chi tiết
                    </p>
                </div>
            </div>
            <nav class="text-sm text-gray-500">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
                <span class="mx-2">•</span>
                <a href="{{ route('patients.index') }}" class="hover:text-blue-600 transition-colors">Bệnh nhân</a>
                <span class="mx-2">•</span>
                <span class="text-gray-800">Thêm mới</span>
            </nav>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Progress Indicator -->
            <div class="mb-8">
                <div class="flex items-center justify-center">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm font-medium text-blue-600">Thông tin cá nhân</span>
                        </div>
                        <div class="w-16 h-1 bg-blue-600 rounded"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-medium">2</span>
                            </div>
                            <span class="ml-2 text-sm font-medium text-blue-600">Bảo hiểm y tế</span>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Personal Information Card -->
                <div class="bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <h3 class="text-lg font-semibold text-white">Thông tin cá nhân</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <!-- Profile Picture Section -->
                        <div class="mb-8 text-center">
                            <div class="relative inline-block">
                                <div
                                    class="w-24 h-24 rounded-full bg-gray-200 border-4 border-white shadow-lg overflow-hidden mx-auto">
                                    <div
                                        class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-600">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <label for="profile_picture"
                                    class="absolute bottom-0 right-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center cursor-pointer hover:bg-blue-700 transition shadow-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </label>
                                <input type="file" name="profile_picture" id="profile_picture" class="hidden"
                                    accept="image/*">
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Nhấn vào biểu tượng máy ảnh để thêm ảnh đại diện
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- National ID -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                        </path>
                                    </svg>
                                    Số CCCD <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="national_id" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('national_id') }}" placeholder="Nhập số căn cước công dân">
                                @error('national_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Full Name -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    Họ và tên <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="full_name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('full_name') }}" placeholder="Nhập họ và tên đầy đủ">
                                @error('full_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    Số điện thoại
                                </label>
                                <input type="tel" name="phone_number"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('phone_number') }}" placeholder="Nhập số điện thoại">
                                @error('phone_number')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Email
                                </label>
                                <input type="email" name="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('email') }}" placeholder="Nhập địa chỉ email">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date of Birth -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Ngày sinh
                                </label>
                                <input type="date" name="date_of_birth"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Gender -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                        </path>
                                    </svg>
                                    Giới tính
                                </label>
                                <select name="gender"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white">
                                    <option value="">Chọn giới tính</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam
                                    </option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ
                                    </option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Khác
                                    </option>
                                </select>
                                @error('gender')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="md:col-span-2 space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Địa chỉ
                                </label>
                                <textarea name="address" rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white resize-none"
                                    placeholder="Nhập địa chỉ đầy đủ">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Insurance Information Card -->
                <div class="bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                            <h3 class="text-lg font-semibold text-white">Thông tin bảo hiểm y tế</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Insurance Number -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                        </path>
                                    </svg>
                                    Số thẻ BHYT
                                </label>
                                <input type="text" name="insurance_number"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('insurance_number') }}" placeholder="Nhập số thẻ bảo hiểm y tế">
                                @error('insurance_number')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Insurance Expiry Date -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Ngày hết hạn BHYT
                                </label>
                                <input type="date" name="insurance_expiry_date"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('insurance_expiry_date') }}">
                                @error('insurance_expiry_date')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Password Creation Section -->
                <div class="bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-600 to-orange-700 px-6 py-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <h3 class="text-lg font-semibold text-white">Thiết lập mật khẩu</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                            <div class="flex">
                                <svg class="w-5 h-5 text-yellow-500 mr-2 mt-0.5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-yellow-800 font-medium">Lưu ý về mật khẩu</p>
                                    <p class="text-xs text-yellow-700 mt-1">Mật khẩu cần tối thiểu 8 ký tự, bao gồm chữ
                                        hoa, chữ thường, số và ký tự đặc biệt.</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-semibold text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                                Mật khẩu <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="password" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200 bg-gray-50 focus:bg-white"
                                placeholder="Nhập mật khẩu (tối thiểu 8 ký tự)">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2 mt-4">
                            <label class="flex items-center text-sm font-semibold text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                                Xác nhận mật khẩu <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="password_confirmation" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200 bg-gray-50 focus:bg-white"
                                placeholder="Nhập lại mật khẩu để xác nhận">
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="bg-white shadow-lg rounded-xl border border-gray-100 p-6">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Các trường có dấu <span class="text-red-500 font-semibold">*</span> là bắt
                                buộc</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <!-- Cancel Button -->
                            <a href="{{ route('patients.index') }}"
                                class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-200 font-medium">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Hủy bỏ
                            </a>

                            <!-- Save Button -->
                            <button type="submit"
                                class="inline-flex items-center px-8 py-3 border border-transparent rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Thêm bệnh nhân
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Hidden field for tracking who created -->
                <input type="hidden" name="created_by" value="{{ auth()->id() }}">
            </form>

            <!-- Additional Information Panel -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h4 class="text-lg font-semibold text-blue-900 mb-2">Lưu ý quan trọng</h4>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li>• Vui lòng kiểm tra kỹ thông tin trước khi thêm mới</li>
                            <li>• Số CCCD, họ tên và mật khẩu là thông tin bắt buộc</li>
                            <li>• Thông tin bảo hiểm y tế giúp thuận tiện trong việc thanh toán viện phí</li>
                            <li>• Ảnh đại diện nên có kích thước nhỏ hơn 2MB</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Profile Picture Preview -->
    <script>
        document.getElementById('profile_picture').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.querySelector('.w-24.h-24 img, .w-24.h-24 div');
                    if (preview.tagName === 'IMG') {
                        preview.src = e.target.result;
                    } else {
                        // Replace the placeholder div with an img
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-full object-cover';
                        img.alt = 'Profile Preview';
                        preview.parentNode.replaceChild(img, preview);
                    }
                };
                reader.readAsDataURL(file);
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const nationalId = document.querySelector('input[name="national_id"]').value;
            const fullName = document.querySelector('input[name="full_name"]').value;
            const password = document.querySelector('input[name="password"]').value;
            const passwordConfirmation = document.querySelector('input[name="password_confirmation"]').value;

            if (!nationalId.trim() || !fullName.trim()) {
                e.preventDefault();
                alert('Vui lòng điền đầy đủ thông tin bắt buộc (Số CCCD và Họ tên)');
                return false;
            }

            if (!password.trim() || !passwordConfirmation.trim()) {
                e.preventDefault();
                alert('Vui lòng điền đầy đủ mật khẩu và xác nhận mật khẩu');
                return false;
            }

            if (password !== passwordConfirmation) {
                e.preventDefault();
                alert('Mật khẩu và xác nhận mật khẩu không khớp');
                return false;
            }

            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Đang thêm...
            `;
        });
    </script>
</x-app-layout>
