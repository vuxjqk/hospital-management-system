<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-user-injured mr-2"></i>
                {{ __('Quản lý bệnh nhân') }}
            </h2>
            <a href="{{ route('patients.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i>
                Thêm bệnh nhân
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card chứa toàn bộ nội dung -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Header với thống kê -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold">Danh sách bệnh nhân</h3>
                            <p class="text-blue-100 text-sm">Tổng số: {{ $patients->total() }} bệnh nhân</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-400 bg-opacity-50 rounded-lg p-3">
                                <i class="fas fa-users text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Error Message --}}
                @if (session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10A8 8 0 11.001 9.999 8 8 0 0118 10zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 001.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif


                <!-- Thanh tìm kiếm -->
                <div class="bg-gray-50 border-b border-gray-200 p-6">
                    <form method="GET" action="{{ route('patients.index') }}" class="flex items-center space-x-4">
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Tìm kiếm theo tên, CCCD hoặc số thẻ BHYT..." />
                        </div>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200 ease-in-out">
                            <i class="fas fa-search mr-2"></i>
                            Tìm kiếm
                        </button>
                        @if (request('search'))
                            <a href="{{ route('patients.index') }}"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-200 ease-in-out">
                                <i class="fas fa-times mr-2"></i>
                                Xóa bộ lọc
                            </a>
                        @endif
                    </form>
                </div>

                <!-- Bảng danh sách bệnh nhân -->
                <div class="overflow-x-auto">
                    @if ($patients->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-id-card mr-2"></i>
                                        Số CCCD
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-user mr-2"></i>
                                        Họ và tên
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-kit-medical mr-2"></i>
                                        Số thẻ BHYT
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-cogs mr-2"></i>
                                        Hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($patients as $patient)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                        <i class="fas fa-id-card text-blue-600"></i>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $patient->national_id }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $patient->full_name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @if ($patient->insurance_number)
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        <i class="fas fa-shield-alt mr-1"></i>
                                                        {{ $patient->insurance_number }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        <i class="fas fa-exclamation-triangle mr-1"></i>
                                                        Chưa có BHYT
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('patients.edit', $patient->id) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-3 rounded-lg transition duration-200 ease-in-out transform hover:scale-105"
                                                    title="Chỉnh sửa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('patients.destroy', $patient->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa bệnh nhân này không?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-3 rounded-lg transition duration-200 ease-in-out transform hover:scale-105"
                                                        title="Xóa">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <!-- Trạng thái không có dữ liệu -->
                        <div class="text-center py-12">
                            <div class="max-w-md mx-auto">
                                <div class="mx-auto h-24 w-24 text-gray-400">
                                    <i class="fas fa-user-injured text-6xl"></i>
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900">
                                    @if (request('search'))
                                        Không tìm thấy bệnh nhân
                                    @else
                                        Chưa có bệnh nhân nào
                                    @endif
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    @if (request('search'))
                                        Không có bệnh nhân nào phù hợp với từ khóa "{{ request('search') }}"
                                    @else
                                        Hãy thêm bệnh nhân đầu tiên vào hệ thống
                                    @endif
                                </p>
                                <div class="mt-6">
                                    @if (request('search'))
                                        <a href="{{ route('patients.index') }}"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-600 bg-blue-100 hover:bg-blue-200">
                                            <i class="fas fa-arrow-left mr-2"></i>
                                            Quay lại danh sách
                                        </a>
                                    @else
                                        <a href="{{ route('patients.create') }}"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                            <i class="fas fa-plus mr-2"></i>
                                            Thêm bệnh nhân
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Phân trang -->
                @if ($patients->hasPages())
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between sm:hidden">
                                @if ($patients->onFirstPage())
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-white">
                                        Trước
                                    </span>
                                @else
                                    <a href="{{ $patients->previousPageUrl() }}"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Trước
                                    </a>
                                @endif

                                @if ($patients->hasMorePages())
                                    <a href="{{ $patients->nextPageUrl() }}"
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Tiếp
                                    </a>
                                @else
                                    <span
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-white">
                                        Tiếp
                                    </span>
                                @endif
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Hiển thị
                                        <span class="font-medium">{{ $patients->firstItem() }}</span>
                                        đến
                                        <span class="font-medium">{{ $patients->lastItem() }}</span>
                                        trong
                                        <span class="font-medium">{{ $patients->total() }}</span>
                                        kết quả
                                    </p>
                                </div>
                                <div>
                                    {{ $patients->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
