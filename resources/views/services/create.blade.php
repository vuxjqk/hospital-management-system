<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2m-2-10v12m0-12H7a2 2 0 00-2 2v6a2 2 0 002 2h2" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Thêm mới dịch vụ
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">
                        Tạo và quản lý thông tin dịch vụ một cách chi tiết
                    </p>
                </div>
            </div>
            <nav class="text-sm text-gray-500">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
                <span class="mx-2">•</span>
                <a href="{{ route('services.index') }}" class="hover:text-blue-600 transition-colors">Dịch vụ</a>
                <span class="mx-2">•</span>
                <span class="text-gray-800">Thêm mới</span>
            </nav>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('services.store') }}" class="space-y-8">
                @csrf

                <!-- Specialty Information Card -->
                <div class="bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2m-2-10v12m0-12H7a2 2 0 00-2 2v6a2 2 0 002 2h2" />
                            </svg>
                            <h3 class="text-lg font-semibold text-white">Thông tin dịch vụ</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Specialty Name -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Tên dịch vụ <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('name') }}" placeholder="Nhập tên dịch vụ">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Examination Fee -->
                            <div class="space-y-2">
                                <label class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Phí dịch vụ (VNĐ) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="fee" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-gray-50 focus:bg-white"
                                    value="{{ old('fee') }}" placeholder="Nhập phí dịch vụ">
                                @error('fee')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h4 class="text-sm font-medium text-blue-800">Lưu ý</h4>
                            <p class="mt-1 text-sm text-blue-700">
                                Dịch vụ mới sẽ được kích hoạt tự động và có thể được sử dụng ngay sau
                                khi tạo.
                            </p>
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
                            <span>Các trường có dấu <span class="text-red-500 font-semibold">*</span> là bắt buộc</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <!-- Cancel Button -->
                            <a href="{{ route('services.index') }}"
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
                                Thêm dịch vụ
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Hidden field for tracking who updated -->
                <input type="hidden" name="updated_by" value="{{ auth()->id() }}">
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
                            <li>• Tên dịch vụ và phí dịch vụ là thông tin bắt buộc</li>
                            <li>• Tên dịch vụ phải là duy nhất trong hệ thống</li>
                            <li>• Trạng thái hoạt động quyết định dịch vụ có được sử dụng hay không</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Form Validation -->
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.querySelector('input[name="name"]').value;
            const fee = document.querySelector('input[name="fee"]').value;

            if (!name.trim()) {
                e.preventDefault();
                alert('Vui lòng điền tên dịch vụ');
                return false;
            }

            if (!fee.trim() || isNaN(fee) || fee < 0) {
                e.preventDefault();
                alert('Vui lòng nhập phí dịch vụ hợp lệ (số không âm)');
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
