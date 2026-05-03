@extends('welcome')
@section('content')
<div class="bg-gradient-to-br from-blue-100 via-blue-50 to-white min-h-screen pb-10">
    <div class="max-w-6xl mx-auto px-4">
        <div class="py-8 text-center">
            <h1 class="text-4xl font-extrabold text-blue-900 mb-2 flex items-center justify-center gap-2">
                ✈️ My Bookings
            </h1>
            <p class="text-lg text-blue-700 opacity-80 max-w-2xl mx-auto">
                Review your schedule, start a new booking, and stay on top of upcoming flights.
            </p>
            <div class="mt-6 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('dashboard.index') }}" class="text-blue-800 font-medium hover:text-blue-600 hover:underline">
                    ← Back to dashboard
                </a>
            </div>
        </div>

        <div class="my-10 grid grid-cols-1 items-start gap-8 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <x-quick-booking />
            </div>
            <div class="min-w-0 lg:col-span-8">
                <div class="rounded-lg border border-blue-100 bg-white p-6 shadow-md">
                    <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-xl font-bold text-blue-900">Your bookings</h2>
                        <span class="text-sm text-blue-700/80">{{ $bookings->total() }} total</span>
                    </div>
                    <div class="-mx-6 overflow-x-auto sm:mx-0">
                        <table class="min-w-full text-left">
                            <thead>
                                <tr class="border-b border-blue-100 bg-blue-50/90">
                                    <th class="px-3 py-2 text-left text-sm font-semibold text-blue-800">Type</th>
                                    <th class="px-3 py-2 text-left text-sm font-semibold text-blue-800">Resource</th>
                                    <th class="px-3 py-2 text-left text-sm font-semibold text-blue-800">Registration</th>
                                    <th class="px-3 py-2 text-left text-sm font-semibold text-blue-800">Start</th>
                                    <th class="px-3 py-2 text-left text-sm font-semibold text-blue-800">End</th>
                                    <th class="px-3 py-2 text-left text-sm font-semibold text-blue-800">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $booking)
                                    @php
                                        $bookable = $booking->bookable;
                                        $resourceLabel = '—';
                                        $registration = '—';
                                        if ($bookable instanceof \App\Models\Aircraft) {
                                            $resourceLabel = trim(implode(' ', array_filter([$bookable->make, $bookable->model])));
                                            $registration = $bookable->registration ?? '—';
                                        } elseif ($bookable) {
                                            $resourceLabel = class_basename($booking->bookable_type) . ' #' . $bookable->getKey();
                                        }
                                        $typeLabel = class_basename($booking->bookable_type);
                                        $start = \Illuminate\Support\Carbon::parse($booking->booking_date_time_start);
                                        $end = \Illuminate\Support\Carbon::parse($booking->booking_date_time_end);
                                        $status = \App\Enums\BookingStatuses::tryFrom($booking->booking_status);
                                    @endphp
                                    <tr class="border-b border-blue-100 last:border-0 odd:bg-white even:bg-blue-50/40">
                                        <td class="px-3 py-2 text-blue-900">{{ $typeLabel }}</td>
                                        <td class="px-3 py-2 text-blue-900">{{ $resourceLabel ?: '—' }}</td>
                                        <td class="px-3 py-2 text-blue-900">{{ $registration }}</td>
                                        <td class="whitespace-nowrap px-3 py-2 text-blue-900">{{ $start->format('M j, Y g:i A') }}</td>
                                        <td class="whitespace-nowrap px-3 py-2 text-blue-900">{{ $end->format('M j, Y g:i A') }}</td>
                                        <td class="px-3 py-2">
                                            @switch($booking->booking_status)
                                                @case(\App\Enums\BookingStatuses::CONFIRMED->value)
                                                    <span class="inline-flex items-center rounded-md bg-emerald-400/10 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-400/25">{{ $status?->label() ?? 'Confirmed' }}</span>
                                                    @break
                                                @case(\App\Enums\BookingStatuses::COMPLETED->value)
                                                    <span class="inline-flex items-center rounded-md bg-blue-400/10 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-400/25">{{ $status?->label() ?? 'Completed' }}</span>
                                                    @break
                                                @case(\App\Enums\BookingStatuses::CANCELLED->value)
                                                    <span class="inline-flex items-center rounded-md bg-slate-400/10 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-inset ring-slate-400/25">{{ $status?->label() ?? 'Cancelled' }}</span>
                                                    @break
                                                @default
                                                    <span class="inline-flex items-center rounded-md bg-yellow-400/10 px-2 py-1 text-xs font-medium text-yellow-600 ring-1 ring-inset ring-yellow-400/25">{{ $status?->label() ?? ucfirst($booking->booking_status) }}</span>
                                            @endswitch
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-3 py-10 text-center text-blue-700">
                                            You do not have any bookings yet. Use <span class="font-semibold">Quick Booking</span> to create one.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($bookings->hasPages())
                        <div class="mt-6 flex justify-center border-t border-blue-100 pt-4 sm:justify-end">
                            <div class="text-blue-900 [&_a]:text-blue-800 [&_a:hover]:text-blue-600 [&_span]:text-blue-600">
                                {{ $bookings->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
