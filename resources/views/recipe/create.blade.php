<x-master title="Create recipe">


    <div class="container">
        <form class="recipe" action="{{ route('recipes.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <h1>Create Recipe</h1>
            <div class="title">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div style="margin: 5px; color: red;"> {{ $message }}</div>
                @enderror
            </div>

            <div class="ingredient">
                <label for="ingredient">Ingredients</label>
                <input class="ingredient-input" type="text" id="ingredient"
                    placeholder="You can Add many ingredient">
                <input type="submit" value="Add" class="ingredient-button"
                    onclick="add_ingredient(); return false;">
                @if (session()->has('error'))
                    <div style="margin: 5px; color: red;"> {{ session('error') }}</div>
                @endif
                <ul class="ingredients-list"></ul>

            </div>

            <div class="content">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <div style="margin: 5px; color: red;"> {{ $message }}</div>
                @enderror
            </div>

            <div class="image">
                <label for="image">Image</label>
                <label for="image" class="custom-button">Choisir un fichier</label>
                <input type="file" id="image" name="image" class="hidden-input">
                @error('image')
                    <div style="margin: 5px; color: red;"> {{ $message }}</div>
                @enderror
            </div>
            <div class="category">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" value={{ old('category_id') }}>
                    <option selected disabled>Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div style="margin: 5px; color: red;"> {{ $message }}</div>
                @enderror
            </div>
            <input type="submit" value="Create">

        </form>

    </div>

    <script>
        function add_ingredient() {
            var ingredient = document.querySelector('.ingredient-input');
            let ingredients_list = document.querySelector('.ingredients-list');
            console.log(ingredients_list)
            if (ingredient.value.trim() != "") {
                var ingredient_li = document.createElement('li');
                var ingredient_input = document.createElement('input');
                ingredient_input.setAttribute('hidden', '');
                ingredient_input.setAttribute('name', 'ingredient[]');
                ingredient_input.setAttribute('value', ingredient.value);
                ingredient_li.innerText = ingredient.value;
                ingredient_li.appendChild(ingredient_input);
                ingredients_list.appendChild(ingredient_li);
                ingredient.value = "";
            }
        }
    </script>

</x-master>
