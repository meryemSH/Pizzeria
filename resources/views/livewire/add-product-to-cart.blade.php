<div class="flex justify-between my-6 gap-8"
     x-data="{
        added: false,
        productAdded() {
            this.added = true
            setTimeout(() => {
                this.added = false
            }, 2000)
        }
    }" @product-added-{{ $product->id }}="productAdded" x-cloak wire:key="product-{{ $product->id }}">
    <button
        class="{{ \TailwindMerge\Laravel\Facades\TailwindMerge::merge('h-14 rounded-md flex items-center justify-center text-lg products__button border-2 border-white font-bold ' . ' ' . $class.'bg-red-600') }}"
        wire:click="add" :disabled="added" :class="{ 'wobble': added }">
        <svg x-show="!added" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="34" viewBox="0 0 34 34" fill="none">
            <rect width="34" height="34" fill="url(#pattern-{{ $product->id }})" />
            <defs>
                <pattern id="pattern-{{ $product->id }}" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_364_{{ $product->id }}" transform="scale(0.0111111)" />
                </pattern>
                <image id="image0_364_{{ $product->id }}" width="90" height="90"
                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAADZUlEQVR4nO2cPWsVQRSGBzUJCoqFhUl60T/gxR+gpZUBW0WwubGJ5mpp/oBfCFqZ2kJttNN0foByrdXSQgOJH1HhKvrIuBO5hMwm92Znzs7seeBCuvc9L7NnZ+ds1hhFURRFUZToALuAm8Bn/CwBj4GzwM74LjMAuMVgvAMOS/tOCmAb8IPB+Q4ckfbfhKAt74Hd0jXk3Dr6uSTtPxnszQ24AXwaIug30v6zAdgOnCwJ+5C0x6wAXnqCPi/tLSuAy56gF6S9ZYXdO3uC/gXslfaX21bwgyfsKWl/WQHc8QQ9L+0tK4ATnqAX7YqX9pcNwB6g5wm7Je0vK4AnnqDnpL1lBTDjCbppLANXgdFQQR+UrrBmXAkStAv7rXR1NWIpZND2klEKlkMGfcyJKPAoZNCjwFdN+R+dYEG7sO8hRw+4AIy732zJ/j40YZ8fgDPIMbuOn46AD3tV7wgdtF1Jf5BhfB0/+7Pqz2uKeyVQHCV+8urPfYXNNTzoVqygWw0OegUYqcMwIPeg4/TnvuLmGxp0J3bQUw0NulWnYUCuQcfrz5scBgShxEee/VlqGGD8PvLszxUOA3qrZxcRvFZxNiI3H3UvqFd2dhGaLZyNhD/f2MD4tS0EPS7gd9izkYexvVY5DJgQ8DuZytW31viY2/YkcXMBLg7pVf79FeD+kOZ7rmcGX9lWw2n1kuvPsYcBxq8fGtn+HHsYYPz6oZHtz7GHAcavHZr6/H9ljGGA8WuHpB79OeYwwPi18+/PMYcBxq/djP4caxhg/LrN6M+xhgHGr9uM/hxrGGD8us3ozxGHARMVnl2k2Z8jDQM6FZ5dpNmfVwEOBCz8/9nIFs8uNsNiLftzP8BT0ue6qTvAUdLGfmln0qQAcJt0OW1SARgB7pIe6X1dh+KxfMZdinXHfivquEkZYJ8b9ds99kfgt3SqwE8X7gPglB3JSeekKIqiKIqSGBRvNZ0DngPf3M/+PR1yeyWlKwLFufHrkn1tN8T5gpSuCBQrqqzY/qLHUtcVg+Ky3Szt1HXFAF4MUPCz1HXFYLDXeldS1xWDwQr+krquGGjriBb0tNDNUERXDIptlt1CbUS3yg/3SemKQvHg0BV6YImuKwrFV8badivlblQr7tWEdsgVJaWrKIqiKIqiKIpi6sZfceQbhWSdJHYAAAAASUVORK5CYII=" />
            </defs>
        </svg>

        <svg x-show="added" xmlns="http://www.w3.org/2000/svg"  width="34" height="34" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l5 5l10 -10"></path>
        </svg>
    </button>

    <!-- <a class="w-44 h-14 rounded-md bg-purple hover:bg-primary flex items-center justify-center text-lg text-white border-2 border-white font-bold"
        href="{{ route('workshop-detail-enligne', $product->slug) }}">
        Voir plus
    </a> -->
</div>
