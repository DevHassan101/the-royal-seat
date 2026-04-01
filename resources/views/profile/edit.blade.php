@role('admin')
    <x-app-layout>
        <x-slot name="header">
            {{ __('Profile') }}
        </x-slot>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                    <h3 class="text-xl font-semibold text-white">Profile Information</h3>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                    <h3 class="text-xl font-semibold text-white">Update Password</h3>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    @extends('driver.layouts.app')
    @section('content')
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                    <h3 class="text-xl font-semibold text-white">Profile Information</h3>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-[#c9982b] to-[#a67d23] px-6 py-4">
                    <h3 class="text-xl font-semibold text-white">Update Password</h3>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endrole
