<x-website.layout.main>
    <x-slot:title>
        Homepage
    </x-slot:title>


    <x-website.header />
    <x-website.services />
    <x-website.contact-us />
    <x-website.products />
    <x-website.contact-us />
    <x-website.blog :articles="$articles" />


</x-website.layout.main>
