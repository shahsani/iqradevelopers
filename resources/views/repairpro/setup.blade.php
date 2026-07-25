<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Download RepairPro - {{ config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-100 text-slate-900">
        <main class="flex min-h-screen items-center justify-center px-4 py-10">
            <section class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl shadow-slate-950/10 sm:p-10">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-semibold tracking-wide text-blue-700">REPAIRPRO</p>
                    <h1 class="text-3xl font-bold tracking-tight">Download RepairPro</h1>
                    <p class="text-sm leading-6 text-slate-600">Tell us a little about your business to download the setup file.</p>
                </div>

                <form method="POST" action="{{ route('repairpro.setup.store') }}" class="mt-8 flex flex-col gap-5">
                    @csrf

                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-sm font-medium">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" required class="rounded-lg border border-slate-300 px-3 py-2.5 outline-none transition focus:border-blue-600 focus:ring-3 focus:ring-blue-600/20" @error('name') aria-describedby="name-error" @enderror>
                        @error('name')
                            <p id="name-error" class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="email_phone" class="text-sm font-medium">Email or phone</label>
                        <input id="email_phone" name="email_phone" type="text" value="{{ old('email_phone') }}" autocomplete="email" required class="rounded-lg border border-slate-300 px-3 py-2.5 outline-none transition focus:border-blue-600 focus:ring-3 focus:ring-blue-600/20" @error('email_phone') aria-describedby="email-phone-error" @enderror>
                        @error('email_phone')
                            <p id="email-phone-error" class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="business_name" class="text-sm font-medium">Business name</label>
                        <input id="business_name" name="business_name" type="text" value="{{ old('business_name') }}" autocomplete="organization" required class="rounded-lg border border-slate-300 px-3 py-2.5 outline-none transition focus:border-blue-600 focus:ring-3 focus:ring-blue-600/20" @error('business_name') aria-describedby="business-name-error" @enderror>
                        @error('business_name')
                            <p id="business-name-error" class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="mt-1 rounded-lg bg-blue-700 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-800 focus:outline-none focus:ring-3 focus:ring-blue-600/40">Download setup</button>
                </form>
            </section>
        </main>
    </body>
</html>
