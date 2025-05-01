@props(['faq'])

<div class="bg-[#ffffff7a] bg-opacity-48 border border-white shadow-md rounded-lg p-4 transform transition-transform scale-100"
     x-data="{ isOpen: false }">

    <h2 @click="isOpen = !isOpen" class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
        <span class="text-white font-bold text-xl">
            {{ $faq->question }}
        </span>

        <svg x-bind:class="{ 'transform rotate-90': isOpen, 'transform rotate-0': !isOpen }"  class="shrink-0 fill-current text-purple-700 h-4 w-4 transform transition-transform duration-500"  xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"><rect y="8.29297" width="21.5" height="4.91429" rx="1" fill="white" /><rect x="13.2071" width="21.5" height="4.91429" rx="1" transform="rotate(90 13.2071 0)" fill="white" /></svg>
    </h2>

    <div class="overflow-hidden max-h-0 duration-500 transition-all"
         x-ref="tab" :style="isOpen ? `max-height: ${$refs.tab.scrollHeight}px`:''">
        <p class="p-3 text-white text-xl text-justify">
            {!! $faq->response !!}
        </p>
    </div>
</div>
