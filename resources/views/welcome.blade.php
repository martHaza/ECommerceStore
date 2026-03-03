<x-guest-modal-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Mākslas veikals</h1>
            <p class="text-xl mb-8">Unikāli roku darbi - gleznas, kurbāžņi, šķīvji un pudeles</p>
            <a href="/products" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">
                Skatīt produktus
            </a>
        </div>
    </div>

    <!-- Features -->
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-white rounded-lg shadow">
                <h3 class="text-xl font-bold mb-2">Gleznas</h3>
                <p class="text-gray-600">Oriģinālas gleznas dažādos stilos un noskaņās, kas piešķirs mājām īpašu raksturu</p>
            </div>
            <div class="text-center p-6 bg-white rounded-lg shadow">
                <h3 class="text-xl font-bold mb-2">Kurbāžņi</h3>
                <p class="text-gray-600">Roku darba pīti groziņi no dabīgiem materiāliem - praktiski un estētiski ikdienas lietošanai</p>
            </div>
            <div class="text-center p-6 bg-white rounded-lg shadow">
                <h3 class="text-xl font-bold mb-2">Šķīvji</h3>
                <p class="text-gray-600">Unikāli šķīvji ar rūpīgi veidotu dizainu - lieliski piemēroti interjera papildināšanai</p>
            </div>
            <div class="text-center p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-bold mb-2">Stikla pudeles</h3>
            <p class="text-gray-600">
                Elegantas stikla pudeles ar māksliniecisku noformējumu - ideāli piemērotas dāvanām vai interjera akcentam</p>
        </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Gatavs iegādāties?</h2>
            <p class="text-xl text-gray-600 mb-8">Reģistrējies vai turpini kā viesis!</p>
            <button 
                @click="showLoginModal = true; activeTab = 'register'"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition"
            >
                Sākt iepirkties
            </button>
        </div>
    </div>
</x-guest-modal-layout>