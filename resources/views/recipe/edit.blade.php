<x-master title="Edit my recipe">


    <div class="container">
        <form class="recipe" action="{{ route('recipes.update', $recipe) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <h1>Edit My Recipe</h1>
            <div class="title">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $recipe->title }}">
            </div>
            <div class="content">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10">{{ $recipe->content }}</textarea>
            </div>
            <div class="image">
                <label for="image">Image</label>
                <div>
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="">
                </div>
                <label for="image" class="custom-button">Choisir un fichier</label>
                <input type="file" id="image" name="image" class="hidden-input">
            </div>
            <div class="category">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    <option selected disabled>Choose a category</option>
                    @foreach ($categories as $category)
                        @if ($category->id === $recipe->category_id)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Edit">

        </form>
    </div>

</x-master>
