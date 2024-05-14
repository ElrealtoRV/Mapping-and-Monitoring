
    <style>


        h2 {
            margin-top: 0;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
        }

        .error {
            color: #ff6666;
            margin-top: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .success {
            color: #4caf50;
            margin-top: 5px;
        }
    </style>

<body>
    <div class="container">
        <section>
            <header>
                <h2>Profile Information</h2>
                <p>Update your account's profile information and email address.</p>
            </header>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6">
                @csrf
                @method('patch')

                <div>
    <label for="first_name">First Name</label>
    <input id="first_name" name="first_name" type="text" value="{{ old('first_name', $user->first_name) }}" required autofocus autocomplete="first_name" />
    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
</div>

<div>
    <label for="last_name">Last Name</label>
    <input id="last_name" name="last_name" type="text" value="{{ old('last_name', $user->last_name) }}" required autocomplete="last_name" />
    @error('last_name')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

                <div class="form-group">
                    <button type="submit">Save</button>
                    

                    @if (session('status') === 'profile-updated')
                        <p class="success">Saved.</p>
                    @endif
                </div>
            </form>
        </section>
    </div>
</body>
