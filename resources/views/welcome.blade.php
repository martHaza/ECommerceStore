<x-guest-modal-layout>
    <!-- Hero Section -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4 text-gray-900">Art Store</h1>
            <p class="text-xl mb-8 text-gray-700">Unique handmade items - paintings, baskets, plates and bottles</p>
            <a href="/products" class="bg-emerald-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-emerald-600 transition inline-block">
                View Products
            </a>
        </div>
    </div>

    <!-- Features -->
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center p-6 bg-white rounded-lg shadow">
                <h3 class="text-xl font-bold mb-2 text-gray-900">Paintings</h3>
                <p class="text-gray-600">Original paintings in various styles and moods that will give your home a special character</p>
            </div>
            <div class="text-center p-6 bg-white rounded-lg shadow">
                <h3 class="text-xl font-bold mb-2 text-gray-900">Trinkets</h3>
                <p class="text-gray-600">Handmade little gifts from natural materials - practical and aesthetic for everyday use</p>
            </div>
            <div class="text-center p-6 bg-white rounded-lg shadow">
                <h3 class="text-xl font-bold mb-2 text-gray-900">Plates</h3>
                <p class="text-gray-600">Unique plates with carefully crafted design - perfect for complementing your interior</p>
            </div>
            <div class="text-center p-6 bg-white rounded-lg shadow">
                <h3 class="text-xl font-bold mb-2 text-gray-900">Glass Bottles</h3>
                <p class="text-gray-600">Elegant glass bottles with artistic design - ideal for gifts or interior accents</p>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4 text-gray-900">Ready to shop?</h2>
            <p class="text-xl mb-8 text-gray-700">Register or continue as a guest!</p>
            <button 
                @click="showLoginModal = true; activeTab = 'register'"
                class="bg-emerald-700 hover:bg-emerald-600 text-white px-8 py-3 rounded-lg font-semibold transition">
                Start Shopping
            </button>
        </div>
    </div>
</x-guest-modal-layout>