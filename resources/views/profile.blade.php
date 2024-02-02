<x-master title="My Profile">

    <div class="profile">
        <div class="container">
            <h1>My Profile</h1>
                @if (session()->has('modified'))
                    <div>
                        {{ session('modified') }}
                    </div>
                @endif
            <form action="{{ route('update_profile', $profile) }}" method="post">
                @csrf
                @method('put')
                <div class="image">
                    <div class="camera">
                        <i class="fa-solid fa-camera"></i>
                    </div>
                    <img src="{{ asset($profile->image) }}" alt="">
                </div>

                <div class="name">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $profile->name) }}">
                    @error('name')
                        <div style="margin: 5px; color: red;"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="email">
                    <label for="email">Your Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email', $profile->email) }}">
                    @error('email')
                        <div style="margin: 5px; color: red;"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="created-at">
                    <label for="created-at">Your Account Created At</label>
                    <input type="text" name="created-at" id="created-at" readonly value="{{ $profile->created_at }}">
                </div>

                <input type="submit" value="Update">

            </form>
        </div>
    </div>

</x-master>
