<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-5">
                    <x-input-label for="card-holder-name" value="Détenteur de la carte"/>
                    <x-text-input id="card-holder-name" type="text"/>

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element" class="p-5 shadow rounded"></div>

                    <x-primary-button id="card-button" data-secret="{{ $intent->client_secret }}">
                        S'Abonner
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
 
    <script>
        const stripe = Stripe('{{ config('stripe.stripe_key') }}');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );
        
            if (error) {
                // Display "error.message" to the user...
            } else {
                // The card has been verified successfully...
            }
        });
    </script>

    @endpush
</x-app-layout>