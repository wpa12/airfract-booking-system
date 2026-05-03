@extends('welcome')
@section('content')
<div class="bg-gradient-to-br from-blue-100 via-blue-50 to-white min-h-screen pb-10">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Page Title -->
        <div class="py-8 text-center">
            <h1 class="text-4xl font-extrabold text-blue-900 mb-2 flex items-center justify-center gap-2">
                ✈️ Welcome to Your Aircraft Booking Dashboard!
            </h1>
            <p class="text-lg text-blue-700 opacity-80 max-w-2xl mx-auto">
                Manage your flights, view availability, and keep your schedule flying smoothly.
            </p>
        </div>
        <!-- Tech Log Shortcut -->
        <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-lg p-4 flex items-center gap-3 shadow-sm">
            <span class="text-2xl text-yellow-500">🧾</span>
            <div>
                <div class="font-bold text-yellow-900">Have a maintenance issue?</div>
                <a href="#" class="text-yellow-700 hover:underline text-sm">Create a new Tech Log</a>
            </div>
        </div>
        
        <x-bookings />
        <x-log-book-component />
        <!-- Announcements / News -->
        <div class="mt-12">
            <div class="bg-blue-50 rounded-lg shadow-md p-6 border-l-4 border-blue-300 max-w-3xl mx-auto">
                <h2 class="text-lg font-bold text-blue-800 mb-2 flex items-center gap-2">
                    <span>📢</span> Latest Announcement
                </h2>
                <div class="text-blue-900">
                    "Diamond DA40 is now available for advanced training! <a href='#' class='text-blue-700 underline'>Learn More.</a>"
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
