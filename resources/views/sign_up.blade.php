<x-master title="Sign Up">

    <div class="container">
        <form action="{{ route('sign_up_store') }}" method="post">
            @csrf
            <h1>Sign Up</h1>
            <div class="name">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Full Name">
                @error('name')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Your Email">
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password">
                @error('password')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="confirmation_password">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirme Your Password">
            </div>
            <input type="submit" value="Sign Up">
        </form>
    </div>


</x-master>
