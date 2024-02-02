<x-master title="Login">

    <div class="container">

        <form action="{{ route('login') }}" method="post">
            @csrf
            @if (session()->has('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif



            <h1>Login</h1>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password">
            </div>
            <input type="submit" value="Sign Up">
            @error('not_match')
                <div style="text-align: center; color: red;">{{ $message }}</div>
            @enderror
        </form>
    </div>


</x-master>
