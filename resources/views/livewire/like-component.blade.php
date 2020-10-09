<div>
   
   <div class="flex">
    <form method="POST"
          action="/properties/{property}/like"
    >
        @csrf

        <div class="flex items-center mr-4 
        {{-- {{ $property->isLikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500' }} --}}
        
        ">

            <span><i class="fas fa-heart"></i></span>

            <button type="submit"
                    class="text-xs"
            >
                {{-- {{ $property->likes ?: 0 }} --}}
            </button>
        </div>
    </form>

    <form method="POST"
          action="/properties/{property}/like"
    >
        @csrf
        @method('DELETE')

        <div class="flex items-center 
        
        {{-- {{ $property->isDislikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500' }} --}}
        
        ">

        <span><i class="fas fa-heart"></i></span>
            

            <button type="submit"
                    class="text-xs"
            >
                {{-- {{ $property->dislikes ?: 0 }} --}}
            </button>
        </div>
    </form>
</div>

</div>
