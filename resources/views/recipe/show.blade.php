<x-master :title="$recipe->title">
    <div class="show">
        <div class="container">
            <div class="image">
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="">

            </div>
            <div class="content">
                <h1>{{ $recipe->title }}
                    <div class="stars">
                        @for ($i = 0; $i < 4; $i++)
                            <span style="color: orange; font-size: 25px">★</span>
                        @endfor
                        <span style="font-size: 25px">☆</span>
                    </div>
                </h1>
                <div class="body">
                    <div class="text">
                        {{ $recipe->content }}
                    </div>
                    <div class="ingredient">
                        <h4>ingredients</h4>
                        <ul>
                            @foreach ($ingredients as $ingredient)
                                <li>{{ $ingredient->ingredient }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <hr>

            <div class="comments">
                <form action="{{ route('comments.store', $recipe) }}" method="post">
                    @csrf
                    <div>
                        <label for="comment">Leave a comment</label>
                        <textarea name="content" cols="30" rows="10" placeholder="Enter Your Comment"></textarea>
                    </div>
                    <input type="submit" value="Send">
                </form>

                <div class="comment-content">
                    @foreach ($comments as $comment)
                        <div class="card">
                            <div class="user-image">
                                <img src="{{ asset('storage/profile.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <h4>{{ $users[$comment->user_id]->name }}</h4>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>

</x-master>
