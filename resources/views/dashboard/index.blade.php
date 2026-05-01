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

        <!-- Stats & Quick Actions -->
        <div class="grid gap-6 md:grid-cols-3 sm:grid-cols-2 mb-10">
            <!-- My Upcoming Flights -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center border-t-4 border-blue-600">
                <div class="text-5xl mb-2 text-blue-700">
                    🛫
                </div>
                <div class="text-2xl font-bold">3</div>
                <div class="text-sm text-blue-800 opacity-70 mb-2">Upcoming Booked Flights</div>
                <a href="#" class="mt-3 text-blue-700 hover:underline font-medium text-sm transition">View All</a>
            </div>

            <!-- Available Aircraft -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center border-t-4 border-green-500">
                <div class="text-5xl mb-2 text-green-600">
                    🛩️
                </div>
                <div class="text-2xl font-bold">5</div>
                <div class="text-sm text-blue-800 opacity-70 mb-2">Aircraft Available Today</div>
                <a href="#" class="mt-3 text-green-700 hover:underline font-medium text-sm transition">See Aircraft</a>
            </div>

            <!-- Pending Tech Logs -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center border-t-4 border-yellow-400">
                <div class="text-5xl mb-2 text-yellow-600">
                    🧰
                </div>
                <div class="text-2xl font-bold">2</div>
                <div class="text-sm text-blue-800 opacity-70 mb-2">Open Maintenance Logs</div>
                <a href="#" class="mt-3 text-yellow-700 hover:underline font-medium text-sm transition">View Logs</a>
            </div>
        </div>

        <!-- Main Actions / Calendar / Bookings Table -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
            <!-- Booking Form / Quick Actions -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6 border">
                    <h2 class="text-xl font-bold text-blue-900 mb-4">Quick Booking</h2>
                    <form>
                        <div class="mb-3">
                            <label class="block text-blue-800 font-medium mb-1">Select Aircraft</label>
                            <select class="w-full border rounded px-3 py-2">
                                <option>Piper PA-28</option>
                                <option>Cessna 172</option>
                                <option>Diamond DA40</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="block text-blue-800 font-medium mb-1">Date</label>
                            <input type="date" class="w-full border rounded px-3 py-2" />
                        </div>
                        <div class="mb-3">
                            <label class="block text-blue-800 font-medium mb-1">Time</label>
                            <input type="time" class="w-full border rounded px-3 py-2" />
                        </div>
                        <button type="submit" class="mt-2 w-full bg-blue-700 text-white font-semibold rounded px-4 py-2 shadow hover:bg-blue-800 transition">
                            Book Now
                        </button>
                    </form>
                </div>
                
                <!-- Tech Log Shortcut -->
                <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-lg p-4 flex items-center gap-3 shadow-sm">
                    <span class="text-2xl text-yellow-500">🧾</span>
                    <div>
                        <div class="font-bold text-yellow-900">Have a maintenance issue?</div>
                        <a href="#" class="text-yellow-700 hover:underline text-sm">Create a new Tech Log</a>
                    </div>
                </div>
            </div>

            <!-- Calendar / Bookings Table -->
            <div class="md:col-span-3">
                <div class="bg-white rounded-lg shadow-md p-6 border">
                    <h2 class="text-xl font-bold text-blue-900 mb-4">Your Schedule</h2>
                    <table class="min-w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-3 py-2 text-blue-800 font-semibold">Aircraft</th>
                                <th class="px-3 py-2 text-blue-800 font-semibold">Date</th>
                                <th class="px-3 py-2 text-blue-800 font-semibold">Time</th>
                                <th class="px-3 py-2 text-blue-800 font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="px-3 py-2">Cessna 172</td>
                                <td class="px-3 py-2">2024-07-14</td>
                                <td class="px-3 py-2">09:00 - 12:00</td>
                                <td class="px-3 py-2"><span class="bg-green-100 text-green-800 px-3 py-1 rounded text-xs">Confirmed</span></td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-3 py-2">Piper PA-28</td>
                                <td class="px-3 py-2">2024-07-17</td>
                                <td class="px-3 py-2">14:00 - 16:00</td>
                                <td class="px-3 py-2"><span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded text-xs">Pending</span></td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2">Diamond DA40</td>
                                <td class="px-3 py-2">2024-07-20</td>
                                <td class="px-3 py-2">10:00 - 13:00</td>
                                <td class="px-3 py-2"><span class="bg-red-100 text-red-800 px-3 py-1 rounded text-xs">Cancelled</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right mt-4">
                        <a href="#" class="text-blue-700 hover:underline font-medium text-sm">See all your bookings</a>
                    </div>
                </div>
            </div>
        </div>
        
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
