@extends('layouts.master-without-nav')
@section('title')
    {{ __('t-register') }}
@endsection
@section('content')

    <body
        class="flex items-center justify-center min-h-screen px-4 py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">
        <div class="mb-0 border-none shadow-none xl:w-2/3 card bg-white/70 dark:bg-zink-500/70">
            <div class="grid grid-cols-1 gap-0 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <div class="!px-10 !py-12 card-body">

                        <div class="text-center">
                            <h4 class="mb-2 text-purple-500 dark:text-purple-500">Bienvenue chez</h4>
                            <p class="text-slate-500 dark:text-zink-200">POWER HR</p>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('account.register') }}" class="mt-10">
                                @csrf
                                <div class="mb-3">
                                    <x-label for="name" value="{{ __('Nom') }}" />
                                    <x-input id="name" type="text" name="name" :value="old('name')" required
                                        autofocus autocomplete="name" placeholder="Entrez nom" />
                                    <x-input-error for="name" />
                                </div>
                                <div class="mb-3">
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <x-input id="email" type="email" name="email" :value="old('email')" required
                                        autocomplete="username" placeholder="Entrez email" />
                                    <x-input-error for="email" />
                                </div>
                                <div class="mb-3">
                                    <x-label for="password" value="{{ __('Mot de passe') }}" />
                                    <x-input id="password" type="password" name="password" required
                                        autocomplete="new-password" placeholder="Entrez mot de passe" />
                                    <x-input-error for="password" />
                                </div>
                                <div class="mb-3">
                                    <x-label for="password_confirmation" value="{{ __('Confirmez votre mot de passe') }}" />
                                    <x-input id="password_confirmation" type="password" name="password_confirmation"
                                        required autocomplete="new-password" placeholder="Confirmez votre mot de passe" />
                                </div>
                                {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <label for="terms">
                                            <div class="flex items-center">
                                                <x-checkbox name="terms" id="terms" required />

                                                <div class="ms-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' =>
                                                            '<a target="_blank" href="' .
                                                            route('terms.show') .
                                                            '" class="underline text-sm text-gray-600 dark:text-slate-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                            __('Terms of Service') .
                                                            '</a>',
                                                        'privacy_policy' =>
                                                            '<a target="_blank" href="' .
                                                            route('policy.show') .
                                                            '" class="underline text-sm text-gray-600 dark:text-slate-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                            __('Privacy Policy') .
                                                            '</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endif --}}
                                <div class="mt-5">
                                    <button type="submit"
                                        class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Créer
                                        un compte</button>
                                </div>
                            </form>

                            <div class="mt-10 text-center">
                                <p class="mb-0 text-slate-500 dark:text-zink-200">Vous avez déjà un compte ? <a
                                        href="{{ route('login') }}"
                                        class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">Se
                                        connecter</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-2 mt-2 mb-2 border-none shadow-none lg:col-span-7 card bg-white/60 dark:bg-zink-500/60">
                    <div class="!px-10 !pt-10 h-full !pb-0 card-body flex flex-col">
                        <div class="flex items-center justify-between gap-3">
                            <div class="grow">
                                <a href="{{ url('index') }}">
                                    <x-application-logo />
                                </a>
                            </div>
                        </div>
                        <div class="mt-auto">
                            <img src="{{ URL::asset('images/login-image-2.png') }}" alt="" class="md:max-w-[32rem]"
                                style="margin-left: 2rem;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
