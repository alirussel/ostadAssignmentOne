@extends('layouts.master')

@section('title', 'Shop Details')

@section('contents')
    <section class="bg-gray-100">
        <div class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
                <div class="gap-12 flex justify-between">
                    <div class="max-w-lg space-y-3">
                        <h3 class="text-indigo-600 font-semibold">Shop Id: {{ $shopId }}</h3>
                        <p class="text-gray-600 text-3xl font-semibold sm:text-2xl">
                        Shop Name: {{ $shopName }}
                        </p>
                        <p>
                            
                        </p>
                    </div>
                </div>

                
            </div>
        </div>
        </div>
    </section>

   



@endsection

@push('scripts')
    
@endpush
