<x-master title="Home">

    <section class="landig">

    </section>

    <section class="our-recipes">
        <div class="container">
            <h2>Our Recipes</h2>
            <form class="search" action="{{ route('search') }}" method="POST">
                @csrf
                <input type="search" name="search" placeholder="Search For Recipes">
                <input type="submit" value="Search">
            </form>
            <div class="recipes">
                @foreach ($recipes as $recipe)
                    <div class="card">
                        <div class="image">
                            <img src="{{ asset('storage/' . $recipe->image) }}" alt="">
                        </div>
                        <div class="content">
                            <h3><a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->title }}</a></h3>
                            @for ($i = 0; $i < 4; $i++)
                                <span style="color: orange; font-size: 25px">★</span>
                            @endfor
                            <span style="font-size: 25px">☆</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    </body>

    <script>
        // let search_form = document.querySelector('form');
        // search_form.
    </script>

    </html>

</x-master>
