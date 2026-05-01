@extends('welcome')
@section('content')
<main class="bg-slate-50">
    <section class="bg-linear-to-r from-sky-900 via-blue-800 to-indigo-900 text-white">
        <div class="max-w-6xl mx-auto px-4 py-16 md:py-24">
            <p class="uppercase tracking-[0.2em] text-sky-200 text-xs font-semibold mb-4">Aircraft Booking Platform</p>
            <h1 class="text-4xl md:text-6xl font-bold leading-tight max-w-4xl">
                Book aircraft faster, dispatch smarter, and keep every flight on schedule.
            </h1>
            <p class="mt-6 text-blue-100 text-lg max-w-2xl">
                From availability checks to maintenance visibility, manage your whole flight operation in one system.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="/dashboard" class="inline-flex items-center justify-center bg-white text-blue-900 font-semibold px-6 py-3 rounded-lg shadow hover:bg-blue-100 transition">
                    Go to Dashboard
                </a>
                <a href="#features" class="inline-flex items-center justify-center border border-blue-200 text-white font-semibold px-6 py-3 rounded-lg hover:bg-white/10 transition">
                    Explore Features
                </a>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 py-12 -mt-10 relative z-10">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <article class="bg-white rounded-xl shadow p-5 border border-slate-100">
                <p class="text-sm text-slate-500">Active Aircraft</p>
                <p class="text-3xl font-bold text-slate-900 mt-2">18</p>
                <p class="text-xs text-emerald-600 mt-2">+2 from last month</p>
            </article>
            <article class="bg-white rounded-xl shadow p-5 border border-slate-100">
                <p class="text-sm text-slate-500">Bookings This Week</p>
                <p class="text-3xl font-bold text-slate-900 mt-2">46</p>
                <p class="text-xs text-emerald-600 mt-2">92% completion rate</p>
            </article>
            <article class="bg-white rounded-xl shadow p-5 border border-slate-100">
                <p class="text-sm text-slate-500">Open Tech Logs</p>
                <p class="text-3xl font-bold text-slate-900 mt-2">5</p>
                <p class="text-xs text-amber-600 mt-2">2 need immediate review</p>
            </article>
            <article class="bg-white rounded-xl shadow p-5 border border-slate-100">
                <p class="text-sm text-slate-500">Avg. Dispatch Time</p>
                <p class="text-3xl font-bold text-slate-900 mt-2">14m</p>
                <p class="text-xs text-emerald-600 mt-2">Down 3m this week</p>
            </article>
        </div>
    </section>

    <section id="features" class="max-w-6xl mx-auto px-4 py-10">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-slate-900">Everything you need to run flight operations</h2>
            <p class="text-slate-600 mt-3">
                Purpose-built workflows for booking teams, flight schools, and charter operators.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mt-10">
            <article class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-xl font-semibold text-slate-900">Live Availability</h3>
                <p class="mt-3 text-slate-600">
                    Instantly check aircraft availability across locations with conflict prevention and clear status indicators.
                </p>
            </article>
            <article class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-xl font-semibold text-slate-900">Booking Management</h3>
                <p class="mt-3 text-slate-600">
                    Create, edit, and track bookings with pilot details, flight windows, and quick approvals in one view.
                </p>
            </article>
            <article class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-xl font-semibold text-slate-900">Maintenance Awareness</h3>
                <p class="mt-3 text-slate-600">
                    Keep aircraft safe by surfacing open tech logs before dispatch and linking issues to each tail number.
                </p>
            </article>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 py-12">
        <div class="bg-white border border-slate-200 rounded-2xl p-8 md:p-10 shadow-sm">
            <div class="grid lg:grid-cols-2 gap-10 items-start">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900">Simple booking flow</h2>
                    <p class="text-slate-600 mt-3">
                        Get from request to confirmed flight in minutes with a clear step-by-step workflow.
                    </p>
                </div>
                <ol class="space-y-4">
                    <li class="flex gap-4">
                        <span class="h-8 w-8 rounded-full bg-blue-100 text-blue-700 font-semibold flex items-center justify-center">1</span>
                        <div>
                            <p class="font-semibold text-slate-900">Search aircraft and slot</p>
                            <p class="text-slate-600 text-sm">Filter by date, type, location, and maintenance status.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="h-8 w-8 rounded-full bg-blue-100 text-blue-700 font-semibold flex items-center justify-center">2</span>
                        <div>
                            <p class="font-semibold text-slate-900">Confirm pilot and mission details</p>
                            <p class="text-slate-600 text-sm">Attach pilot info, purpose of flight, and schedule notes.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="h-8 w-8 rounded-full bg-blue-100 text-blue-700 font-semibold flex items-center justify-center">3</span>
                        <div>
                            <p class="font-semibold text-slate-900">Dispatch with confidence</p>
                            <p class="text-slate-600 text-sm">Receive confirmation with visibility into conflicts and tech logs.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 pb-16">
        <div class="bg-blue-900 text-white rounded-2xl p-8 md:p-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold">Ready to launch your next booking?</h2>
                <p class="text-blue-200 mt-2">
                    Open the dashboard and start managing your aircraft schedule in real time.
                </p>
            </div>
            <a href="/dashboard" class="inline-flex items-center justify-center bg-white text-blue-900 font-semibold px-6 py-3 rounded-lg hover:bg-blue-100 transition">
                Open Dashboard
            </a>
        </div>
    </section>
</main>
@endsection
