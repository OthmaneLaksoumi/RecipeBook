<x-master title="Home">

    <section class="our-recipes">
        <div class="container">
            <h2>Our Recipes</h2>
            <div class="recipes">
                @foreach ($recipes as $recipe)
                    <div class="card">
                        <div class="image">
                            <img src="{{ asset('storage/' . $recipe->image) }}" alt="">
                        </div>
                        <div class="content">
                            <h3>{{ $recipe->title }}</h3>
                            @for ($i = 0; $i < 4; $i++)
                                <span style="color: orange; font-size: 25px">★</span>
                            @endfor
                            <span style="font-size: 25px">☆</span>
                        </div>
                        <div class="actions">
                            <form action="{{ route('recipes.destroy', $recipe) }}" method="post" class="delete-recipe">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this recipe?')">
                            </form>
                            <form action="{{ route('recipes.edit', $recipe) }}" class="delete-recipe">
                                <input type="submit" value="Edit">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    </body>

    </html>

</x-master>
