
<div class="lg:w-1/3">
    <div class="lg:w-96 scale-100 mb-6">
        <img src="{{ Storage::url($blog->image) }}" alt="" class="w-full h-64 rounded-sm">
        <div class="flex justify-center items-center mt-10">
            <p class="font-bold text-black text-3xl">{{ $blog->title }}</p>
        </div>
        <div class="flex justify-between mt-5">
            <p class="font-medium text-black text-sm text-justify">{{ $blog->description }}</p>
        </div>
        <div class="flex justify-between my-6 gap-8">
            <a href="{{ route('blog-detail', $blog->slug) }}" class="w-full h-14 shadow-lg rounded-md bg-primary hover:bg-primary flex items-center justify-center text-lg text-white font-bold">
                Voir plus
            </a>
        </div>
    </div>
</div>
